<?php
/**
 * Plantilla de contenidos para el listado de Agenda
 */

$custom_fields = get_post_custom();
 ?>
<li class="item convocatoria flex">
    <?php 
    $curso = get_field('curso');
    if( $curso ): ?>
        <?php foreach( $curso as $post): // variable must be called $post (IMPORTANT) ?>
            <?php setup_postdata($post); ?>
    <article class="convoca_data">
        <time class="convoca_date"><?php echo $custom_fields['fecha'][0]; ?></time>
        <h3 class="convoca_curso">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h3>
        <h5 class="convoca_lugar"><?php echo $custom_fields['lugar'][0]; ?></h5>
    </article>
    
    <a href="<?php the_permalink(); ?>" class="btn">Ver curso</a>

    <?php endforeach; ?>
    <?php wp_reset_postdata();?>
    <?php endif; ?>

</li>