<?php

global $t_dir, $url, $home_ID;

$home_ID	=	get_option( 'page_on_front' );
$t_dir 		= get_template_directory_uri();
$url  		= get_home_url();

add_filter( 'mime_types', 'wpse_mime_types' );
function wpse_mime_types( $existing_mimes ) {
  $existing_mimes['csv'] = 'text/csv';
  return $existing_mimes;
}

function get_leads() {
  global $wpdb;
  $leads = $wpdb->get_results( 'SELECT id, identificacion, nombre, correo, celular, ciudad, categoria, count(identificacion) as repetido 
                                                FROM cl_lead 
                                                GROUP BY identificacion 
                                                ORDER BY repetido DESC' );
  return $leads;
}

function remove_menus() {
	remove_menu_page( 'index.php' );                 
	remove_menu_page( 'jetpack' );                    
	remove_menu_page( 'edit.php' );                   
	remove_menu_page( 'upload.php' );                 
	remove_menu_page( 'edit.php?post_type=page' );    
	remove_menu_page( 'edit-comments.php' );          
	remove_menu_page( 'themes.php' );                 
	remove_menu_page( 'plugins.php' );                
  remove_menu_page( 'tools.php' );     
  remove_menu_page( 'users.php' );                  
	remove_menu_page( 'options-general.php' );
}
add_action( 'admin_menu', 'remove_menus' );

add_action('admin_init', 'disable_dashboard');
function disable_dashboard() {
	if ( !current_user_can('administrator') && is_admin() && ! wp_doing_ajax() ) {
		wp_redirect( home_url() );
		exit;
	}
}

function wpse_webpro_remove_new_content(){
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'new-content' );
	$wp_admin_bar->remove_menu( 'comments' );
}
add_action( 'wp_before_admin_bar_render', 'wpse_webpro_remove_new_content' );

function remove_website_row_wpse_94963_css()
{
	echo '<style>
				tr.user-url-wrap{ display: none; }
				.yoast-settings{ display: none; }
				tr.user-googleplus-wrap{ display: none; }
				tr.user-twitter-wrap{ display: none; }
				tr.user-facebook-wrap{ display: none; }
				tr.user-admin-color-wrap{ display: none; }
				tr.user-syntax-highlighting-wrap{ display: none; }
				tr.user-rich-editing-wrap{ display: none; }
				tr.user-comment-shortcuts-wrap{ display: none; }
				tr.user-admin-bar-front-wrap{ display: none; }
				tr.user-language-wrap{ display: none; }
				tr.user-description-wrap{ display: none; }
			</style>';
}
add_action( 'admin_head-user-edit.php', 'remove_website_row_wpse_94963_css' );
add_action( 'admin_head-profile.php',   'remove_website_row_wpse_94963_css' );

function annointed_admin_bar_remove() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);