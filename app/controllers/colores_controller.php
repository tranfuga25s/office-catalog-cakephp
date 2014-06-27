<?php
class ColoresController extends AppController {
	var $name = 'Colores';
	var $components = array( 'SwfUpload' );
	var $helpers = array( 'SwfUpload' );
	var $scaffold = 'admin';

	function admin_index() {
		$this->set( 'colores', $this->paginate() );
		$this->layout = 'admin';
	}

	function admin_add() {
		$this->layout = 'admin';
		if( !empty( $this->data ) ) {
			if( $this->Color->save( $this->data ) ) {
				$this->Session->setFlash( 'Color agregado correctamente' );
				$this->redirect( array( 'action' => 'index' ) );
			} else {
				$this->Session->setFlash( 'Error al intentar guardar los datos' );
			}
		}
	}

	function admin_edit( $id_color = null ) {
		$this->layout = 'admin';
		if( !empty( $this->data ) ) {
			if( $this->Color->save( $this->data ) ) {
				$this->Session->setFlash( 'Color agregado correctamente' );
				$this->redirect( array( 'action' => 'index' ) );
			} else {
				$this->Session->setFlash( 'Error al intentar guardar los datos' );
			}
		}
		$this->Color->id = $id_color;
		$this->data = $this->Color->read();
	}

	function admin_cambiarImagen( $id_color ) {
		$this->layout = 'admin';
		$this->set( 'id_color', $id_color );
	}


	// Funcion donde se reciben la imagenes de los colores
	function admin_envios() {
		// Rutas Necesarias
		$this->SwfUpload->uploadpath = 'img'.DS.'colores'.DS;
		$this->SwfUpload->webpath = '/img/colores/';
		$this->SwfUpload->overwrite = true;  //by default, SwfUploadComponent does NOT overwrite files
		if( isset( $this->params['form']['Filedata'] ) ) {
	               if( $this->SwfUpload->upload() ) {
				// El archivo se subio bien
				$dato = array( 'Color' =>
						array(
							'imagen' => $this->SwfUpload->webpath . $this->SwfUpload->filename,
							'publicado' => true,
							'id_color' => $this->params['form']['id_color']
						)
					);
                		if ( $this->Color->save( $dato ) ){
                    			//Debugger::log( __( "Archivo agregado correctamente a la base de datos" ) );
					$this->log( "Archivo agregado correctamente a la base de datos" );
                		} else {
					$this->Session->setFlash( __( 'Error al argregar el archivo a la base de datos' ) );
				}
        		} else {
				$this->log( 'Error:'.$this->SwfUpload->errorMessage );
				//Debbuger::log( 'Error:'.$this->SwfUpload->errorMessage );
				$this->Session->setFlash($this->SwfUpload->errorMessage);
        		}
		}
		$this->autoRender  = false;
	}

	function admin_publicar( $id_color = null ) {
		if( $id_color == null ) {
			$this->Session->setFlash( 'El identificador del  color no puede ser nulo' );
			$this->redirect( array( 'action' => 'index' ) );
		}
		$this->Color->id = $id_color;
		$this->Color->set( 'publicado', true );
		if( $this->Color->save() ) {
			$this->Session->setFlash( 'Color publicado correctamente' );
		} else {
			$this->Session->setFlash( 'El color no pudo ser publicada correctamente' );
		}
		$this->redirect( array( 'action' => 'index' ) );
	}

	function admin_despublicar( $id_color = null ) {
		if( $id_color == null ) {
			$this->Session->setFlash( 'El identificador del  color no puede ser nulo' );
			$this->redirect( array( 'action' => 'index' ) );
		}
		$this->Color->id = $id_color;
		$this->Color->set( 'publicado', false );
		if( $this->Color->save() ) {
			$this->Session->setFlash( 'Color despublicado correctamente' );
		} else {
			$this->Session->setFlash( 'El color no pudo ser publicada correctamente' );
		}
		$this->redirect( array( 'action' => 'index' ) );
	}
}
?>