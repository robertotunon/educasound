<?php get_header(); ?>

<main class="content">

	<article class="home_module inner">
		<h2 class="title">Próximos Cursos</h2>
		<ul class="cursos list flex">
			<?php 
		    // The args for cursos_query
		    $args = array(
		        'post_type' 		=> 'cursos',
		        'tipo-curso'		=> 'proximos',
		        'posts_per_page' 	=> '3'
		    );
		    $cursos_query = new WP_Query( $args );
		    ?>
	        <?php if ( $cursos_query->have_posts() ) : ?>
	        <?php while ( $cursos_query->have_posts() ) : $cursos_query->the_post(); ?>
	            <?php get_template_part( 'content', 'cursos_list' ); ?>
	        <?php endwhile;?>
	        <?php else :?>
	            <?php echo wpautop( 'Aún no tenemos ningún curso programado para esta temporada.' ); ?>
	        <?php endif;?>
	        <?php wp_reset_query(); ?>
		</ul>
		<a href="<?php echo home_url(); ?>/cursos" class="btn">Ver todos los cursos</a>
	</article>
	
	<article class="destacado flex sigueahi">
		<section class="destacado_text">
			<h2 class="titular">El profesor sigue ahí, incluso después de terminar el curso</h2>
			<!-- <a href="#" class="btn">Saber más</a> -->
		</section>
	</article>
	
	<article class="home_module inner">
		<h2 class="title">Últimos artículos</h2>
		<ul class="blog list flex">
		<?php query_posts('posts_per_page=4');?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'blog_list' ); ?>
		<?php endwhile;?>
		<?php endif; ?>
		</ul>
		<a href="<?php echo home_url(); ?>/blog" class="btn">Ver todos los atículos</a>
	</article>


<?php get_footer('destacado'); ?>


