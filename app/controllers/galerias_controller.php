<?php
class GaleriasController extends AppController {

	var $name = 'Galerias';

	var $components = array( 'RequestHandler', 'Session' );

	function admin_index() {
		$this->layout = 'admin';
		$this->Galeria->recursive = 0;
		$this->set('galerias', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid galeria', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('galeria', $this->Galeria->read(null, $id));
	}

	function admin_add() {
		$this->layout = 'admin';
		if (!empty($this->data)) {
			$this->Galeria->create();
			if ($this->Galeria->save($this->data)) {
				$this->Session->setFlash( 'La galeria ha sido agregada correctamente' );
				$this->redirect( array( 'action' => 'index' ) );
			} else {
				$this->Session->setFlash( 'La galeria no se pudo guardadar. Por favor intente nuevamente.' );
			}
		}
	}

	function admin_edit($id = null) {
		$this->layout = 'admin';
		if (!$id && empty($this->data)) {
			$this->Session->setFlash( 'Galeria invalida' );
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Galeria->save($this->data)) {
				$this->Session->setFlash( 'La galeria fue guardada correctamente' );
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash( 'La galeria no pudo ser guardada. Por favor, intente nuevamente.' );
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Galeria->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		$this->layout = 'admin';
		if (!$id) {
			$this->Session->setFlash( 'Galeria invalida - identificador' );
			$this->redirect( array( 'action' => 'index' ) );
		}
		// Agregar eliminación de los hijos
		if ($this->Galeria->delete($id)) {
			$this->Session->setFlash( 'Galeria eliminada correctamente' );
			$this->redirect( array( 'action' => 'index' ) );
		}
		$this->Session->setFlash( 'La Galeria no fue eliminada' );
		$this->redirect( array('action' => 'index' ) );
	}

	function admin_publicar($id = null) {
		$this->layout = 'admin';
		if (!$id) {
			$this->Session->setFlash( 'ID de galeria invalido' );
			$this->redirect( array( 'action' => 'index' ) );
		}
		// Agregar eliminación de los hijos
		$this->Galeria->id = $id;
		$this->Galeria->set( 'publicado', true );
		if ($this->Galeria->save()) {
			$this->Session->setFlash( 'Galeria publicada correctamente' );
			$this->redirect( array( 'action' => 'index' ) );
		}
		$this->Session->setFlash( 'No se pudo publicar la galeria correctamente' );
		$this->redirect( array('action' => 'index' ) );
	}

	function admin_despublicar($id = null) {
		$this->layout = 'admin';
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for galeria', true));
			$this->redirect(array('action'=>'index'));
		}
		// Agregar eliminación de los hijos
		$this->Galeria->id = $id;
		$this->Galeria->set( 'publicado', false );
		if ($this->Galeria->save()) {
			$this->Session->setFlash( 'Galeria despublicada correctamente' );
			$this->redirect( array( 'action' => 'index' ) );
		}
		$this->Session->setFlash( 'No se pudo despublicar la galeria correctamente' );
		$this->redirect(array('action' => 'index'));
	}

	function beforeFilter() {
		$this->Auth->allow( array( 'index', 'ver' ) );
	}

	function index() {
		// Muestra la lista en el menu derecho
		$this->RequestHandler->respondAs( 'ajax' );
		$this->layout = '';
		$this->set( 'datos', $this->Galeria->todosIndice() );
	}

	function ver( $id_galeria = null ) {
		// Muestra los items de una galerias
		$id = substr( $id_galeria, strlen( "galeria" ) );
		$this->Galeria->id = $id;
		$this->set( 'galeria', $this->Galeria->read() );
		$this->RequestHandler->respondAs( 'ajax' );
		$this->layout = '';
	}

	function admin_miniatura( $id_miniatura = null, $id_galeria = null ) {
		$this->layout = 'admin';
		if (!$id_galeria) {
			$this->Session->setFlash(__('Invalid id for galeria', true));
			$this->redirect(array( 'controller' => 'item_galerias', 'action' => 'index', $id_galeria ) );
		}
		if (!$id_miniatura) {
			$this->Session->setFlash(__('Invalid id for galeria', true));
			$this->redirect(array( 'controller' => 'item_galerias', 'action' => 'index', $id_galeria ) );
		}
		$this->Galeria->id = $id_galeria;
		$this->Galeria->set( 'id_miniatura', $id_miniatura );
		if( $this->Galeria->save() ) {
			$this->Session->setFlash( 'Miniatura colocada como predeterminadas correctamente' );
			$this->redirect( array( 'controller' => 'item_galerias', 'action' => 'index', $id_galeria ) );
		}
	}
}
?>