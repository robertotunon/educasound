<?php get_header(); ?>

<main class="section" role="main">
	
	<?php while ( have_posts() ) : the_post(); ?>

		<header class="section_header">
			<h2 class="title"><?php the_title(); ?></h2>
		</header>
		
		<section class="inner">       
			<?php
				$img = wp_get_attachment_image( get_the_ID(), 'full' );
				echo preg_replace( '#(width|height)="\d+"#','',$img );
			?>
		</section>

	<?php endwhile; ?>

<?php get_footer(); ?>