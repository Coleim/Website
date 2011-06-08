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
		$articleFileName = '../json/' . $lang . '/articles/' . $articleName . '.json';
		$this->fromJson($articleFileName);
	}
	
	private function fromJson($articleFileName) {
	
		// Get the content of the file.
		$jsonContent = file_get_contents($articleFileName);
		
		// Decode the json string
		$jsonArticle = json_decode($jsonContent);

		$this->title = $jsonArticle->{'title'};
		$this->publicatonDate = $jsonArticle->{'date'};
		$this->content = $jsonArticle->{'content'};
		
		
		// Check comments
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
