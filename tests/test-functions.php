<?php

class Tests_Functions extends WP_UnitTestCase {

	function test_get_lipsum_is_string() {
		$this->assertTrue( is_string( sl_get_lipsum() ) );
	}

	function test_variance_is_int() {
		$this->assertTrue( is_int( Surprise_Lipsum::_variance( 50 ) ) );
	}
}
