<?php
/**
 * @package WordPress
 * @subpackage EducaSound_Theme
 */

/*--------------------------------------*/
/* Añadiendo css a la cola
/*--------------------------------------*/
function educasound_assets() {
	wp_enqueue_style( 'educasound_styles', get_template_directory_uri() . '/css/educasound.css' );
}
add_action( 'wp_enqueue_scripts', 'educasound_assets' );


/*--------------------------------------*/
/* Limpiando wp_head
/*--------------------------------------*/
/*Removes RSD, XMLRPC, WLW, WP Generator, ShortLink and Comment Feed links*/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head');
// remove_action( 'wp_head', 'feed_links', 2 ); 
// remove_action('wp_head', 'feed_links_extra', 3 );
/*Removes Emoji code*/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
/*Removes the REST API*/
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
// Remove the annoying:
// <style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style> added in the header
function remove_recent_comment_style() {
	global $wp_widget_factory;
	remove_action( 
		'wp_head', 
		array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) 
	);
}
add_action( 'widgets_init', 'remove_recent_comment_style' );


/*--------------------------------------*/
/* Desactivar HTML en los comentarios
/*--------------------------------------*/
add_filter('pre_comment_content', 'wp_specialchars');


/*--------------------------------------*/
/* Añadir jquery
/*--------------------------------------*/
// if( !is_admin()) {
//   wp_deregister_script('jquery');
//   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false, '');
//   wp_enqueue_script('jquery');
// }


/*--------------------------------------*/
/* Añadir title support
/*--------------------------------------*/
add_theme_support( 'title-tag' );


/*--------------------------------------*/
/* Añadir feed links support
/*--------------------------------------*/
add_theme_support( 'automatic-feed-links' );


/*-------------------------------------------------*/
/* Añadir thumbs a los posts y excerpt a las pages
/*-------------------------------------------------*/
add_action('init', 'my_custom_init');

function my_custom_init() {
	add_theme_support( 'post-thumbnails' );
	add_post_type_support( 'page', 'excerpt' );
}


/*--------------------------------------*/
/* Añadir menus
/*--------------------------------------*/
register_nav_menus( array(
	'prin_menu' => 'Menú Principal',
	'sec_menu' => 'Menú Secundario',
	'social_menu' => 'Menú Redes Sociales',
) );




/*--------------------------------------*/
/* Añadir widget areas
/*--------------------------------------*/
register_sidebar( array (
	'name'      => __( 'Header','att'),
	'id'      => 'header',
	'description' => __( 'Los widgets que pongas en este area se verán en la cabecera.','att' ),
	'before_widget' => '<aside class="header_widget %2$s clr">',
	'after_widget'  => '</aside>',
	'before_title'  => '',
	'after_title' => '',
) );

register_sidebar( array (
	'name'      => __( 'home_widgets','att'),
	'id'      => 'home_widgets',
	'description' => __( 'Los widgets que pongas en este area se verán en la home.','att' ),
	'before_widget' => '<aside class="home_widget">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h4 class="widget_title">',
	'after_title' => '</h4>',
) );



/*--------------------------------------*/
/* Longitud de los extractos
/*--------------------------------------*/

function custom_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 20 );

function excerpt_leermas() {
	   global $post;
	return ' ...';
}
add_filter('excerpt_more', 'excerpt_leermas');


/*--------------------------------------*/
/* Cambiar URL de autores
/*--------------------------------------*/
add_action('init', 'author_base');
function author_base() {
	global $wp_rewrite;
	$author_slug = 'blog'; // change slug name
	$wp_rewrite->author_base = $author_slug;
}


/*----------------------------------------------------*/
/* Paginación vitaminada
/*----------------------------------------------------*/
function vitamin_pagination($pages = '', $range = 4) {  
	$showitems = ($range * 2)+1;  
 
	global $paged;
	if(empty($paged)) $paged = 1;
 
	if($pages == ''){
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages){
			$pages = 1;
		}
	}
 
	if(1 != $pages){
		echo "<nav class='pagination'>";

		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
		for ($i=1; $i <= $pages; $i++){
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
				echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive'>".$i."</a>";
			}
		}
 
		if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>Next &rsaquo;</a>";  
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";

		echo "</nav>";
	}
}


