<?php

class Tests_Functions extends WP_UnitTestCase {

	function test_get_lipsum_is_string() {
		$this->assertTrue( is_string( sl_get_lipsum() ) );
	}
}
