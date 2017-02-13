<?php get_header(); ?>

<main class="section" role="main">
	
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <header class="section_header">
        <h2 class="title"><?php the_title(); ?></h2>
    </header>
        
    <section class="inner page">
        <article class="content">
            <?php the_content( ); ?>
        </article>

    <?php endwhile; endif; ?>

	</section>

<?php get_footer('destacado'); ?>