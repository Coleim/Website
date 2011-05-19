<?php
	session_start();

	include('../security/blackList.php');

	$ip = $_SERVER["REMOTE_ADDR"];
	
	if( blackListed($ip) ) {
		include('../business/youAreBlackListed.php');
	} else {
		
		//echo getcwd();
		if ( isset($_COOKIE['lang']) ) {
			$lang = $_COOKIE['lang'];
			setcookie('lang', $lang, time() + 365*24*3600, null, null, false, true);
		} else {
			$lang = 'fr';
			setcookie('lang', $lang, time() + 365*24*3600, null, null, false, true);
		}

		if( !isset($_GET['page']) ) {
			$pageRequested = 'home';
		} else {
			$pageRequested = $_GET['page'];
		}

		include('../business/Site.php');
		include('../view/Displayer.php');

        //TODO Passer le css en parametre
		$site = new Site( $pageRequested, $lang );
		
		$displayer = new Displayer($site);
		$displayer->display();
	}
		
		
	



/*


include('../view/Menu.php');
include('../view/Page.php');
include('../view/Site.php');
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
