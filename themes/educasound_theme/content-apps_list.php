<?php
/**
 * Plantilla de contenidos para el listado de Apps
 */
 ?>
<li class="item app block">
    <figure class="app_thumb">
        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" class="loop-entry-img-link">
            <?php the_post_thumbnail('medium'); ?>
    	</a>
    </figure>
    <article class="app_data">
        <h3 class="app_name">
            <a href="<?php the_permalink(); ?>"
            title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h3>

        <?php the_excerpt(); ?>

        <?php if(get_field('mac')) { ?>
            <section class="app_download">
                <a class="btn mac" href="<?php the_field('mac'); ?>">Descargar <?php the_title(); ?> para Mac</a>
                <p class="app_version"><?php the_field('version_mac'); ?> para OSX</p>
            </section>
        <?php } ?>

        <?php if(get_field('win_32')) { ?>
            <section class="app_download">
                <a class="btn win32" href="<?php the_field('win_32'); ?>">Descargar <?php the_title(); ?> para Win32</a>
                <p class="app_version"><?php the_field('version_win32'); ?> para Windows 32bits</p>
            </section>
        <?php } ?>

         <?php if(get_field('win_64')) { ?>
            <section class="app_download">
                <a class="btn win64" href="<?php the_field('win_64'); ?>">Descargar <?php the_title(); ?> para Win64</a>
                <p class="app_version"><?php the_field('version_win64'); ?> para Windows 64bits</p>
            </section>
        <?php } ?>
    </article>
</li>