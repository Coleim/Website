<?php

require_once('../business/Page.php');
require_once('../business/Menu.php');
require_once('../business/Header.php');


class Site {

	private $page;
	private $menu;
	private $header;
	
	public function Site($filename, $lang) {	
		$this->header = new Header($lang);		
		$this->menu = new Menu($lang);
		$this->page = new Page($filename, $lang);
	}
	
	public function getMenu() {
		return $this->menu;
	}
	
	public function getPage() {
		return $this->page;
	}
	
	public function getHeader() {
		return $this->header;
	}
	
	public function display() {
		$this->header->printHtml();
		
		print '<body>';
		
		$this->menu->printHtml();
		$this->page->printHtml();
		
		print '</body></html>';
	}
}

?>
