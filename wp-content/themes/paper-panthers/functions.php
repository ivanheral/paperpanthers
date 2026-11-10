<?php
/**
 * Paper Panthers Theme Functions
 *
 * @package PaperPanthers
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue styles and scripts.
 */
function paper_panthers_enqueue_assets() {
	// Parent theme stylesheet
	wp_enqueue_style(
		'twentytwentyfive-parent-style',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme( 'twentytwentyfive' )->get( 'Version' )
	);

	// Child theme stylesheet
	wp_enqueue_style(
		'paper-panthers-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'twentytwentyfive-parent-style' ),
		wp_get_theme()->get( 'Version' )
	);

	// Bilingual & interactive features script
	wp_enqueue_script(
		'paper-panthers-script',
		get_stylesheet_directory_uri() . '/assets/js/paper-panthers.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'paper_panthers_enqueue_assets' );

/**
 * Register block pattern categories.
 */
function paper_panthers_register_pattern_categories() {
	register_block_pattern_category(
		'paper-panthers',
		array(
			'label'       => __( 'Paper Panthers', 'paper-panthers' ),
			'description' => __( 'Patterns inspired by the Paper Panthers Brandbook & prototype.', 'paper-panthers' ),
		)
	);
}
add_action( 'init', 'paper_panthers_register_pattern_categories' );

/**
 * Preserve bilingual spans in auto-generated post excerpts.
 */
function paper_panthers_bilingual_excerpt( $text, $raw_excerpt ) {
	if ( ! empty( $raw_excerpt ) ) {
		return $raw_excerpt;
	}
	$post = get_post();
	if ( ! $post ) {
		return $text;
	}
	$content = $post->post_content;
	if ( strpos( $content, 'data-lang="es"' ) !== false && strpos( $content, 'data-lang="en"' ) !== false ) {
		preg_match( '/<p[^>]*data-lang="es"[^>]*>(.*?)<\/p>/is', $content, $match_es );
		preg_match( '/<p[^>]*data-lang="en"[^>]*>(.*?)<\/p>/is', $content, $match_en );
		if ( ! empty( $match_es[1] ) && ! empty( $match_en[1] ) ) {
			$excerpt_es = wp_strip_all_tags( $match_es[1] );
			$excerpt_en = wp_strip_all_tags( $match_en[1] );
			return '<span data-lang="es">' . esc_html( wp_trim_words( $excerpt_es, 25 ) ) . '</span><span data-lang="en">' . esc_html( wp_trim_words( $excerpt_en, 25 ) ) . '</span>';
		}
	}
	return $text;
}
add_filter( 'wp_trim_excerpt', 'paper_panthers_bilingual_excerpt', 10, 2 );

/**
 * Translate taxonomy term names for editorial desks bilingually.
 */
function paper_panthers_bilingual_term_name( $name ) {
	$translations = array(
		'POWER'                => array( 'es' => 'PODER', 'en' => 'POWER' ),
		'TECH'                 => array( 'es' => 'TECNOLOGÍA', 'en' => 'TECH' ),
		'CULTURE'              => array( 'es' => 'CULTURA', 'en' => 'CULTURE' ),
		'STYLE &amp; IDENTITY' => array( 'es' => 'ESTILO E IDENTIDAD', 'en' => 'STYLE & IDENTITY' ),
		'STYLE & IDENTITY'     => array( 'es' => 'ESTILO E IDENTIDAD', 'en' => 'STYLE & IDENTITY' ),
		'SPORTS'               => array( 'es' => 'DEPORTES', 'en' => 'SPORTS' ),
		'SOCIETY'              => array( 'es' => 'SOCIEDAD', 'en' => 'SOCIETY' ),
		'HISTORY'              => array( 'es' => 'HISTORIA', 'en' => 'HISTORY' ),
	);
	if ( isset( $translations[ $name ] ) ) {
		return '<span data-lang="es">' . esc_html( $translations[ $name ]['es'] ) . '</span><span data-lang="en">' . esc_html( $translations[ $name ]['en'] ) . '</span>';
	}
	return $name;
}
add_filter( 'term_name', 'paper_panthers_bilingual_term_name' );

/**
 * Format archive titles bilingually.
 */
function paper_panthers_bilingual_archive_title( $title ) {
	if ( is_category() ) {
		$cat_title = single_cat_title( '', false );
		return '<span data-lang="es">SECCIÓN: ' . $cat_title . '</span><span data-lang="en">DESK: ' . $cat_title . '</span>';
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'paper_panthers_bilingual_archive_title' );

/**
 * Security Hardening & Hygiene
 */
// Remove WordPress Generator
remove_action( 'wp_head', 'wp_generator' );

// Add Security Headers
function paper_panthers_security_headers( $headers ) {
	$headers['X-Content-Type-Options'] = 'nosniff';
	$headers['X-Frame-Options']        = 'SAMEORIGIN';
	$headers['Referrer-Policy']        = 'strict-origin-when-cross-origin';
	return $headers;
}
add_filter( 'wp_headers', 'paper_panthers_security_headers' );

// Disable XML-RPC Pingbacks
function paper_panthers_disable_xmlrpc_pingback( $methods ) {
	unset( $methods['pingback.ping'] );
	return $methods;
}
add_filter( 'xmlrpc_methods', 'paper_panthers_disable_xmlrpc_pingback' );
