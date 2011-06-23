<?php

class Header {

	private $htmlCode;
	
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
	

	public function Header($lang) {
	
		$this->htmlCode = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
		$this->htmlCode .= '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' . $lang . '" >';
		
		$XML = new DOMDocument(); 
		$XML->load( '../../data/xml/header.xml' ); 

		$XSL = new DOMDocument(); 
		$XSL->load( '../xslt_template/header.xsl' ); 

		$xsltProcessor = new XSLTProcessor();
		$xsltProcessor->importStylesheet( $XSL ); 

		$this->htmlCode .= $xsltProcessor->transformToXML( $XML ); 

	}
	
	public function printHtml() {
		print $this->htmlCode;
	}
}



?>
