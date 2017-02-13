<?php get_header(); ?>

<main class="single blog" role="main">
	<header class="section_header">
		<h2 class="title">Blog</h2>
	</header>

	<?php while ( have_posts() ) : the_post(); ?>
	
	<section class="post inner">
		<header class="post_header">
			<figure class="post_image"><?php the_post_thumbnail('full'); ?></figure>
			<time class="post_date"><?php the_date(); ?></time>
			<h3 class="post_title"><?php the_title(); ?></h3>
		</header>
		   
		<article class="content">
			<?php the_content( ); ?>
		</article>

		<?php endwhile; ?>

		<?php comments_template(); ?>
	
	</section>
	

<?php get_footer('destacado'); ?>