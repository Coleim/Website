<?php 


function blackListed( $ip ) {

	$return = false;
	
	if( $ip == '127.0.0.2' ) $return = true;
	
	
	return $return;
}


?>