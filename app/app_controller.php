<?php

App::import( 'core', 'i18n' );
App::import( 'core', 'L10n' );

class AppController extends Controller {
	var $components = array( 'Session',
				 'Auth' => array(
					  'userModel' => 'usuario',
					  'autoRedirect' => array( 'controller' => 'general', 'action' => 'cpanel' ),
					  'loginAction' =>
						array(  'controller' => 'usuario',
							'action' => 'login',
							'plugin' => false,
							'admin' => true
						     ),
					  'loginError' => 'Su nombre de usuario o contraseña son incorrectos',
					  'authError' => 'Esta parte del sitio esta restringido para usado por administradores, ingrese por favor',
					  'fields' =>  array( 'username' => 'nombre', 'password' => 'contra' ),
					  'logoutRedirect' => array( 'admin' => false, 'controller' => 'pages', 'action' => 'display', 'quienes' )
					)
				);
	var $helpers = array( 'Javascript', 'Html', 'Session', 'Form', 'StringUrl' );

	function beforeFilter() {
		if( ( isset( $this->params['prefix'] ) && $this->params['prefix'] = 'admin' ) ) {
			$this->layout = 'admin';
		}
		$this->Auth->allow( 'index' );
		$this->Auth->allow( array('controller' => 'pages', 'action' => 'display', 'quienes') );
	}

}
?>