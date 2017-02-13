<?php
/**
 * Template Name: Dos columnas (barra lateral)
 */
?>

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
        
    <section class="inner page doscol flex">
	 	<header class="doscol-header">
            <figure><?php the_post_thumbnail('full'); ?></figure>
        </header>
        <article class="content">
            <?php the_content(); ?>
        </article>
        <aside class="ficha">
        	<h3><?php the_field('titulo_columna_derecha'); ?></h3>

        	<?php echo do_shortcode( get_post_meta( get_the_id(), 'contenido_columna_derecha', true ) ); ?>

        </aside>

    <?php endwhile; endif; ?>

	</section>

<?php get_footer('destacado'); ?>