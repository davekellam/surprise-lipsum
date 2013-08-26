<?php
/*
Plugin Name: Surprise Lipsum
Version: 0.1
Description: Generate a somewhat random amount of Lipsum Text
Author: Dave Kellam
Author URI: http://eightface.com
Plugin URI: http://github.com/davekellam/surprise-lipsum/
Text Domain: surprise-lipsum
Domain Path: /languages
*/

if ( ! class_exists( 'Surprise_Lipsum' ) ) :

define ( 'SURPRISE_LIPSUM_VERSION', '0.1' );
define ( 'SURPRISE_LIPSUM_PATH', dirname ( __FILE__ ) );
define ( 'SURPRISE_LIPSUM_URL', trailingslashit ( plugins_url( '', __FILE__ ) ) );

require_once( SURPRISE_LIPSUM_PATH . '/functions.php' );

class Surprise_Lipsum {
	function __construct() {
		// May not need this, here for now
	}

	function get_lipsum() {
		$lipsum = $this->_generate_lipsum();
		return $lipsum;
	}

	function _generate_lipsum() {
		return "Lorem ipsum";
	}
}

global $surprise_lipsum;
$surprise_lipsum = new Surprise_Lipsum;

endif;