<?php
/**
 * Plantilla de contenidos para el listado de Profesores
 */
 ?>
<li class="item member flex">
    <figure class="member_thumb">
        <?php the_post_thumbnail('thumb'); ?>
    </figure>
    <section class="member_data">
        <h3 class="member_name"><?php the_title(); ?></h3>
        <h6 class="member_born"><?php the_field('lugar_nacimiento'); ?>, <?php the_field('fecha_nacimiento'); ?></h6>

        <article class="member_bio">
        	<?php the_content(); ?>
        </article>

        <a class="member_website" href="http://<?php the_field('sitio_web'); ?>" title="<?php the_field('sitio_web'); ?>, sitio web de <?php the_title(); ?>"><?php the_field('sitio_web'); ?></a>
    </section>
</li>