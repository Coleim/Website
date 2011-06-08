<?php

class LanguageManager {

	private $currentLanguage;
	
	public function LanguageManager() {
	
		if( isset($_GET['lang']) ) {
			$this->currentLanguage = $_GET['lang'];
			setcookie('lang', $this->currentLanguage, time() + 365*24*3600, null, null, false, true);
		} else {
			if ( isset($_COOKIE['lang']) ) {
				$this->currentLanguage = $_COOKIE['lang'];
				setcookie('lang', $this->currentLanguage, time() + 365*24*3600, null, null, false, true);
			} else {
				$this->currentLanguage = 'fr';
				setcookie('lang', $this->currentLanguage, time() + 365*24*3600, null, null, false, true);
			}
		}	
	}
	
	public function getCurrentLanguage() {
		return $this->currentLanguage;
	}
	
}

?>
