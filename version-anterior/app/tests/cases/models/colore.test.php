<?php
/* Colore Test cases generated on: 2010-08-10 00:08:54 : 1281411294*/
App::import('Model', 'Colore');

class ColoreTestCase extends CakeTestCase {
	var $fixtures = array('app.colore');

	function startTest() {
		$this->Colore =& ClassRegistry::init('Colore');
	}

	function endTest() {
		unset($this->Colore);
		ClassRegistry::flush();
	}

}
?>