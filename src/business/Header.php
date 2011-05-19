<?php

class Header {

	private $xhtml;
	
	private $docType;				// string
	private $lang;					// string
	private $title;					// string
	private $cssFile;				// string
	private $alternateStyleSheets;	// array
	private $otherStyleSheets;		// array
	private $metaAuthor;			// string
	private $metaPublisher;			// string
	private $metaDescription;		// string
	private $metaKeywords;			// string
	private $metaUrl;				// string
	private $metaContentType;		// string
	
	        //TODO Passer le css en parametre
	public function Header($filename, $lang) {
	
		$this->docType = 'html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"';
		$this->lang = 'fr';
		$this->title = '- Clément Oliva - ' . $filename ;
        //TODO Passer le css en parametre
		$this->cssFile = 'style3.css';
		$this->alternateStyleSheets[] = 'style.css';
		$this->alternateStyleSheets[] = 'style4.css';
		//$this->otherStyleSheets[] = 'codeColor.css';
		//$this->otherStyleSheets[] = 'code.css';
		$this->metaAuthor = 'Clement Oliva';
		$this->metaPublisher = 'Clement Oliva';
		$this->metaDescription = 'Clement Oliva. Page personnelle. CV, Projets, ...';
		$this->metaKeywords = 'Clément, Oliva, Clément OLIVA, Clément Oliva, OLIVA, clement oliva, clement, oliva, Institut, Supérieur, Informatique, Modélisation, Applications, Institut Supérieur d\'Informatique de Modélisation et de leurs Applications, GamePlay, gameplay, Gameplay, Game, Play, play, game, game play, moteur physique, game engine, physical engine, game programming, google earth, c++, java, Informatique, Divinity2, Larian, informatique, jeux, vidéo, jeux vidéo, video, jeux video, jeu, video game, game, games, programmation, isima, ISIMA, Amadeus, AMADEUS, MPLANET, mplanet, MPlanet, Japon, Kendo, Tokyo, Todai, Tokyo Daigaku';
		$this->metaUrl = 'http://coleim.webou.net';
		$this->metaContentType = 'text/html; charset=UTF-8';
	}
	
	
	
	
	public function getDocType() {
		return $this->docType;
	}

	public function getLang() {
		return $this->lang;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getCssFile() {
		return $this->cssFile;
	}

	public function getAlternateStyleSheets() {
		return $this->alternateStyleSheets;
	}

	public function getOtherStyleSheets() {
		return $this->otherStyleSheets;
	}

	public function getMetaAuthor() {
		return $this->metaAuthor;
	}

	public function getMetaPublisher() {
		return $this->metaPublisher;
	}

	public function getMetaDescription() {
		return $this->metaDescription;
	}

	public function getMetaKeywords() {
		return $this->metaKeywords;
	}

	public function getMetaUrl() {
		return $this->metaUrl;
	}
	
	public function getMetaContentType() {
		return $this->metaContentType;
	}
	
	
	public function display() {
		echo $this->xhtml;
	}
}



?>
