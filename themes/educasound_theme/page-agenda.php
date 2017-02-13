<?php get_header(); ?>

<main class="section" role="main">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<header class="section_header">
		<h2 class="title"><?php the_title(); ?></h2>
	</header>
		
	<section class="inner">
		<article class="content">
			<?php the_content( ); ?>
		</article>

	<?php endwhile; endif; ?>

		<ul class="list agenda">
		<?php 
		$args = array(
			'post_type' => 'agenda',
			'order'	=> 'ASC',
			'post_status'   =>  'future',
			'posts_per_page' => '-1'
		);
		$agenda_query = new WP_Query( $args );
		?>
		<?php if ( $agenda_query->have_posts() ) : ?>
		<?php while ( $agenda_query->have_posts() ) : $agenda_query->the_post(); ?>
			<?php get_template_part( 'content', 'agenda_list' ); ?>
		<?php endwhile;?>

		<?php else :?>
			<?php echo wpautop( '<em>En estos momentos no tenemos programada ninguna convocatoria de nuestros cursos.</em>' ); ?>
		<?php endif;?>
		<?php wp_reset_query(); ?>
		</ul>

	</section>

<?php get_footer('destacado'); ?>