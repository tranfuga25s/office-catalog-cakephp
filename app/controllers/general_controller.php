<?php

class GeneralController extends AppController {

	var $name = "General";
	var $uses = '';
	var $helpers = array( 'Fck' );

	function admin_cpanel() {
		$this->layout = 'admin';
	}

	function admin_promociones() {
		$this->layout = 'admin';
	}

}