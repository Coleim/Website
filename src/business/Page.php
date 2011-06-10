<?php

require_once('../business/Article.php');

class Page {

	private $articles;
	
	public function Page($fileName, $lang) {
	
		// Get the content of the file.
		$jsonContent = file_get_contents('../json/pages/' . $fileName . '.json');
	
		// Decode the json string
		$jsonArticles = json_decode($jsonContent);
	
		// Get the values of the menu
		foreach ($jsonArticles as $article) {
			$this->articles[] = new Article($article->{'fileName'}, $lang);
		}
	}
	
	public function getArticles() {
		return $this->articles;
	}

	
}

?>
