<?php

function sl_surprise_lipsum() {
	global $surprise_lipsum;
	return $surprise_lipsum;
}

/**
 * Get lipsum
 * @return string A string of lipsum
 */
function sl_get_lipsum( $num = 50 ) {
	return sl_surprise_lipsum()->get_lipsum( $num );
}

/**
 * Get lipsum and display
 */
function sl_lipsum() {
	$lipsum = sl_surprise_lipsum()->get_lipsum();
	echo $lipsum;
}