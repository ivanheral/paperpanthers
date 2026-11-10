<?php
/**
 * Title: Founding Newsroom Credits
 * Slug: paper-panthers/newsroom
 * Categories: paper-panthers
 * Description: Credits grid of the 72 journalists from asistencia.pdf (Grupo 6 & Grupo 30).
 *
 * @package PaperPanthers
 */

$group_6 = array(
	'ALBUERNE LIBERAL · RUBEN',
	'ARRIBAS GOMEZ · DANIEL',
	'BELMAR CAMPOS · LUA',
	'BELTRAN MADRID · LILIANA ANABEL',
	'BENITEZ GARCIA · JAVIER',
	'BURGOA CACERES · LUZ DEL CARMEN',
	'BUSTELO OLVEIRA · VIOLETA',
	'CARRILLO DE ALBORNOZ MARTIN · LUCIA',
	'CASTELOS MARTÍNEZ · MARCO',
	'CIASCHETTI · MASSIMO',
	'COSTA ALVES · GABRIELA ALBERTO',
	'FORTAÑA UYARRA · CARLOTA',
	'GUILLEUX-MASSON · LOLA',
	'HERANCE HIDALGO · JIMENA',
	'HERRERA GONZALEZ · CONSTANZA NATALIA',
	'HERRERA MORENO · DAVID',
	'JIMENEZ LOZANO · HUGO',
	'LABRADOR ARENCIBIA · JUAN FRANCISCO',
	'LEMOIGNE · MARGOT CLARA PAULINE',
	'MORALES ALBERCA · MARTA',
	'MOYA PASCUAL · RODRIGO',
	'ORMAZABAL VALLEJO · AMANDÍ',
	'ORTEGA EGOROV · DANIEL',
	'PEÑUELA GARCIA-RAMA · CLAUDIA',
	'PERAZA GARCIA · RAUL',
	'PLIEGO MOLERO · AITANA',
	'RODRIGO ORTEGA · GUILLERMO',
	'RODRIGUEZ MONTILLA · JOHN ALEJANDRO',
	'SANCHEZ JAZIMENKO · KIRIANA',
	'SERNA FERNANDEZ · ADRIAN',
	'SILVA COSTA · MARIA MIGUEL',
);

$group_30 = array(
	'BLANCO ESCOLAR · DIEGO',
	'CALVENTE MATEO · ROGER',
	'CEKO · ROKO',
	'CHAVEZ · ISABELLA VALENTINA',
	'COHEN · TAYA',
	'CONCEPCION BARROETA · CAMILA',
	'DEL RIO VELADO · LUCIA',
	'DIAZ AMARO · MAIA',
	'FERNANDEZ ALVAREZ · JAVIER',
	'FONTELOS FERNANDEZ · SOFIA',
	'FUENTES MARTIN · NAIA',
	'GAÑAN PRIETO · CLAUDIA',
	'GARCIA DIAZ · LAURA',
	'GARCÍA LOPEZ · MELANIE',
	'GIERMAN · FEMKE',
	'GOMEZ GARCIA · DIANA',
	'GOROVETSKAIA · ALISA',
	'GREBERT · AMELIE MARA',
	'GROSS · MYKHAILO',
	'HERNANDEZ MARTINEZ · ANDREA',
	'HOLMGREN YEBES · ISABELLA',
	'KEARON · JANE COTTER',
	'KHEMIRI TORREMOCHA · ISMAEL',
	'LAGO NUÑEZ · SILVIA',
	'MARTIN BELLO · CARLOTA ISABEL',
	'MCCANN · LILIA',
	'MOSCARDO PLESCAN · ANA',
	'NEGRETE ORTIZ · EVA',
	'PRIETO RUIZ-GALVEZ · MARTA',
	'RINCON · RENE',
	'ROBLES HERNAIZ · MARTA',
	'ROMERO CHAMORRO · RAQUEL',
	'ROMERO GARCIA · PETRA',
	'ROTH ZAMBRANO · NOAH CAMILA',
	'RUIZ ALAMILLO · MARIA',
	'RUS ESPINOSA · RAQUEL',
	'RUZ GOMEZ · ALVARO',
	'TANG · CHENGXUAN FELIPE',
	'TAVOLINI · NICOLE',
	'VARELA · MILAGROS',
	'VENTURINI LEÓN · ESTEFANÍA',
);
?>
<!-- wp:group {"className":"pp-newsroom-wrapper","layout":{"type":"constrained"}} -->
<section class="pp-newsroom-block" id="newsroom">
	<h2 data-lang="es">REDACCIÓN FUNDADORA</h2>
	<h2 data-lang="en">THE FOUNDING NEWSROOM</h2>

	<p class="pp-subtitle" data-lang="es">72 Periodistas · Madrid / Est. 2026 · Una vez pantera de papel, siempre pantera de papel.</p>
	<p class="pp-subtitle" data-lang="en">72 Journalists · Madrid / Est. 2026 · Once a Paper Panther, always a Paper Panther.</p>

	<div class="pp-newsroom-cohort">
		<div class="pp-cohort-header">
			<span class="pp-cohort-title" data-lang="es">GRUPO 06 · 31 PERIODISTAS</span>
			<span class="pp-cohort-title" data-lang="en">GROUP 06 · 31 JOURNALISTS</span>
		</div>
		<div class="pp-journalists-grid">
			<?php foreach ( $group_6 as $name ) : ?>
				<div class="pp-journalist-name"><?php echo esc_html( $name ); ?></div>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="pp-newsroom-cohort" style="margin-top: 26px;">
		<div class="pp-cohort-header">
			<span class="pp-cohort-title" data-lang="es">GRUPO 30 · 41 PERIODISTAS</span>
			<span class="pp-cohort-title" data-lang="en">GROUP 30 · 41 JOURNALISTS</span>
		</div>
		<div class="pp-journalists-grid">
			<?php foreach ( $group_30 as $name ) : ?>
				<div class="pp-journalist-name"><?php echo esc_html( $name ); ?></div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!-- /wp:group -->
