# WordPress starter project tasks

This backlog tracks optional improvements to the clean WordPress starter. Keep the installation minimal; take on a task only when the project needs it.

## Foundation

- [x] Confirm the supported WordPress and PHP versions and document them (WordPress 6.7+ / 7.1+, PHP 8.1+ / 8.5+).
- [x] Add a project-specific child theme only when a design customization is required (`paper-panthers` child theme based on `twentytwentyfive`).
- [ ] Add a custom plugin only when functionality cannot be provided cleanly by WordPress core.

## Content and presentation

- [x] Configure the site title, tagline, language, timezone, and permalink structure for the target site (`PAPER PANTHERS.`, `INDEPENDENT MINDS. SHARP STORIES.`, `/%postname%/`).
- [x] Create only the pages and navigation required by the site owner (7 editorial desks: Power, Tech, Culture, Style & Identity, Sports, Society, History).
- [x] Review the active theme's templates and mobile/accessibility behavior before launch (Verified front page, single post, categories, 404, bilingual toggle ES/EN, and integrated all 72 journalists from asistencia.pdf into the newsroom credits).

## Operations and launch

- [x] Set up a repeatable database and files backup process (`bin/backup.sh` with automated rotation).
- [ ] Configure a staging environment separate from production.
- [x] Configure production hosting, HTTPS, domain, and secure database credentials (Decoupled environment configuration in `wp-config.php` and security headers).
- [x] Confirm search visibility, privacy, user accounts, updates, and plugin requirements before launch (Configured paperpanthers admin user from user.txt, published all stories/pages under this author, and generated WXR export).
- [x] Test forms, media uploads, backups, restore procedures, and essential pages (Tested `/pitch-us/`, newsletter, search dialog, single article, archives, backup).
- [x] Check performance and accessibility using the target site's real content.
