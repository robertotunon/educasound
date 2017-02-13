<?php get_header(); ?>

<main class="section" role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<header class="section_header">
		<h2 class="title"><?php the_title(); ?></h2>
	</header>
		
	<section class="inner">
		<?php if ( $post->post_content!=="" ) { ?>
			<article class="content">
				<?php the_content(); ?>
			</article>
		<?php } ?>

	<?php endwhile; endif; ?>

		<ul class="apps list flex">
		<?php 
		$args = array(
			'post_type' => 'apps',
			'order' => 'DES',
			'orderby'   => 'id',
			'posts_per_page' => '-1'
		);
		$cursos_query = new WP_Query( $args );
		?>
		<?php if ( $cursos_query->have_posts() ) : ?>
		<?php while ( $cursos_query->have_posts() ) : $cursos_query->the_post(); ?>
			<?php get_template_part( 'content', 'apps_list' ); ?>
		<?php endwhile;?>

		<?php else :?>
			<?php echo wpautop( '<em>Ahora mismo no hay ninguna app publicada.</em>' ); ?>
		<?php endif;?>
		<?php wp_reset_query(); ?>
		</ul>

	</section>

<?php get_footer('destacado'); ?>