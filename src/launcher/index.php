<?php
	session_start();

	
	function getmicrotime($e = 8)
	{
		list($u, $s) = explode(' ',microtime());
		return $u;
	}
	
	echo __FILE__ . '<br/>';
	echo dirname(__FILE__). '<br/>'. '<br/>';


	
	$totalstartTime = getmicrotime();
		
	$startTime = getmicrotime();
			
	require_once('../security/blackList.php');

	$ip = $_SERVER["REMOTE_ADDR"];
	
	if( blackListed($ip) ) {
		require_once('../business/youAreBlackListed.php');
	} else {
		
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'Start processing website - Temps depuis le demarrage : ' . $diff . ' ms<br />';
		

		$startTime = getmicrotime();
		require_once('../business/LanguageManager.php');
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'Temps Language manager inclusion : ' . $diff . ' ms<br /><br /><br />';
		
		
		
		
		
		
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
		require_once('../business/Site.php');
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
	}
	
	$totalintTime = getmicrotime();
	$totaldiff = bcsub($totalintTime,$totalstartTime,7);
	echo 'Temps total creation site : ' . $totaldiff . ' ms<br />';



/*


require_once('../view/Menu.php');
require_once('../view/Page.php');
require_once('../view/Site.php');
*/

/// Dans l'index.php
/// creation du site.
/// recuperation du fichier contenant la liste des pages.
/// Construction des pages du site.
/// uniquement si c'est la premiere visite de la personne.
/// Sinon, pas la peine de tout reconstruire ?? 
/// Sauf si une page a changée.

/// creation du site avec en parametre un xml
/// qui contient toutes les pages du site, et la langue
/// <site>
///		<page file="le_nom_" /> //bien laisser le underscore, car on rajoute lang.xml apres
/// </site>
/// le site va alors generer le xhtml pour les pages
/// on fait un site->display(); c'est ca qui va afficher le html.
/// le display affiche le html de la page courante.
/// index.php?page=home  
/// index.php?page=about 
/// C'est comme ca qu'on sait quelle page construire !


/*
/// clic sur lien :

$page->open('nom_de_la_page.xml');

/// Dans la partie admin :

$article = new Article( titre, date, contenu );


$page->addArticle($article);
*/


?>
