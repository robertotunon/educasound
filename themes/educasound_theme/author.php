<?php get_header(); ?>

<?php 
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<main class="section" role="main">

    <header class="section_header">
        <h2 class="title">
            Artículos de <?php echo $curauth->first_name;?> <?php echo $curauth->last_name;?>
        </h2>
        <p class="archive-description"><?php echo term_description(); ?></p>
    </header><!-- .archive-header -->
    
    <section class="inner">
        <ul class="inner flex blog_list">

        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 12,
            'author' => $author,
            'paged' => $paged
            );
        $wp_query = new WP_Query();
        $wp_query->query($args);
        if ( $wp_query->have_posts() ) :
        while ($wp_query->have_posts()) : $wp_query->the_post();
            get_template_part( 'content', 'author_list' );
        endwhile;

        else:
            echo wpautop( 'Aún no hay ningún artículo de este autor publicado.' );
        endif;
        ?>
        </ul>

        <?php if (function_exists("vitamin_pagination")) {
        vitamin_pagination($additional_loop->max_num_pages);
        } ?>
        <?php wp_reset_query(); ?>

    </section>

<?php get_footer('destacado'); ?>
