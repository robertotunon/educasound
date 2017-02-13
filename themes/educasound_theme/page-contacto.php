<?php
	if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
		wpcf7_enqueue_scripts();
	}
 
	if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
		wpcf7_enqueue_styles();
	}
?>

<?php get_header(); ?>

<main class="section" role="main">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<header class="section_header">
		<h2 class="title"><?php the_title(); ?></h2>
	</header>
		
	<section class="inner">
		<?php if ( $post->post_content!=="" ) { ?>
			<article class="content flex">
				<?php the_content(); ?>
			</article>
		<?php } ?>

	<?php endwhile; endif; ?>

	</section>

<?php get_footer('destacado'); ?>