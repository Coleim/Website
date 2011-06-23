<?php
	session_start();

	require_once('../business/LanguageManager.php');
	require_once('../business/Site.php');
	require_once('../view/Displayer.php');
	
	
	if( !isset($_GET['page']) ) {
		$pageRequested = 'home';
	} else {
		$pageRequested = $_GET['page'];
	}

	$langManager = new LanguageManager();
	$site = new Site( $pageRequested, $langManager->getCurrentLanguage() );

	$site->display();
	
?>
