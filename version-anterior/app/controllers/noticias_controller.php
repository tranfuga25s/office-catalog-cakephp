<?php
class NoticiasController extends AppController {
	var $name = 'Noticias';
	var $scaffold = 'admin';
	var $helpers = array( 'Fck', 'Javascript' );

	function index() {
		$this->set( 'noticias', $this->Noticia->ultimas() );
	}

	function admin_index() {
		$this->layout = 'admin';
		$this->set( 'noticias', $this->paginate() );
	}

	function admin_add() {
		$this->layout = 'admin';
		if( !empty( $this->data ) ) {
			if( $this->Noticia->save( $this->data ) ) {
				$this->Session->setFlash( 'Noticia Guardada Correctamente' );
				$this->redirect( array( 'action' => 'index' ) );
			} else {
				$this->Session->setFlash( 'Existio un error al intentar guardar los datos' );
			}
		}
	}

	function admin_edit( $id_noticia = null ) {
		$this->layout = 'admin';
		if( !empty( $this->data ) ) {
			if( $this->Noticia->save( $this->data ) ) {
				$this->Session->setFlash( 'Noticia Guardada Correctamente' );
				$this->redirect( array( 'action' => 'index' ) );
			} else {
				$this->Session->setFlash( 'Existio un error al intentar guardar los datos' );
			}
		}
		if( $id_noticia == null ) {
			$this->Session->setFlash( 'El identificador de la noticia no puede ser nulo' );
			$this->redirect( array( 'action' => 'index' ) );
		}
		$this->Noticia->id = $id_noticia;
		$this->data = $this->Noticia->read();
	}

	function admin_publicar( $id_noticia = null ) {
		if( $id_noticia == null ) {
			$this->Session->setFlash( 'El identificador de la noticia no puede ser nulo' );
			$this->redirect( array( 'action' => 'index' ) );
		}
		$this->Noticia->id = $id_noticia;
		$this->Noticia->set( 'publicado', true );
		if( $this->Noticia->save() ) {
			$this->Session->setFlash( 'Noticia publicada correctamente' );
		} else {
			$this->Session->setFlash( 'La noticia no pudo ser publicada correctamente' );
		}
		$this->redirect( array( 'action' => 'index' ) );
	}

	function admin_despublicar( $id_noticia = null ) {
		if( $id_noticia == null ) {
			$this->Session->setFlash( 'El identificador de la noticia no puede ser nulo' );
			$this->redirect( array( 'action' => 'index' ) );
		}
		$this->Noticia->id = $id_noticia;
		$this->Noticia->set( 'publicado', false );
		if( $this->Noticia->save() ) {
			$this->Session->setFlash( 'Noticia despublicada correctamente' );
		} else {
			$this->Session->setFlash( 'La noticia no pudo ser despublicada correctamente' );
		}
		$this->redirect( array( 'action' => 'index' ) );
	}

}
?>