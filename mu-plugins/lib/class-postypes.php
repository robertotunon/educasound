<?php

class educasound_custom_types {
	
	function __construct() {
		
		/* Constructor de la clase */		
		register_activation_hook(__FILE__,array($this,'activate'));
		register_deactivation_hook(__FILE__,array($this,'deactivate'));
		
		//Registramos con prioridad 0
		add_action('init', array($this,'register_custom_types'),0);
		add_action('init', array($this,'register_custom_taxonomies'),0);		
		
	}
	
	public function register_custom_types() {
		
		register_post_type('cursos', array(
		
			'public'				=>	true,
			'publicly_queryable'	=>	true,
			'show_ui'				=>	true,
			'show_in_menu'			=>	true,
			'menu_position'			=>	5,
			'menu_icon'				=>  'dashicons-welcome-learn-more',
			'rewrite'				=>	array('slug' =>	'cursos', 'with_front' => false),	
			'supports'				=>	array('title','editor','thumbnail', 'excerpt'),
			'labels'	=>	array(
					'name'					=>	'cursos',
					'singular_name'			=>	'cursos',
					'add_new'				=>	'Nuevo Curso',
					'all_items'				=>	'Ver todos los Cursos',
					'add_new_item'			=>	'Añadir nuevo Curso',
					'edit_item'				=>	'Editar Curso',
					'new_item'				=>	'Nuevo Curso',
					'view_item'				=>	'Ver Curso',
					'search_items'			=>	'Buscar Cursos',
					'not_found'				=>	'Cursos no encontrados',
					'not_found_in_trash'	=>	'Cursos No encontrado en la papelera',
					'menu_name'				=>	'Cursos'
					)
		));

		register_post_type('agenda', array(
		
			'public'				=>	true,
			'publicly_queryable'	=>	true,
			'show_ui'				=>	true,
			'show_in_menu'			=>	true,
			'menu_position'			=>	5,
			'menu_icon'				=>  'dashicons-calendar-alt',
			'rewrite'				=>	array('slug' =>	'agenda', 'with_front' => false),	
			'supports'				=>	array('title'),
			'labels'	=>	array(
					'name'					=>	'agenda',
					'singular_name'			=>	'agenda',
					'add_new'				=>	'Nuevo Item de Agenda',
					'all_items'				=>	'Ver todos los Items de Agenda',
					'add_new_item'			=>	'Añadir nuevo Item de Agenda',
					'edit_item'				=>	'Editar Item de Agenda',
					'new_item'				=>	'Nuevo Item de Agenda',
					'view_item'				=>	'Ver Item de Agenda',
					'search_items'			=>	'Buscar Items de Agenda',
					'not_found'				=>	'Items de Agenda no encontrados',
					'not_found_in_trash'	=>	'Item de Agenda No encontrado en la papelera',
					'menu_name'				=>	'Agenda'
					)
		));


		register_post_type('apps', array(

			'public'				=>	true,
			'publicly_queryable'	=>	true,
			'show_ui'				=>	true,
			'show_in_menu'			=>	true,
			'menu_position'			=>	5,
			'menu_icon'				=>  'dashicons-admin-tools',
			'rewrite'				=>	array('slug' =>	'apps', 'with_front' => false),
			'supports'				=>	array('title', 'excerpt'),
			'labels'	=>	array(
					'name'					=>	'apps',
					'singular_name'			=>	'app',
					'add_new'				=>	'Nueva App',
					'all_items'				=>	'Ver todas las Apps',
					'add_new_item'			=>	'Añadir nueva App',
					'edit_item'				=>	'Editar App',
					'new_item'				=>	'Nueva App',
					'view_item'				=>	'Ver App',
					'search_items'			=>	'Buscar Apps',
					'not_found'				=>	'Apps no encontradas',
					'not_found_in_trash'	=>	'Apps no encontradas en la papelera',
					'menu_name'				=>	'Apps'
					)
		));
	

		register_post_type('equipo', array(

			'public'				=>	true,
			'publicly_queryable'	=>	true,
			'show_ui'				=>	true,
			'show_in_menu'			=>	true,
			'menu_position'			=>	5,
			'menu_icon'				=>  'dashicons-groups',
			'rewrite'				=>	array('slug' =>	'equipo', 'with_front' => false),
			'supports'				=>	array('title','editor','thumbnail', 'excerpt'),
			'labels'	=>	array(
					'name'					=>	'equipo',
					'singular_name'			=>	'equipo',
					'add_new'				=>	'Nuevo miembro del equipo',
					'all_items'				=>	'Ver todos los miembros del equipo',
					'add_new_item'			=>	'Añadir nuevo miembro del equipo',
					'edit_item'				=>	'Editar miembro del equipo',
					'new_item'				=>	'Nuevo miembro del equipo',
					'view_item'				=>	'Ver miembro del equipo',
					'search_items'			=>	'Buscar miembro del equipo',
					'not_found'				=>	'Miembros del equipo no encontrados',
					'not_found_in_trash'	=>	'Miembros del equipo no encontrados en la papelera',
					'menu_name'				=>	'Equipo'
					)
		));		
	}
	
	public function register_custom_taxonomies() {

		register_taxonomy('tipo-curso','cursos', array(
	
		'hierarchical'			=>	true,
		'public'				=> 	true,
		'show_ui'				=>	true,
		'query_var'				=>	true,
		'show_admin_column'		=>	true,
		'rewrite'				=>	array(

			'slug' 			=> 'tipo-curso',
			'with_front' 	=> false,
			'hierarchical'	=> false
			),

		'labels'				=>	array(
			'name'					=>  'tipo de curso',
			'singular_name'			=>	'tipo de curso',
			'add_new'				=>	'Añadir tipo de curso',
			'all_items'				=>	'Todos los tipos',
			'add_new_item'			=>	'Añadir nuevo tipo de curso',
			'edit_item'				=>	'Editar tipo de curso',
			'new_item'				=>	'Nuevo tipo de curso',
			'view_item'				=>	'Ver tipo de curso',
			'search_items'			=>	'Buscar tipos de curso',
			'not_found'				=>	'Tipos de curso no encontrados',
			'not_found_in_trash'	=>	'Tipos de curso no encontrados en papelera',
			'menu_name'				=>	'Tipos de curso'
			)
		));
	}

	
	
	private function activate() {
		
		/* Acciones cuando se instala el plugin */
		
		$this->register_custom_types();
		
		// $this->register_custom_taxonomies();
	}
	
	private function deactivate() {
		
		/* Acciones cuando se desactiva el plugin */
		
		//echo 'Desactivado';
	}
	
}

new educasound_custom_types();
