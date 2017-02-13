<?php
/**
 * Plantilla de contenidos para el listado de Cursos
 */
 ?>
<li class="item curso block">
    <figure class="curso_thumb">
        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" class="loop-entry-img-link">
            <?php the_post_thumbnail('medium'); ?>
    	</a>
    </figure>
    <section class="curso_data">
        <h3 class="curso_name">
            <a href="<?php the_permalink(); ?>"
            title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h3>
        <?php the_excerpt(); ?>
    </section>
    <a href="<?php the_permalink(); ?>" class="btn">Ver Curso</a>
</li>