<?php
/**
 * Title: Latest Stories Query Loop
 * Slug: paper-panthers/latest-stories
 * Categories: paper-panthers, query
 * Description: Query loop displaying recent stories styled as Paper Panthers news cards.
 *
 * @package PaperPanthers
 */

?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<section class="pp-latest-stories-section" style="margin-bottom: 50px;">
	<h2 class="pp-section-title" data-lang="es">HISTORIAS RECIENTES</h2>
	<h2 class="pp-section-title" data-lang="en">LATEST STORIES</h2>

	<!-- wp:query {"queryId":1,"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"layout":{"type":"default"}} -->
	<div class="wp-block-query">
		<!-- wp:post-template {"layout":{"type":"grid","columnCount":2}} -->
			<!-- wp:group {"className":"pp-post-card","layout":{"type":"default"}} -->
			<article class="pp-post-card">
				<!-- wp:post-terms {"term":"category","className":"pp-post-category"} /-->
				<!-- wp:post-title {"isLink":true,"fontSize":"large"} /-->
				<!-- wp:post-excerpt {"moreText":"<span data-lang=\"es\">Leer historia →</span><span data-lang=\"en\">Read story →</span>"} /-->
				<!-- wp:post-date {"fontSize":"small"} /-->
			</article>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<p data-lang="es">No se encontraron historias publicadas todavía.</p>
			<p data-lang="en">No published stories found yet.</p>
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</section>
<!-- /wp:group -->
