<?php
class PromocionesController extends AppController {
	var $name = 'Promociones';
	var $scaffold = 'admin';
	var $helpers = array( 'SwfUpload' );
	var $components = array( 'SwfUpload' );

	function admin_index() {
		$this->layout = 'admin';
		$this->set( 'promociones', $this->paginate() );
	}

	function admin_add() {
		$this->layout = 'admin';
		if( !empty( $this->data ) ) {
			$this->redirect( array( 'action' => 'index' ) );
		}
	}

	function admin_view( $id_promocion = null ) {
		$this->layout = 'admin';
		$this->Promocion->id = $id_promocion;
		$this->set( 'promocion', $this->Promocion->read() );
	}

	function admin_edit( $id_promocion = null ) {
		$this->layout = 'admin';
		if( !empty( $this->data )) {
			if( $this->Promocion->save( $this->data ) ) {
				$this->Session->setFlash( 'Datos guardados correctamente' );
				$this->redirect( array( 'action' => 'index' ) );
			}
		}
		$this->Promocion->id = $id_promocion;
		$this->data = $this->Promocion->read();
	}

	function admin_envio() {
		// Rutas Necesarias
		$this->SwfUpload->uploadpath = 'img'.DS.'promociones'.DS;
		$this->SwfUpload->webpath = '/img/promociones/';
		$this->SwfUpload->overwrite = true;  //by default, SwfUploadComponent does NOT overwrite files
		if( isset( $this->params['form']['Filedata'] ) ) {
	               if( $this->SwfUpload->upload() ) {
				// El archivo se subio bien
				// busco el mayor orden
				$dato = array( 'Promocion' =>
						array(
							'ruta' => $this->SwfUpload->webpath . $this->SwfUpload->filename,
							'publicado' => true,
							'nombre' => $this->SwfUpload->filename
						)
					);
                		if ( $this->Promocion->save( $dato ) ){
					$this->log( "Archivo agregado correctamente a la base de datos" );
					$this->autoRender = false;
                		} else {
					$this->Session->setFlash( __( 'Error al argregar el archivo a la base de datos' ) );
					$this->autoRender = false;
				}
        		} else {
				$this->log( 'Error:'.$this->SwfUpload->errorMessage );
				$this->Session->setFlash($this->SwfUpload->errorMessage);
				$this->autoRender = false;
        		}
		} else { $this->autoRender = false; }
	}

	function admin_publicar( $id = null ) {
		$this->Promocion->id = $id;
		$this->Promocion->set( 'publicado', true );
		if( $this->Promocion->save() ) {
			$this->Session->setFlash( "Promocion publicada correctamente" );
		} else {
			$this->Session->setFlash( "Error al publicar la promocion" );
		}
		$this->redirect( array( 'action' => 'index' ) );
	}

	function admin_despublicar( $id = null ) {
		$this->Promocion->id = $id;
		$this->Promocion->set( 'publicado', false );
		if( $this->Promocion->save() ) {
			$this->Session->setFlash( "Promocion despublicada correctamente" );
		} else {
			$this->Session->setFlash( "Error al despublicar la promocion" );
		}
		$this->redirect( array( 'action' => 'index' ) );
	}

	function beforeFilter() {
		$this->Auth->allow( array( 'ver' ) );
	}

	function ver() {
		$this->set( 'datos', $this->Promocion->ultimo() );
	}

}
?>