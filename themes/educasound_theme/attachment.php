<?php get_header(); ?>

<main class="section" role="main">
	
	<?php while ( have_posts() ) : the_post(); ?>

		<header class="section_header">
			<h2 class="title"><?php the_title(); ?></h2>
		</header>
		
		<section class="inner">
			<?php the_content(); ?>
		</section>

	<?php endwhile; ?>


<?php get_footer(); ?>