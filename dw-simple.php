<?php

/*
Plugin Name: Digital Web - Opciones Simple
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Este plugin tiene opciones simples, Google Analitycs, Adsense, y otras cosas
Version: 1.0
Author: Dionisio Fonseca
Author URI: https://www.digitalweb.pe/
License: por Definir
*/

function dwi_codigos() {
	echo get_option('dwi_analitycs') ;
	echo get_option('dwi_adsense') ;
}
add_action('wp_head', 'dwi_codigos');


add_action('admin_menu', 'menu_dw');

function menu_dw()
{
	//create new top-level menu
	add_menu_page('Configuraciones básicas de Digital Web', 'DW - Config.', 'administrator', __FILE__, 'dw_settings_page' , plugins_url('/images/dw.png', __FILE__) );
	//call register settings function
	add_action( 'admin_init', 'registrar_configuraciones' );
}


function registrar_configuraciones() {
	//register our settings
	register_setting( 'dwi-configuracion-group', 'dwi_analitycs' );
	register_setting( 'dwi-configuracion-group', 'dwi_adsense' );
}

function dw_settings_page() {
	?>
	<div class="wrap">
		<h1>Digital Web Configuraciones</h1>

		<form method="post" action="options.php">
			<?php settings_fields( 'dwi-configuracion-group' ); ?>
			<?php do_settings_sections( 'dwi-configuracion-group' ); ?>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Código Analitycs</th>
                    <td>
                    <textarea name="dwi_analitycs" rows="8" cols="60"><?php echo esc_attr( get_option('dwi_analitycs') ); ?></textarea>
                    </td>
				</tr>

				<tr valign="top">
                    <th scope="row">Código Analitycs</th>
                    <td>
                    <textarea name="dwi_adsense" rows="8" cols="60"><?php echo esc_attr( get_option('dwi_adsense') ); ?></textarea></td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>
	</div>
<?php
}
?>