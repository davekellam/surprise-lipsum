<?php
/*
Plugin Name: Surprise Lipsum
Version: 0.2
Description: Generate a somewhat random amount of Lipsum Text
Author: Dave Kellam
Author URI: http://eightface.com
Plugin URI: http://github.com/davekellam/surprise-lipsum/

Copyright 2013 Dave Kellam

This plugin was built by Dave Kellam, based on an idea put forth by James Young <http://www.welcomebrand.co.uk/thoughts/surprise-lipsum/>.

GNU General Public License, Free Software Foundation <http://creativecommons.org/licenses/GPL/2.0/>

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

if ( ! class_exists( 'Surprise_Lipsum' ) ) :

define ( 'SURPRISE_LIPSUM_VERSION', '0.2' );
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

		add_shortcode( 'slipsum', array( 'Surprise_Lipsum', '_slipsum_shortcode' ) );
	}

	function get_lipsum( $num = 50, $variance = 0.2 ) {
		$lipsum = $this->_generate_lipsum( $num, $variance );
		return $lipsum;
	}

	function get_sentence( $num = 50, $variance = 0.2 ) {
		$lipsum = $this->_generate_lipsum( $num, $variance );
		$lipsum = $this->_generate_sentence( $lipsum );

		return $lipsum;
	}

	function _generate_lipsum( $num_words, $variance = 0.2 ) {
		$count = ''; 
		$sentence = '';

		$num = $this->_variance( $num_words, $variance );

		while ( $count < $num ) {
			$word = array_rand( $this->words );
			$sentence .= $this->words[$word] . ' ';
			$count++;
		}

		$lipsum = $sentence;

		return $lipsum;
	}

	function _generate_sentence( $string ) {
		$sentence = ucfirst( $string ); // Make first word uppercase

		$sentence = rtrim( $sentence, ' ' ); // Remove trailing space

		$sentence = $sentence . '.'; // Add period

		return $sentence;
	}

	function _variance( $num, $variance = 0.2 ) {
		$num_low = $num - $num * $variance;
		$num_high = $num + $num * $variance;

		$new_num = rand( (int) $num_low, (int) $num_high );

		return $new_num;
	}

	function _slipsum_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'words' => 50,
			'variance' => 0.2
		), $atts ) );

		// Currently using public facing function from functions.php,
		// there may be a better way to construct this (either putting
		// the shortcode in there, or referencing an internal funciton here).
		$lipsum = sl_get_lipsum( $words, $variance );

		return $lipsum;
	}
}

global $surprise_lipsum;
$surprise_lipsum = new Surprise_Lipsum;

endif;