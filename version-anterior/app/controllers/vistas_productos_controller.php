<?php
class VistasProductosController extends AppController {
	var $name = 'VistasProductos';
	var $helpers = array( 'Subidor', 'Javascript' );
	var $scaffold = 'admin';

	function admin_index( $id_producto = null ) {
		$this->layout = 'admin';
		if( $id_producto == null ) {
			$this->Session->setFlash( 'Por favor, ingrese mediante un producto a esta seccion' );
			$this->redirect( array( 'controller' => 'productos', 'action' => 'index' ) );
		}
		$this->loadModel( 'Producto' );
		$this->Producto->unbindModel( array( 'hasAndBelongsToMany' => array( 'Colores' ) ) );
		$this->Producto->id = $id_producto;
		$this->set( 'producto', $this->Producto->read() );
	}

	function admin_envio() {
		// El archivo se subio bien
		//pr( $this->data );
		if( $this->data['VistasProductos']['archivo']['error'] == 0 ) {
			// Archivo subido correctamente
			// Verifico la extension
			$extensiones_permitidas = array( 'image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/jpeg', 'image/pjpeg', 'image/x-png' );
			if( in_array( $this->data['VistasProductos']['archivo']['type'], $extensiones_permitidas ) ) {
				// Lo muevo a su ubicacion
				// veo si existe el directorio
				if( !file_exists( WWW_ROOT. 'img' . DS .'vistas'. DS . $this->data['VistasProductos']['id_producto'] ) ) {
					if( !mkdir(WWW_ROOT. 'img' . DS .'vistas'. DS . $this->data['VistasProductos']['id_producto'] ) ) {
						echo "no se pudo crear el directorio ".WWW_ROOT. 'img' . DS .'vistas'. DS . $this->data['VistasProductos']['id_producto']. ". Chequee los permisos";
						die();
					}
				}
				$ubicacion = 'img' . DS . 'vistas' . DS . $this->data['VistasProductos']['id_producto'] . DS . $this->data['VistasProductos']['archivo']['name'];
				$ruta = WWW_ROOT . $ubicacion;
				if( rename( $this->data['VistasProductos']['archivo']['tmp_name'], $ruta ) ) {
					// busco el mayor orden
					if( !chmod( $ruta, 0755 ) ) {
						echo "No se pudo cambiar los permisos del archivo";
					}
					$orden = $this->VistasProducto->ultimoOrden( $this->data['VistasProductos']['id_producto'] );
					$dato = array( 'VistasProducto' =>
							array(
								'ruta' => $ubicacion,
								'publicado' => true,
								'nombre' => $this->data['VistasProductos']['archivo']['name'],
								'producto_id' => $this->data['VistasProductos']['id_producto'],
								'orden' => $orden+1
							)
						);
					if ( $this->VistasProducto->save( $dato ) ){
						$this->log( "Archivo agregado correctamente a la base de datos" );
						// retorno el contenido para poner en la vista
						$this->layout = '';
						$this->set( 'vista', $this->VistasProducto->read() );
						$this->render( 'item' );
					} else {
						$this->Session->setFlash( __( 'Error al argregar el archivo a la base de datos' ) );
					}
				} else {
					echo "Error al mover el archivo";
				}
			} else {
				echo "El tipo de archivo ".$this->data['VistasProductos']['archivo']['type']." no esta permitido";
			}
		} else {
			echo "No se pudo recibir correctamente el archivo";
		}
		$this->autoRender = false;
	}

	function admin_envio_miniatura() {
		// El archivo se subio bien
		//pr( $this->data );
		if( $this->data['VistasProductos']['archivo']['error'] == 0 ) {
			// Archivo subido correctamente
			// Verifico la extension
			$extensiones_permitidas = array( 'image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/jpeg', 'image/pjpeg' );
			if( in_array( $this->data['VistasProductos']['archivo']['type'], $extensiones_permitidas ) ) {
				// Lo muevo a su ubicacion
				$ubicacion = 'img' . DS .'vistas'.DS.$this->params['form']['id_producto'].DS;
				$ruta = WWW_ROOT . $ubicacion;
				if( rename( $this->data['VistasProductos']['archivo']['tmp_name'], $ruta ) ) {
					if( !chmod( $ruta, 0755 ) ) {
						echo "No se pudo cambiar los permisos del archivo";
					}
					$dato = array( 'VistasProducto' =>
							array(
								'miniatura' => $ubicacion,
								'id_vista' => $this->params['form']['id_vista']
							)
						);
					if ( $this->VistasProducto->save( $dato ) ){
						$this->log( "Archivo agregado correctamente a la base de datos" );
						// retorno el contenido para poner en la vista
						$this->layout = '';
						$this->set( 'vista', $this->VistasProducto->read() );
						$this->render( 'miniatura' );
					} else {
						$this->Session->setFlash( __( 'Error al argregar el archivo a la base de datos' ) );
					}
				} else {
					echo "Error al mover el archivo";
				}
			} else {
				echo "El tipo de archivo ".$this->data['VistasProductos']['archivo']['type']." no esta permitido";
				pr( $extensiones_permitidas );
			}
		} else {
			echo "No se pudo recibir correctamente el archivo";
		}
		//$this->autoRender = false;
	}

	function admin_eliminar( $id_vista = null, $id_producto = null ) {
		$this->layout = 'admin';
		if( $this->VistasProducto->delete( $id_vista ) ) {
			$this->Session->setFlash( "Vista eliminada correctamente" );
		} else {
			$this->Session->setFlash( "Error al eliminar la vista" );
		}
		$this->redirect( array( 'action' => 'index', $id_producto ) );
	}

	function admin_publicar( $id_vista = null, $id_producto = null ) {
		$this->VistasProducto->id = $id_vista;
		$this->VistasProducto->set( 'publicado', true );
		if( $this->VistasProducto->save() ) {
			$this->Session->setFlash( "Vista publicada correctamente" );
		} else {
			$this->Session->setFlash( "Error al publicar la vista" );
		}
		$this->redirect( array( 'action' => 'index', $id_producto ) );
	}

	function admin_despublicar( $id_vista = null, $id_producto = null ) {
		$this->VistasProducto->id = $id_vista;
		$this->VistasProducto->set( 'publicado', false );
		if( $this->VistasProducto->save() ) {
			$this->Session->setFlash( "Vista despublicada correctamente" );
		} else {
			$this->Session->setFlash( "Error al despublicar la vista" );
		}
		$this->redirect( array( 'action' => 'index', $id_producto ) );
	}

	function admin_cambiar_minitura( $id_vista ) {
		$this->layout = 'admin';
		$this->VistasProducto->id = $id_vista;
		$this->set( 'vista', $this->VistasProducto->read() );
	}

	function admin_antes( $id_vista = null, $id_producto = null ) {
		$this->VistasProducto->adelantar( $id_vista, $id_producto );
		$this->redirect( array( 'action' => 'index', $id_producto ) );
	}

	function admin_despues( $id_vista = null, $id_producto = null ) {
		$this->VistasProducto->atrasar( $id_vista, $id_producto );
		$this->redirect( array( 'action' => 'index', $id_producto ) );
	}

}
?>