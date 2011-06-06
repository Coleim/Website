<?php

class Displayer {

	private $xhtml;
	
	// -------------------------------------------
	// Default constructor
	// -------------------------------------------
	public function Displayer($site) {
		

		function getmicrotime($e = 8)
		{
			list($u, $s) = explode(' ',microtime());
			return $u;
		}
		
		echo 'Debut de la demande : ' . $_SERVER['REQUEST_TIME'] . '<br />';
		$startTime = $_SERVER['REQUEST_TIME'];
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		
		echo 'Debut de la Reponse : '. $intTime . ' <br />';
		$this->xhtml = '';
		
		$startTime = getmicrotime();
		$this->prepareHeader($site->getHeader());
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'Fin creation header : ' . $intTime . ' .:. Soit Temps prepareHeader ----  ' . $diff . ' ms<br />';
		
		$startTime = getmicrotime();
		$this->prepareMenu($site->getMenu());
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'Fin creation menu : ' . $intTime . ' .:. Soit Temps prepareMenu ------- ' . $diff . ' ms<br />';
		
		$startTime = getmicrotime();
		$this->preparePage($site->getPage());
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'Fin creation page : ' . $intTime . ' .:. Soit Temps preparePage -------- ' . $diff . ' ms<br />';
		
		$startTime = getmicrotime();
		$this->prepareFooter();
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'Fin creation footer : ' . $intTime . ' .:. Soit Temps prepareFooter ----- ' . $diff . ' ms<br />';
		
		

		echo getmicrotime(); 
	}
	
	// -------------------------------------------
	// Prepare header function
	// -------------------------------------------
	public function prepareHeader($header) {
		$this->xhtml = '<!DOCTYPE ' . $header->getDocType() . '>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' . $header->getLang() . '" >
	<!-- header of the website -->
	<head>
		<!-- Title which appear on the top of you browser --> 
		<title>' . $header->getTitle() . '</title>
		<!-- favicon : http://www.commentcamarche.net/faq/sujet-332-favicon-l-icone-de-votre-site-dans-la-barre-d-adresse#pour-la-plupart-des-navigateurs 
		http://www.xhtml.net/xhtmlcss/favicon -->

		<!-- Default design of the website -->
		<link rel="stylesheet" media="screen" type="text/css" title="Default" href="../../css/' . $header->getCssFile() . '"/>

		<!-- Alternate stylesheets -->
		';
			if( count($header->getAlternateStyleSheets()) > 0 ) {
				foreach($header->getAlternateStyleSheets() as $altStyleSheet) {
					$this->xhtml .= '<link rel="alternate stylesheet" media="screen" type="text/css" title="' . $altStyleSheet . '" href="../../css/' . $altStyleSheet . '" />
					';
				}
			}
			
			$this->xhtml .= '
		<!-- other stylesheets -->
		<!-- // Media help
		  http://www.w3.org/TR/CSS2/media.html
		';
			if( count($header->getOtherStyleSheets()) > 0 ) {
				foreach($header->getOtherStyleSheets() as $othersStyleSheet) {
					$this->xhtml .= '<link rel="stylesheet" media="screen, print, handheld" type="text/css" href="./css/' . $othersStyleSheet . '"/>
					';
				}
			}
			$this->xhtml .= '-->
			  
		<!-- Meta information about the creator of this site -->
		<meta name="Author" lang="' . $header->getLang() . '" content="' . $header->getMetaAuthor() . '"/>
		<meta name="Publisher" content="' . $header->getMetaPublisher() . '"/>
		<!-- Meta information about this website -->
		<meta name="Description" content="' . $header->getMetaDescription() . '"/>
		<meta name="Keywords" content="' . $header->getMetaKeywords() . '"/>
		<meta name="Indentifier-URL" content="' . $header->getMetaUrl() . '"/>
		<!-- Meta information about the content -->
		<meta http-equiv="Content-Type" content="' . $header->getMetaContentType() . '" />
		<!-- Meta Robots -->
		<meta name="Robots" content="Index, Follow, freesurvey"/>
		<meta name="Revisit-after" content="15"/>
	</head>
	<!-- The body of the website -->
	<body>
';
	
	}
	
	// -------------------------------------------
	// Prepare header function
	// -------------------------------------------
	public function prepareMenu($menu) {
	
		$menuItems = $menu->getMenuItemList();
		$this->xhtml .= '
	<div id="menu">
		<ul id="tabs">';
		foreach( $menuItems as $menuItem ) {
			//$this->xhtml .= '<li>' . $menuItem->getTitle() . '<img src="' . $menuItem->getLink() . '" /> </li>
			$this->xhtml .= '
			<li ';
			
			if( $menuItem->isSelected() ) {
				$this->xhtml .= ' class="active"';
				//$this->xhtml .= '<span id="menu_selected">';
			}
			$this->xhtml .= '>';
			$this->xhtml .= '<a href="index.php?page=' . $menuItem->getLink() . '">' . $menuItem->getTitle() . '</a>';
			if( $menuItem->isSelected() ) {
				$this->xhtml .= '</span>';
			}	
			$this->xhtml .= '</li>';		
		}
		$this->xhtml .= '
		</ul>
	</div>';
	}
	

	// -------------------------------------------
	// Prepare page function
	// -------------------------------------------
	public function preparePage($page) {
		
		$articles = $page->getArticles();
		
		$this->xhtml .= '
	<div id="page">';
		if( count($articles) > 0 ) {
			foreach( $articles as $article ) {
			
				// Article ---------------------------
				$this->xhtml .= '<div class="article">';
					// Title -------------------------
					$this->xhtml .= '<div class="title">';
						$this->xhtml .= '' . $article->getTitle();
						$this->xhtml .= ' - ' . $article->getPublicatonDate();
					$this->xhtml .= '</div>';
					// Content -----------------------
					$this->xhtml .= '<div class="content">';
						$this->xhtml .= $article->getContent() . '<br />';
						$comments = $article->getComments();
					$this->xhtml .= '</div>';
				
				// Comments --------------------------
				if( count($comments) > 0 ) {
					$this->xhtml .= 'Comments :<br /><br />'; 
					foreach( $comments as $comment ) {
						$this->xhtml .= 'Number ' . $comment->getId();
						$this->xhtml .= ' from ' . $comment->getAuthor();
						//$comment->getIp() . '<br />';
						$this->xhtml .= ' at ' . $comment->getDate() . '<br /><br />';
						$this->xhtml .= $comment->getContent() . '<br />';
					}
				}
				
				$this->xhtml .= '</div>';
			}
		}
		$this->xhtml .= '
	</div>';
	}
	
	// -------------------------------------------
	// Prepare footer function
	// -------------------------------------------
	public function prepareFooter() {
	
	$this->xhtml .= '
	</body>
</html>';
	}
	
	// -------------------------------------------
	// Display html code
	// -------------------------------------------
	public function display() {
		print_r($this->xhtml);		
	}
	
}

?>
