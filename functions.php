<?php

function sl_surprise_lipsum() {
	global $surprise_lipsum;
	return $surprise_lipsum;
}

/**
 * Get lipsum
 * @return string A string of lipsum
 */
function sl_get_lipsum() {
	return si_surprise_lipsum()->get_lipsum();
}

/**
 * Get lipsum and display
 */
function sl_lipsum() {
	$lipsum = si_surprise_lipsum()->get_lipsum();
	echo $lipsum;
}