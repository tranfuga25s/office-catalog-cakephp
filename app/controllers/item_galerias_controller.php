<?php
class ItemGaleriasController extends AppController {

	var $name = 'ItemGalerias';
	var $helpers = array( 'Subidor', 'Javascript' );

	function admin_index( $id_galeria = null ) {
		$this->layout = 'admin';
		if( !$id_galeria ) {
			$this->Session->setFlash( 'Galería padre invalida' );
			$this->redirect( array( 'controller' => 'galerias', 'action' => 'index' ) );
		}
		$this->ItemGaleria->recursive = 0;
		$this->ItemGaleria->Galeria->id = $id_galeria;
		$this->set( 'galeria', $this->ItemGaleria->Galeria->read() );
		$this->set( 'itemGalerias', $this->paginate( array( 'galeria_id' => $id_galeria ) ) );
	}

	function admin_eliminar( $id = null ) {
		$this->layout = 'admin';
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for item galeria', true));
			$this->redirect( array( 'action'=>'index' ) );
		}
		$this->ItemGaleria->id = $id;
		$id_galeria_padre = $this->ItemGaleria->read( 'galeria_id' );
		if ($this->ItemGaleria->delete($id)) {
			$this->Session->setFlash( 'Item de galeria eliminado correctamente' );
			$this->redirect( array( 'action'=>'index', $id_galeria_padre['ItemGaleria']['galeria_id'] ) );
		}
		$this->Session->setFlash( 'El Item de galeria no fue eliminado' );
		$this->redirect( array( 'action' => 'index', $id_galeria_padre['ItemGaleria']['galeria_id'] ) );
	}

	function admin_envio() {
		// El archivo se subio bien
		if( $this->data['ItemGaleria']['archivo']['error'] == 0 ) {
			// Archivo subido correctamente
			// Verifico la extension
			$extensiones_permitidas = array( 'image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/jpeg', 'image/pjpeg', 'image/x-png' );
			if( in_array( $this->data['ItemGaleria']['archivo']['type'], $extensiones_permitidas ) ) {
				// Lo muevo a su ubicacion
				// veo si existe el directorio
				if( !file_exists( WWW_ROOT. 'img' . DS .'galerias'. DS . $this->data['ItemGaleria']['id_galeria'] ) ) {
					if( !mkdir(WWW_ROOT. 'img' . DS .'galerias'. DS . $this->data['ItemGaleria']['id_galeria'] ) ) {
						echo "no se pudo crear el directorio ".WWW_ROOT. 'img' . DS .'galerias'. DS . $this->data['ItemGaleria']['id_galeria']. ". Chequee los permisos";
						die();
					}
				}
				$ubicacion = 'img' . DS . 'galerias' . DS . $this->data['ItemGaleria']['id_galeria'] . DS . $this->data['ItemGaleria']['archivo']['name'];
				$ruta = WWW_ROOT . $ubicacion;
				if( rename( $this->data['ItemGaleria']['archivo']['tmp_name'], $ruta ) ) {
					// busco el mayor orden
					if( !chmod( $ruta, 0755 ) ) {
						echo "No se pudo cambiar los permisos del archivo";
					}
					$orden = $this->ItemGaleria->ultimoOrden( $this->data['ItemGaleria']['id_galeria'] );
					$dato = array( 'ItemGaleria' =>
							array(
								'ruta' => $ubicacion,
								'publicado' => true,
								'nombre' => $this->data['ItemGaleria']['archivo']['name'],
								'galeria_id' => $this->data['ItemGaleria']['id_galeria'],
								'orden' => $orden+1
							)
						);
					if ( $this->ItemGaleria->save( $dato ) ){
						$this->log( "Archivo agregado correctamente a la base de datos" );
						// retorno el contenido para poner en la vista
						$this->layout = '';
						$this->set( 'vista', $this->ItemGaleria->read() );
						$this->render( 'item' );
					} else {
						$this->Session->setFlash( __( 'Error al agregar el archivo a la base de datos' ) );
					}
				} else {
					echo "Error al mover el archivo";
				}
			} else {
				echo "El tipo de archivo ".$this->data['ItemGaleria']['archivo']['type']." no esta permitido";
			}
		} else {
			echo "No se pudo recibir correctamente el archivo";
		}
		$this->autoRender = false;
	}


	function admin_antes( $id_item = null, $id_galeria = null ) {
		$this->ItemGaleria->adelantar( $id_item, $id_galeria );
		$this->redirect( array( 'action' => 'index', $id_galeria ) );
	}

	function admin_despues( $id_item = null, $id_galeria = null ) {
		$this->ItemGaleria->atrasar( $id_item, $id_galeria );
		$this->redirect( array( 'action' => 'index', $id_galeria ) );
	}

	function admin_envio_miniatura() {
		// El archivo se subio bien
		//pr( $this->data );
		if( $this->data['ItemGaleria']['archivo']['error'] == 0 ) {
			// Archivo subido correctamente
			// Verifico la extension
			$extensiones_permitidas = array( 'image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/jpeg', 'image/pjpeg' );
			if( in_array( $this->data['ItemGaleria']['archivo']['type'], $extensiones_permitidas ) ) {
				// Lo muevo a su ubicacion
				$ubicacion = 'img' . DS .'galerias' . DS . $this->params['form']['id_galeria'] . DS;
				$ruta = WWW_ROOT . $ubicacion;
				if( rename( $this->data['ItemGaleria']['archivo']['tmp_name'], $ruta ) ) {
					if( !chmod( $ruta, 0755 ) ) {
						echo "No se pudo cambiar los permisos del archivo";
					}
					$dato = array( 'ItemGaleria' =>
							array(
								'miniatura' => $ubicacion,
								'id_item' => $this->params['form']['id_item'],
								'galeria_id' => $this->params['form']['galeria_id']
							)
						);
					if ( $this->ItemGaleria->save( $dato ) ){
						$this->log( "Archivo agregado correctamente a la base de datos" );
						// retorno el contenido para poner en la vista
						$this->layout = '';
						$this->set( 'vista', $this->ItemGaleria->read() );
						$this->render( 'miniatura' );
					} else {
						$this->Session->setFlash( __( 'Error al argregar el archivo a la base de datos' ) );
					}
				} else {
					echo "Error al mover el archivo";
				}
			} else {
				echo "El tipo de archivo ".$this->data['ItemGaleria']['archivo']['type']." no esta permitido";
				pr( $extensiones_permitidas );
			}
		} else {
			echo "No se pudo recibir correctamente el archivo";
		}
		//$this->autoRender = false;
	}

	function admin_publicar( $id_item = null, $id_galeria = null  ) {
		$this->ItemGaleria->id = $id_item;
		$this->ItemGaleria->set( 'publicado', true );
		if( $this->ItemGaleria->save() ) {
			$this->Session->setFlash( "Item publicado correctamente" );
		} else {
			$this->Session->setFlash( "Error al publicar el item" );
		}
		$this->redirect( array( 'action' => 'index', $id_galeria ) );
	}

	function admin_despublicar( $id_item = null, $id_galeria = null  ) {
		$this->ItemGaleria->id = $id_item;
		$this->ItemGaleria->set( 'publicado', false );
		if( $this->ItemGaleria->save() ) {
			$this->Session->setFlash( "Item despublicado correctamente" );
		} else {
			$this->Session->setFlash( "Error al despublicar el item" );
		}
		$this->redirect( array( 'action' => 'index', $id_galeria ) );
	}

	function beforeFilter() {
		$this->Auth->allow( 'ruta_miniatura' );
	}

	function ruta_miniatura() {
		if( !$this->params['id_miniatura'] ) { return ""; }
		$this->ItemGaleria->id = $this->params['id_miniatura'];
		$ruta = $this->ItemGaleria->read( 'minitaura' );
		if( $ruta['ItemGaleria']['minitaura'] != null || $ruta['ItemGaleria']['minitaura'] != 0 ) {
			return $ruta['ItemGaleria']['minitaura'];
		} else {
			$dato = $this->ItemGaleria->read( "ruta" );
			return $dato['ItemGaleria']['ruta'];
		}
	}
}
?>