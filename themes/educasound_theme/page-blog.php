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

		<ul class="blog list flex">
			<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 12,
					'paged' => $paged
					);
				$wp_query = new WP_Query();
				$wp_query->query($args);
				if ( $wp_query->have_posts() ) :
				while ($wp_query->have_posts()) : $wp_query->the_post();
					get_template_part( 'content', 'blog_list' );
				endwhile;

				else:
					echo wpautop( '<em>En estos momentos no hay ningún artículo publicado.</em>' );
				endif;
			?>
		</ul>

		<?php
			if (function_exists("vitamin_pagination")) {
				vitamin_pagination($additional_loop->max_num_pages);
			}
		?>
		<?php wp_reset_query(); ?>

	</section>

<?php get_footer('destacado'); ?>