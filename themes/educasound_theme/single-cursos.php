<?php
/**
 * Plantilla de contenidos para el single de Cursos
 */
?>

<?php get_header(); ?>

<main class="single curso" role="main">
	
	<?php while ( have_posts() ) : the_post(); ?>
	
	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );	?>
	<header class="curso_header" style="background-image: linear-gradient(to bottom right, rgba(0,26,0,0.7) 20%, rgba(0,0,0,0.5) 90%), url(<?php echo $thumb['0'];?>);">
		<section class="curso_title">
			<span class="curso_type">Curso</span>
			<h2 class="curso_name"><?php the_title(); ?></h2>
		</section>
	</header>

	<article class="curso_content inner flex">
		<article class="entry">
			<section class="excerpt"><?php the_excerpt(); ?></section>
			
			<?php the_content(); ?>
		</article>

		<aside class="curso_ficha">
			<article class="feature profe">
				<h5 class="feature_title">Impartido por</h5>
				<p class="feature_data"><?php the_field('profe'); ?></p>
			</article>
			<article class="feature nivel">
				<h5 class="feature_title">Nivel</h5>
				<p class="feature_data"><?php the_field('nivel'); ?></p>
			</article>
			<article class="feature duracion">
				<h5 class="feature_title">Duración</h5>
				<p class="feature_data"><?php the_field('duracion'); ?></p>
			</article>
			<article class="feature precio">
				<h5 class="feature_title">Precio</h5>
				<p class="feature_data"><?php the_field('precio'); ?> €</p>
			</article>
			
			<article class="feature fechas">
				<h5 class="feature_title">Próximas convocatorias</h5>
			<?php 
			/*
			*  Query posts for a relationship value.
			*  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
			*/
			$agendas = get_posts(array(
				'post_type' => 'agenda',
				'post_status'   =>  array( 'future' ),
				'oder-by'       => 'date',
				'order'         => 'DESC',
				'meta_query'    => array(
					array(
						'key'       => 'curso', // name of custom field
						'value'     => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
						'compare'   => 'LIKE'
					)
				)
			));

			?>
			<?php if( $agendas ): ?>
				
				<ul class="convocatas">
				<?php foreach( $agendas as $agenda ): ?>
					<?php 

					$fecha = get_field('fecha', $agenda->ID);
					$lugar = get_field('lugar', $agenda->ID);

					?>
					<li class="convocata"><?php echo $fecha, ', ', $lugar; ?></li>
				<?php endforeach; ?>
				</ul>
				
				<button class="btn reserva eModal-1">Reserva tu plaza</button>
				<button class="solicilink eModal-3">O te avisamos para próximas convocatorias</button>
			<?php else: ?>
				<p class="no_convocatas">En estos momentos no hay ninguna convocatoria programada para este curso. <br> Si quieres que te avisemos cuando organicemos una, inscríbete aquí ⬇</p>

				<button class="btn info eModal-3">Solicita información</button>	
			<?php endif; ?>
			</article>

		</aside>        
	</article>

	<section class="curso_contenidos">
		<h3 class="title">Contenidos del curso</h3>
		<ul class="temas flex">
			<li class="tema">
				<h4><?php the_field('tema_1'); ?></h4>
				<p><?php the_field('descripcion_tema_1'); ?></p>
			</li>
			<li class="tema">
				<h4><?php the_field('tema_2'); ?></h4>
				<p><?php the_field('descripcion_tema_2'); ?></p>
			</li>
			<li class="tema">
				<h4><?php the_field('tema_3'); ?></h4>
				<p><?php the_field('descripcion_tema_3'); ?></p>
			</li>
		</ul>
		<a href="<?php the_field('temario'); ?>" class="temario btn" target="_blank">Ver temario completo</a>
	</section>



	<?php endwhile; ?>

</main>

<?php get_footer(); ?>