<?php


class Comments {

	private $htmlCode;

	public function Comment($articleName) {
		
	}
	
	public function printHtml() {
		print $this->htmlCode;
	}
}



class Article {

	private $htmlCode;
	private $comments;
	
	public function Article($articleName, $lang) {
	
		$XML = new DOMDocument(); 
		$XML->load( '../../data/xml/' . $lang . '/articles/' . $articleName . '.xml' ); 

		$XSL = new DOMDocument(); 
		$XSL->load( '../xslt_template/article.xsl' ); 

		$xsltProcessor = new XSLTProcessor();
		$xsltProcessor->importStylesheet( $XSL ); 

		$this->htmlCode .= $xsltProcessor->transformToXML( $XML ); 
		
		
		// Get comments
		$this->comments = new Comments($articleName);
	}
	
	public function printHtml() {
		print html_entity_decode($this->htmlCode);
	}
	
	public function printComments() {
		$this->comments->printHtml();
	}
}

?>
