<?php

require_once('../business/Article.php');

class Page {

	private $articles;
	
	public function Page($fileName, $lang) {
		// Get the real file name;
		$fileName = $fileName . '.xml';
		
		$startTime = getmicrotime();		
		// Create a DOMDocument for XML reading
		$objDOM = new DOMDocument();
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'objDOM = : ' . $diff . ' ms<br />';
		
		
		$startTime = getmicrotime();		
		// Load the file
		$objDOM->load('../xml/' . $lang . '/pages/'. $fileName);
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'load file  : ' . $diff . ' ms<br />';
		
		$startTime = getmicrotime();		
		// Get the list of articles
		$articles = $objDOM->getElementsByTagName("article");
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'Get the list of articles  : ' . $diff . ' ms<br />';
		
		echo '<br /><br />';
		$startTime = getmicrotime();		
		// For each articles on this page.
		foreach( $articles as $article ) {
			$articleName = $article->attributes->getNamedItem('file')->nodeValue;
			$this->articles[] = new Article($articleName, $lang);
		}		
		echo '<br /><br />';
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'FOR articles  : ' . $diff . ' ms<br />';
	}
	
	public function getArticles() {
		return $this->articles;
	}

	
}

?>