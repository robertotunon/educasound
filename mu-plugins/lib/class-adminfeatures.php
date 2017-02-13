<?php
/**
 * Hacks and fixes for the Wordpress Admin
 */


/*--------------------------------------*/
/* Logo personalizado en login
/*--------------------------------------*/
function login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/educasound_logo.svg);
            background-size: contain;
            width: 300px;
            height: 50px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'login_logo' );


function login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'login_logo_url' );

function login_logo_url_title() {
    return 'EducaSound.com';
}
add_filter( 'login_headertitle', 'login_logo_url_title' );


/*--------------------------------------*/
/* Cambiar nombres de menus admin
/*--------------------------------------*/

function edit_admin_menus() {
    global $menu;
    global $submenu;
     
    $menu[5][0] = 'Blog'; // Change Posts to Blog

    $menu[20][0] = 'Secciones'; // Cambiar Páginas por Secciones
    $submenu['edit.php'][20][0] = 'Todas las Secciones';
}
add_action( 'admin_menu', 'edit_admin_menus' );


/*--------------------------------------*/
/* Cambiar orden del menu admin
/*--------------------------------------*/
function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
    
    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'edit.php?post_type=page', // Pages
        'separator2', // Second separator
        'edit.php?post_type=cursos', // Cursos
        'edit.php?post_type=agenda', // Agenda
        'edit.php?post_type=apps', // Apps
        'edit.php', // Posts

    );
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');



/*----------------------------------------------------*/
/* Eliminar la barra de admin del front
/*----------------------------------------------------*/
add_filter('show_admin_bar', '__return_false');


/*----------------------------------------------------*/
/* Eliminar opción de link por defecto para imágenes
/*----------------------------------------------------*/
function wpb_imagelink_setup() {
  $image_set = get_option( 'image_default_link_type' );
  
  if ($image_set !== 'none') {
    update_option('image_default_link_type', 'none');
  }
}
add_action('admin_init', 'wpb_imagelink_setup', 10);