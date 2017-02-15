<?php
/**
 * @package   Uf_Epico
 * @author    Uberfácil <contato@uberfacil.com>
 * @license   GPL-2.0+
 * @link      //uberfacil.com
 * @copyright 2014-2016 Uberfácil
 *
 * @wordpress-plugin
 * Plugin Name: Epico
 * Plugin URI:  http://www.uberfacil.com/temas/epico
 * Description: Includes advanced functionality for the Epico theme and helps you to create your author platform on the Web with specialized widgets and shortcodes. Note: this plugin is compatible with the Epico theme only.
 * Version:     1.8.2
 * Author:      Uberfácil
 * Author URI:  //uberfacil.com
 * Text Domain: uf-epico
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

// Abortar caso este arquivo for chamado diretamente
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once( plugin_dir_path( __FILE__ ) . 'class-uf-epico.php' );
require_once( plugin_dir_path( __FILE__ ) . '/includes/widget-epico_pop.php' );
require_once( plugin_dir_path( __FILE__ ) . '/includes/widget-epico-social.php' );
require_once( plugin_dir_path( __FILE__ ) . '/includes/widget-epico_notice.php' );
require_once( plugin_dir_path( __FILE__ ) . '/includes/widget-epico_pages.php' );
require_once( plugin_dir_path( __FILE__ ) . '/includes/widget-epico_capture_widget.php' );
require_once( plugin_dir_path( __FILE__ ) . '/includes/widget-epico_author.php' );
require_once( plugin_dir_path( __FILE__ ) . '/includes/widget-epico_image.php' );
require_once( plugin_dir_path( __FILE__ ) . '/includes/widget-epico_links.php' );

// Registra hooks que sao acionados quando o plugin e ativado ou desativado
// Quando o plugin e removido, o arquivo uninstall.php e carregado.
register_activation_hook( __FILE__, array( 'Uf_Epico', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Uf_Epico', 'deactivate' ) );

// Carrega instancia da classe
add_action( 'plugins_loaded', array( 'Uf_Epico', 'get_instance' ) );

// Conecta o atualizado ao init
add_action( 'init', 'epico_plugin_updater_init' );

// Adiciona links adicionais na descricao do plugin
add_filter( 'plugin_row_meta', 'epico_add_plugin_page_links', 10, 2 );

// Load plugin text domain
add_action( 'plugins_loaded', 'epico_load_plugin_textdomain' );

/**
 * Carrega e ativa a classe de atualizacoes do plugin
 * @since 1.0.0
 */
function epico_plugin_updater_init() {

	/* Carrega o atualizados do Plugin */
	require_once( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'includes/epico-plugin-updater.php' );

	/* Configuracao do atualizador */
	$config = array(
		'base'      => plugin_basename( __FILE__ ),
		'dashboard' => TRUE,
		'username'  => TRUE,
		'key'       => '',
		'repo_uri'  => 'https://minha.uberfacil.com/',
		'repo_slug' => 'epico-plugin',
	);

	/* Carrega a classe do atualizador */
	new Epico_Plugin_Updater( $config );
}

/**
 * Insere link personalizado na descricao do plugin
 * @since 1.4.4
 */
function epico_add_plugin_page_links( $links, $file ) {

	if ( $file == 'uf-epico/plugincore.php' ) {

		$links[] = '<a href="https://twitter.com/uberfacil">' . __( 'Follow us on Twitter', 'uf-epico' ) . '</a> | <a href="https://www.facebook.com/uberfacil">' . __( 'Follow us on Facebook', 'uf-epico' ) . '</a>';
	}

	return $links;
}

/**
* Carrega o arquivo de traducao
*
*/
function epico_load_plugin_textdomain() {

	load_plugin_textdomain( 'uf-epico', FALSE, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
