<?php

require_once('../business/Article.php');

class Page {

	private $articles;
	
	public function Page($fileName, $lang) {
		// Get the real file name;
		$fileName = $fileName . '.xml';
		
		// Create a DOMDocument for XML reading
		$objDOM = new DOMDocument();
		
		// Load the file
		$objDOM->load('../xml/' . $lang . '/pages/'. $fileName);
		
		// Get the list of articles
		$articles = $objDOM->getElementsByTagName("article");

		// For each articles on this page.
		foreach( $articles as $article ) {
			$articleName = $article->attributes->getNamedItem('file')->nodeValue;
			$this->articles[] = new Article($articleName, $lang);
		}		
	}
	
	public function getArticles() {
		return $this->articles;
	}

	
}

?>