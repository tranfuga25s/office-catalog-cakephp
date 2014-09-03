<?php
/* Colores Test cases generated on: 2010-08-20 11:08:31 : 1282315891*/
App::import('Controller', 'Colores');

class TestColoresController extends ColoresController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ColoresControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.color');

	function startTest() {
		$this->Colores =& new TestColoresController();
		$this->Colores->constructClasses();
	}

	function endTest() {
		unset($this->Colores);
		ClassRegistry::flush();
	}

}
?>