/*---------------------------------------------------*/
/* Agregar custom post types al query de etiquetas
/*---------------------------------------------------*/
function agregar_los_custom_posts($query){
	if(is_tag() && empty($query->query_vars['suppress_filters'])){
		$post_types = array('post', 'testimonios', 'servicios', 'galerias', 'historia');
		$query->set('post_type', $post_types);
  	return $query;
  	}
}
add_filter( 'pre_get_posts', 'agregar_los_custom_posts' );


/*--------------------------------------*/
/* Retocando las Galerías
/*--------------------------------------*/
/*
 * @param array $atts El array de salida para los atributos del shortcode.
 * @return array HTML5-ificado de los atributos de galería.
 */
function prefix_gallery_atts( $atts ) {
	$atts['itemtag']    = 'div';
	$atts['icontag']    = 'figure';
	$atts['captiontag'] = 'figcaption';

	return $atts;
}
add_filter( 'shortcode_atts_gallery', 'prefix_gallery_atts' );


// function include_thickbox_scripts()
// {
//     // include the javascript
//     wp_enqueue_script('thickbox', null, array('jquery'));

//     // include the thickbox styles
//     wp_enqueue_style('thickbox.css', '/'.WPINC.'/js/thickbox/thickbox.css', null, '1.0');
// }
// add_action('wp_enqueue_scripts', 'include_thickbox_scripts');


/*--------------------------------------*/
/* Mejorando el Embed de videos
/*--------------------------------------*/
function responsive_video($html, $url, $attr, $post_id) {
	return '<div class="video_container">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'responsive_video', 99, 4);

// customize embed settings
function custom_youtube_settings($code){
	if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false){
		$return = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&showinfo=0&rel=0&autohide=1", $code);
		return $return;
	}
	return $code;
}
add_filter('embed_oembed_html', 'custom_youtube_settings');

// register the shortcode to wrap html around the content
// function responsive_video_shortcode( $atts ) {
//     extract( shortcode_atts( array (
//         'identifier' => ''
//     ), $atts ) );
//     return '<div class="video_container"><iframe src="//www.youtube.com/embed/' . $identifier . '" height="240" width="320" allowfullscreen="" frameborder="0"></iframe></div>';
// }
// add_shortcode ('responsive-video', 'responsive_video_shortcode' );



/*--------------------------------------*/
/* Contact Form 7 sin css ni js
/*--------------------------------------*/
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

/*--------------------------------------*/
/* Ocultar labels en Gravity forms
/*--------------------------------------*/
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

/*--------------------------------------*/
/* Pasar datos al form de reservas (Gravity)
/*--------------------------------------*/
add_filter( 'gform_pre_render_3', 'convocatas' );
add_filter( 'gform_pre_validation_3', 'convocatas' );
add_filter( 'gform_pre_submission_filter_3', 'convocatas' );
add_filter( 'gform_admin_pre_render_3', 'convocatas' );

function convocatas( $form ) {
	
	$convocas = get_posts(array(
		'post_type' => 'agenda',
		'post_status'   =>  array( 'future' ),
		'oder-by'       => 'date',
		'order'         => 'DESC',
		'meta_query'    => array(
			array(
				'key'       => 'curso', // name of custom field
				'value'     => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
				'compare'   => 'LIKE'
			)
		)
	));

	foreach ( $form['fields'] as &$field ) {
		if ( $field->type != 'select' ) {
			continue;
		}

		$choices = array();
		if ($convocas){
			foreach ( $convocas as $convoca ) {
				$convoca_fecha = get_field('fecha', $convoca->ID);
				$convoca_lugar = get_field('lugar', $convoca->ID);
				$choices[] = array( 'text' => $convoca_fecha . ', ' . $convoca_lugar, 'value' => $convoca_fecha . ', ' . $convoca_lugar );
			}
			$field->placeholder = 'Selecciona una convocatoria';
			$field->choices = $choices;
		}
		else{
				$field->placeholder = 'Ahora mismo no hay ninguna convocatoria programada';
			}
	}

	return $form;
}

add_filter('gform_field_value_precio_curso', 'precio_del_curso');
function precio_del_curso($value){
global $post;

$preciocurso = get_field('precio');

return $preciocurso;
}

// add_filter( 'gform_field_container_3', 'no_field_container', 10, 6 );
// 	function no_field_container( $field_container, $field, $form, $css_class, $style, $field_content ) {
// return '{FIELD_CONTENT}';
// }

add_filter("gform_init_scripts_footer", "init_scripts");
	function init_scripts() {
	return true;
}

?>