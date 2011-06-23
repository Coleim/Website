<?php

require_once('../business/Article.php');

class Page {

	private $articles;
	
	public function Page($fileName, $lang) {
	
		// Create a DOMDocument for XML reading
		$objDOM = new DOMDocument();
		
		// Load the file
		$objDOM->load('../../data/xml/pages/'. $fileName . '.xml');    

		// Get the list of articles
		$articles = $objDOM->getElementsByTagName("article");


		// For each articles on this page.
		foreach( $articles as $article ) {
		  $articleName = $article->attributes->getNamedItem('file')->nodeValue;
		  $this->articles[] = new Article($articleName, $lang);
		}    
	}
	
	
	public function printHtml() {
		print '<div id="page">';
		foreach ($this->articles as $article) {
			$article->printHtml();
			$article->printComments();
		}
		print '</div>';
	}
	
	
	public function getArticles() {
		return $this->articles;
	}

	
}

?>
