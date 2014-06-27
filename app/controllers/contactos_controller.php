<?php
class ContactosController extends AppController {
	var $name = 'Contactos';
	var $uses = '';
	var $components = array( 'Email' );

	function beforeFilter() {
		$this->Auth->allow( array( 'index', 'enviar' ) );
	}

	function index() {
	}

	
	function enviar() {
		// Datos enviados teoricamente, los verifico
		//pr( $this->data ); die();
		$datos = $this->data['Contacto'];
		if( $datos['nombre'] == '' ) {
			$this->Session->setFlash( 'Por favor ingrese un nombre.' );
			$this->redirect( array( 'action' => 'index' ) );
		} else if( $datos['apellido'] == '' ) {
			$this->Session->setFlash( 'Por favor ingrese un apellido.' );
			$this->redirect( array( 'action' => 'index' ) );
		} else if( $datos['email'] == '' ) {
			$this->Session->setFlash( 'Por favor ingrese un email para poder contactarnos con usted.' );
			$this->redirect( array( 'action' => 'index' ) );
		} else if( $datos['consulta'] == '' ) {
			$this->Session->setFlash( 'Por favor ingrese una consulta.' );
			$this->redirect( array( 'action' => 'index' ) );
		}
		if( $datos['donde'] == 1 ) {
			$this->Email->to = 'Info LaOficina Muebleria <info@laoficinamuebles.com.ar>';
		} else if( $datos['donde'] == 2 ) {
			$this->Email->to = 'Administracion La Oficina Muebleria <admn@laoficinamuebles.com.ar>';
		} else {
			$this->Email->to = 'Info LaOficina Muebleria <info@laoficinamuebles.com.ar>';
		}
		$this->Email->from = 'Pagina Web La Oficina Muebleria <no-responder@laoficinamuebles.com.ar>';
		$this->Email->subject = 'Nuevo contacto por la web';
		$this->Email->replyTo = $datos['email'];
		$this->Email->template = 'contacto';
		$this->Email->sendAs = 'both';
		$this->set( 'datos', $datos );
		$this->Email->send();
		$this->render( 'agradecimiento' );
	}

}
?>