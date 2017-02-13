<?php get_header(); ?>

<main class="section" role="main">

    <header class="section_header">
        <h2 class="title">
            Artículos de "<?php echo get_the_author(); ?>"
        </h2>
        <p class="archive-description"><?php echo term_description(); ?></p>
    </header><!-- .archive-header -->
    
    <section class="inner">
        <ul class="inner flex blog_list">
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', 'blog_list' ); ?>
        <?php endwhile;?>
        </ul>

    <?php endif; ?>

    </section>

<?php get_footer(); ?>
