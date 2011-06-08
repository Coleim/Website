<?php


class Comment {

	private $id;
	private $author;
	private $ip;
	private $date;
	private	$content;
	
	public function Comment($id, $author, $ip, $date, $content) {
		$this->id = $id;
		$this->author = $author;
		$this->ip = $ip;
		$this->date = $date;
		$this->content = $content;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getAuthor() {
		return $this->author;
	}
	
	public function getIp() {
		return $this->ip;
	}
	
	public function getDate() {
		return $this->date;
	}
	
	public function getContent() {
		return $this->content;
	}
	
	
	public function display() {
		echo nl2br($this->id);
		echo nl2br($this->author);
		echo nl2br($this->ip);
		echo nl2br($this->date);
		echo nl2br($this->content);
	}
}



class Article {

	private $content;
	private $comments;
	private $publicatonDate;
	private $title;

	public function Article($articleName, $lang) {
		// Get the real file name;
		$articleFileName = '../xml/' . $lang . '/pages/articles/' . $articleName . '.xml';
		$this->fromXml($articleFileName);
	}
	
	private function fromXml($articleFileName) {
		
		$startTime = getmicrotime();		
		// Create a DOMDocument for XML reading
		$objDOM = new DOMDocument();
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'Create a DOMDocument for XML reading : ' . $diff . ' ms<br />';

		
		$startTime = getmicrotime();		
		// Load the file
		$objDOM->load($articleFileName);
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'Load the file : ' . $diff . ' ms<br />';
		
		
		$startTime = getmicrotime();		
		// Get info about this article
		$article = $objDOM->getElementsByTagName("article");		
		if( $article->length > 0 ) {
			$this->title = $article->item(0)->attributes->getNamedItem('title')->nodeValue;
			$this->publicatonDate = $article->item(0)->attributes->getNamedItem('date')->nodeValue;
		}
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'Get info about this article : ' . $diff . ' ms<br />';
		
		
		$startTime = getmicrotime();		
		// Get the content
		$contents = $objDOM->getElementsByTagName("content");
		if( $contents->length > 0 ) {
			$this->content = $contents->item(0)->nodeValue;
		}
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'Get the content : ' . $diff . ' ms<br />';

		
		$startTime = getmicrotime();
		// Get the comments
		$comments = $objDOM->getElementsByTagName("comment");
		// For each comment on this article.
		foreach( $comments as $comment ) {
		
			$id = $comment->attributes->getNamedItem('id')->nodeValue;
			$author = $comment->attributes->getNamedItem('author')->nodeValue;
			$ip = $comment->attributes->getNamedItem('ip')->nodeValue;
			$date = $comment->attributes->getNamedItem('date')->nodeValue;
			$content = $comment->nodeValue;
			
			$this->comments[] = new Comment($id, $author, $ip, $date, $content);
		}
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'Get the comments : ' . $diff . ' ms<br />';
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function getPublicatonDate() {
		return $this->publicatonDate;
	}
	
	public function getContent() {
		return $this->content;
	}
	
	public function getComments() {
		return $this->comments;
	}
	
	
	public function display() {
		print_r($this->content);
		foreach( $this->comments as $comment ) {
			$comment->display();
		}
	}
}

?>
