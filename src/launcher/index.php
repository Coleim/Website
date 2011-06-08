<?php
	session_start();

	require_once('../business/LanguageManager.php');
	require_once('../business/Site.php');
	
	function getmicrotime($e = 8)
	{
		list($u, $s) = explode(' ',microtime());
		return $u;
	}
	
	$totalstartTime = getmicrotime();
				
	$startTime = getmicrotime();
	$intTime = getmicrotime();
	$diff = bcsub($intTime,$startTime,7);
	echo 'Start processing website - Temps depuis le demarrage : ' . $diff . ' ms<br />';

	
		
	$startTime = getmicrotime();
	$langManager = new LanguageManager();
	$intTime = getmicrotime();
	$diff = bcsub($intTime,$startTime,7);
	echo 'Temps creation LanguageManager : ' . $diff . ' ms<br />';


	if( !isset($_GET['page']) ) {
		$pageRequested = 'home';
	} else {
		$pageRequested = $_GET['page'];
	}

	$startTime = getmicrotime();
	
	$intTime = getmicrotime();
	$diff = bcsub($intTime,$startTime,7);
	echo 'Temps inclusion Site : ' . $diff . ' ms<br />';
	
	$startTime = getmicrotime();
	require_once('../view/Displayer.php');
	$intTime = getmicrotime();
	$diff = bcsub($intTime,$startTime,7);
	echo 'Temps inclusion Displayer : ' . $diff . ' ms<br />';

	$startTime = getmicrotime();
	$site = new Site( $pageRequested, $langManager->getCurrentLanguage() );
	$intTime = getmicrotime();
	$diff = bcsub($intTime,$startTime,7);
	echo 'Temps creation Site : ' . $diff . ' ms<br />';
	
	
	$startTime = getmicrotime();
	$displayer = new Displayer($site);
	$intTime = getmicrotime();
	$diff = bcsub($intTime,$startTime,7);
	echo 'Temps creation Displayer : ' . $diff . ' ms<br />';
	
	
	$startTime = getmicrotime();
	$displayer->display();
	$intTime = getmicrotime();
	$diff = bcsub($intTime,$startTime,7);
	echo 'Temps Display : ' . $diff . ' ms<br />';

	
	$totalintTime = getmicrotime();
	$totaldiff = bcsub($totalintTime,$totalstartTime,7);
	echo 'Temps total creation site : ' . $totaldiff . ' ms<br />';

?>
