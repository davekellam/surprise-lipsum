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
		$this->words = array( 
			'lorem',
			'ipsum',
			'dolor',
			'sit',
			'amet',
			'consectetuer',
			'adipiscing',
			'elit',
			'nam',
			'cursus',
			'morbi',
			'ut',
			'mi',
			'nullam',
			'enim',
			'leo',
			'egestas',
			'id',
			'condimentum',
			'at',
			'laoreet',
			'mattis',
			'massa',
			'sed',
			'eleifend',
			'nonummy',
			'diam',
			'praesent',
			'mauris',
			'ante',
			'elementum',
			'et',
			'bibendum',
			'at',
			'posuere',
			'sit',
			'amet',
			'nibh',
			'duis',
			'tincidunt',
			'lectus',
			'quis',
			'dui',
			'viverra',
			'vestibulum',
			'suspendisse',
			'vulputate',
			'aliquam',
			'dui',
			'nulla',
			'elementum',
			'dui',
			'ut',
			'augue',
			'aliquam',
			'vehicula',
			'mi',
			'at',
			'mauris',
			'maecenas',
			'placerat',
			'nisl',
			'at',
			'consequat',
			'rhoncus',
			'sem',
			'nunc',
			'gravida',
			'justo',
			'quis',
			'eleifend',
			'arcu',
			'velit',
			'quis',
			'lacus',
			'morbi',
			'magna',
			'magna',
			'tincidunt',
			'a',
			'mattis',
			'non',
			'imperdiet',
			'vitae',
			'tellus',
			'sed',
			'odio',
			'est',
			'auctor',
			'ac',
			'sollicitudin',
			'in',
			'consequat',
			'vitae',
			'orci',
			'fusce',
			'id',
			'felis',
			'vivamus',
			'sollicitudin',
			'metus',
			'eget',
			'eros'
		);
	}

	function get_lipsum() {
		$lipsum = $this->_generate_lipsum();
		return $lipsum;
	}

	function _generate_lipsum( $num = 50 ) {
		$count = ''; 
		$sentence = '';

		$num = $this->_lipsum_variance( $num ); echo $num;

		while ( $count < $num ) {
			$word = array_rand( $this->words );
			$sentence .= $this->words[$word] . ' ';
			$count++;
		}

		return $sentence;
	}

	function _lipsum_variance( $num, $variance = 0.2 ) {
		$num_low = $num - $num * $variance;
		$num_high = $num + $num * $variance;

		$new_num = rand( (int) $num_low, (int) $num_high );

		return $new_num;
	}
}

global $surprise_lipsum;
$surprise_lipsum = new Surprise_Lipsum;

endif;