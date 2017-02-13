        <article class="destacado flex demostramos">
            <section class="destacado_text">
                <h2 class="titular">En EducaSound no lo enseñamos, lo demostramos</h2>
                <!-- <a href="#" class="btn">Saber más</a> -->
            </section>
        </article>
    </main>
    
    <footer class="inner flex">
    	
    	<?php
        $defaults = array(
            'theme_location'  => 'prin_menu',
            'menu'            => '',
            'container'       => 'nav',
            'container_class' => 'main_nav',
            'menu_class'      => 'menu_principal',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
        );

        wp_nav_menu( $defaults );
        ?>

        <?php
        $defaults = array(
            'theme_location'  => 'sec_menu',
            'menu'            => '',
            'container'       => 'nav',
            'container_class' => 'secondary_nav',
            'menu_class'      => 'menu_secundario',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
        );

        wp_nav_menu( $defaults );
        ?>

        <section class="brand">
            <h5 class="logo"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h5>
        </section>

    	<?php wp_nav_menu(
            array(
            'theme_location' => 'social_menu',
            'menu'            => '',
            'container'       => 'nav',
            'container_class' => 'social_nav',
            'menu_class'      => 'social_menu',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
            )
        );
        ?>
    	
    	<h6 class="credits">© <?php bloginfo('name'); ?> <?php echo date('Y');?></h6>
    </footer>
	<?php wp_footer(); ?> 
</body>
</html>