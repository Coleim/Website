<?php

class Menu {
	private $menuItemList;
	
	public function Menu($filename, $lang) {
	
		// Get the content of the file.
		$jsonContent = file_get_contents('../json/' . $lang . '/menu/menu.json');

		// Decode the json string
		$jsonMenu = json_decode($jsonContent);
	
		// Get the values of the menu
		foreach ($jsonMenu as $menuObject) {			
			$itemName = $menuObject->{'name'};
			$itemLink = $menuObject->{'link'};
			
			$selected = false;
			if( $filename == $itemLink )	$selected = true;
			
			$this->menuItemList[] = new MenuItem($itemName, $itemLink, $selected);	
		}	
	}
	
	public function getMenuItemList() {
		return $this->menuItemList;
	}
}


/**
 * Menu Item class.
 * It is represent a tab of the menu bar.
 * Contains a link to the page it points to, 
 * and a boolean to know if this item is selected.
 */
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
