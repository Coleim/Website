<?php

require_once('../business/Page.php');
require_once('../business/Menu.php');
require_once('../business/Header.php');


class Site {

	private $page;
	private $menu;
	private $header;
	
	public function Site($filename, $lang) {
	
	echo '<br /><br />';
		$startTime = getmicrotime();
		$this->menu = new Menu($filename, $lang);
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'Temps creation Menu : ' . $diff . ' ms<br />';
		
		echo '<br /><br />';
		
		$startTime = getmicrotime();
		$this->page = new Page($filename, $lang);
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'Temps creation Page : ' . $diff . ' ms<br />';
				
		echo '<br /><br />';
		
		
        //TODO Passer le css en parametre
		$this->header = new Header($filename, $lang);		
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
}

?>
