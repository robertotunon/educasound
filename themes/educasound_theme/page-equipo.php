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

		<ul class="list equipo flex">
		
		<?php 
		$args = array(
			'post_type' => 'equipo',
			'order'	=> 'DES',
			'orderby'	=> 'id',
			'posts_per_page' => '-1'
		);
		$equipo_query = new WP_Query( $args );
		?>
		<?php if ( $equipo_query->have_posts() ) : ?>
		<?php while ( $equipo_query->have_posts() ) : $equipo_query->the_post(); ?>
			<?php get_template_part( 'content', 'equipo' ); ?>
		<?php endwhile;?>

		<?php else :?>
			<?php echo wpautop( '<em>Ahora mismo no está publicado ningún perfil de los miembros del equipo de EducaSound.</em>' ); ?>
		<?php endif;?>
		<?php wp_reset_query(); ?>
		
		</ul>
		
	</section>

<?php get_footer('destacado'); ?>