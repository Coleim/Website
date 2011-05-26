<?php

class Menu {
	private $menuItemList;
	
	public function Menu($filename, $lang) {
		
		// Create a DOMDocument for XML reading
		$objDOM = new DOMDocument();
		
		// Load the file
		$objDOM->load('../xml/' . $lang . '/menu/menu.xml');
		
		// Get the list of menu items
		$menu = $objDOM->getElementsByTagName("menuItem");

		// For each menu item on this page.
		foreach( $menu as $menuItem ) {

			$itemName = $menuItem->attributes->getNamedItem('name')->nodeValue;
			$itemLink = $menuItem->attributes->getNamedItem('link')->nodeValue;
			
			$selected = false;
			if( $filename == $itemLink )	$selected = true;
			
			$this->menuItemList[] = new MenuItem($itemName, $itemLink, $selected);	
		}
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
