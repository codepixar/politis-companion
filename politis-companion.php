<?php
/*
 * Plugin Name:       Politis Companion
 * Plugin URI:        https://colorlib.com/wp/themes/politis/
 * Description:       Politis Companion is a companion for Politis theme.
 * Version:           1.0
 * Author:            Colorlib
 * Author URI:        https://colorlib.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       politis-companion
 * Domain Path:       /languages
 */

if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( ! defined( 'POLITIS_COMPANION_VERSION' ) ) {
    define( 'POLITIS_COMPANION_VERSION', '1.0' );
}

// Define dir path constant
if( ! defined( 'POLITIS_COMPANION_DIR_PATH' ) ) {
    define( 'POLITIS_COMPANION_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

// Define inc dir path constant
if( ! defined( 'POLITIS_COMPANION_INC_DIR_PATH' ) ) {
    define( 'POLITIS_COMPANION_INC_DIR_PATH', POLITIS_COMPANION_DIR_PATH . 'inc/' );
}

// Define sidebar widgets dir path constant
if( ! defined( 'POLITIS_COMPANION_SW_DIR_PATH' ) ) {
    define( 'POLITIS_COMPANION_SW_DIR_PATH', POLITIS_COMPANION_INC_DIR_PATH . 'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( ! defined( 'POLITIS_COMPANION_EW_DIR_PATH' ) ) {
    define( 'POLITIS_COMPANION_EW_DIR_PATH', POLITIS_COMPANION_INC_DIR_PATH . 'elementor-widgets/' );
}

// Define demo data dir path constant
if( ! defined( 'POLITIS_COMPANION_DEMO_DIR_PATH' ) ) {
    define( 'POLITIS_COMPANION_DEMO_DIR_PATH', POLITIS_COMPANION_INC_DIR_PATH . 'demo-data/' );
}

// Define plugin dir url constant
if( ! defined( 'POLITIS_COMPANION_DIR_URL' ) ) {
    define( 'POLITIS_COMPANION_DIR_URL', plugin_dir_url( __FILE__ ) );
}


$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();

if( ( 'Politis' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'Politis' == $is_parent->get( 'Name' ) ) ) {
    require_once POLITIS_COMPANION_DIR_PATH . 'politis-init.php';
} else {

    add_action( 'admin_notices', 'politis_companion_admin_notice', 99 );
    function politis_companion_admin_notice() {
        $url = 'https://wordpress.org/themes/politis/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Politis Companion</strong> plugin you have to also install the %1$sPolitis Theme%2$s', 'politis-companion' ), '<a href="' . esc_url( $url ) . '" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}
