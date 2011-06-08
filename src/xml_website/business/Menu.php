<?php

class Menu {
	private $menuItemList;
	
	public function Menu($filename, $lang) {
		$startTime = getmicrotime();
		// Create a DOMDocument for XML reading
		$objDOM = new DOMDocument();
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo '$objDOM = new DOMDocument(); : ' . $diff . ' ms<br />';
		
		
		$startTime = getmicrotime();
		// Load the file
		$objDOM->load('../xml/' . $lang . '/menu/menu.xml');
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'objDOM->load : ' . $diff . ' ms<br />';
		
		
		$startTime = getmicrotime();
		// Get the list of menu items
		$menu = $objDOM->getElementsByTagName("menuItem");
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'menu = : ' . $diff . ' ms<br />';
		
		
		$startTime = getmicrotime();
		// For each menu item on this page.
		foreach( $menu as $menuItem ) {

			$itemName = $menuItem->attributes->getNamedItem('name')->nodeValue;
			$itemLink = $menuItem->attributes->getNamedItem('link')->nodeValue;
			
			$selected = false;
			if( $filename == $itemLink )	$selected = true;
			
			$this->menuItemList[] = new MenuItem($itemName, $itemLink, $selected);	
		}
		$intTime = getmicrotime();
		$diff = bcsub($intTime,$startTime,7);
		echo 'For loop : ' . $diff . ' ms<br />';
		echo '<br /><br />';
	}
	
	public function getMenuItemList() {
		return $this->menuItemList;
	}
	
}

class MenuItem {
	private $title;
	// link 
	private $link;
	private $selected;
	
	public function MenuItem($title, $link, $selected) {
		$this->title = $title;
		$this->link = $link;
		$this->selected = $selected;
	}
	
	public function getTitle() {
		return $this->title;
	}

	public function getLink() {
		return $this->link;
	}
	
	public function isSelected() {
		return $this->selected;
	}
}

?>
