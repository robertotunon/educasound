<form id="searchform" class="searchform" method="get"
action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">

	<input class="campo_busquedas" id="s" name="s"type="search"
	value="<?php echo esc_attr( get_search_query() ); ?>"
	placeholder="<?php echo esc_attr_x( '¿Qué estás buscando?', 'placeholder', 'att' ); ?>" />
	<input class="btn_busqueda" type="submit" value="Search" />
	
</form>