#!/usr/bin/env bash
# ==============================================================================
# Paper Panthers - Backup Automation Script
# Backs up MariaDB/MySQL database and uploads directory.
# ==============================================================================

set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
BACKUP_DIR="${SCRIPT_DIR}/backups"
TIMESTAMP="$(date +'%Y%m%d_%H%M%S')"
BACKUP_FILE="${BACKUP_DIR}/paper_panthers_backup_${TIMESTAMP}.tar.gz"
TEMP_SQL="${BACKUP_DIR}/db_${TIMESTAMP}.sql"

mkdir -p "${BACKUP_DIR}"

echo "[*] Starting Paper Panthers backup at ${TIMESTAMP}..."

# Export database using WP-CLI
if command -v wp &>/dev/null; then
    echo "[*] Exporting database to ${TEMP_SQL}..."
    wp db export "${TEMP_SQL}" --path="${SCRIPT_DIR}" --quiet
else
    echo "[!] Error: WP-CLI not found on PATH." >&2
    exit 1
fi

# Archive SQL and uploads
echo "[*] Compressing database and uploads into ${BACKUP_FILE}..."
tar -czf "${BACKUP_FILE}" \
    -C "${SCRIPT_DIR}" \
    "wp-content/uploads" \
    -C "${BACKUP_DIR}" \
    "db_${TIMESTAMP}.sql" 2>/dev/null || \
tar -czf "${BACKUP_FILE}" \
    -C "${BACKUP_DIR}" \
    "db_${TIMESTAMP}.sql"

# Remove intermediate raw SQL file
rm -f "${TEMP_SQL}"

# Keep only the last 5 backups
echo "[*] Cleaning older backups (keeping 5 most recent)..."
find "${BACKUP_DIR}" -type f -name "paper_panthers_backup_*.tar.gz" | sort -r | tail -n +6 | xargs -r rm -f

BACKUP_SIZE="$(du -h "${BACKUP_FILE}" | cut -f1)"
echo "[✔] Backup completed successfully: ${BACKUP_FILE} (${BACKUP_SIZE})"
