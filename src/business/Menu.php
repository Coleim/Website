<?php

class Menu {
	private $htmlCode;
	
	public function Menu($lang) {
		$XML = new DOMDocument(); 
		$XML->load( '../../data/xml/' . $lang . '/menu.xml' ); 

		$XSL = new DOMDocument(); 
		$XSL->load( '../xslt_template/menu.xsl' ); 

		$xsltProcessor = new XSLTProcessor();
		$xsltProcessor->importStylesheet( $XSL ); 

		$this->htmlCode = $xsltProcessor->transformToXML( $XML ); 
	}
	
	public function printHtml() {
		print $this->htmlCode;
	}

}

?>
