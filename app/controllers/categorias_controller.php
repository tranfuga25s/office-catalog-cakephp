<?php
class CategoriasController extends AppController {
	var $name = 'Categorias';
	var $scaffold = 'admin';
	var $helpers = array( 'Paginator', 'Subidor' );

	function admin_index() {
		$this->set( 'categorias', $this->Categoria->generatetreelist( null, null, null, '\-' ) );
		$this->set( 'catpublicado', $this->Categoria->find( 'list', array( 'fields' => array( 'publicado' ) ) ) );
		$this->layout = 'admin';
	}

	function admin_bajar( $id_categoria ) {
		$this->Categoria->moveDown( $id_categoria, 1 );
		$this->Session->setFlash( 'Categoria subida' );
		$this->redirect( array( 'action' => 'index' ) );
	}

	function admin_subir( $id_categoria ) {
		$this->Categoria->moveUp( $id_categoria, 1 );
		$this->Session->setFlash( 'Categoria subida' );
		$this->redirect( array( 'action' => 'index' ) );
	}

	function admin_view( $id_categoria ) {
		$this->Categoria->id_categoria = $id_categoria;
		$this->set( 'categoria', $this->Categoria->read() );
		$this->layout = 'admin';
	}

	function admin_add() {
		$this->layout = 'admin';
		if( !empty( $this->data ) ) {
			if( $this->Categoria->save( $this->data ) ) {
				$this->Session->setFlash( 'Categoria agregada correctamente' );
				$this->redirect( array( 'action' => 'index' ) );
			} else {
				$this->Session->setFlash( 'Ocurri&oacute; un error al intentar guardar la categoria' );
			}
		} else {

			$this->set( 'categorias', $this->Categoria->generatetreelist( null, null, null, ' -' ) );
		}
	}

	function admin_edit( $id_categoria = null ) {
		$this->layout = 'admin';
		if( !empty( $this->data ) ) {
			if( $this->Categoria->save( $this->data ) ) {
				$this->Session->setFlash( 'Categoria Modificada correctamente' );
				$this->redirect( array( 'action' => 'index' ) );
			} else {
				$this->Session->setFlash( 'Ocurri&oacute; un error al intentar guardar la categoria' );
			}
		} else {
			$this->Categoria->id = $id_categoria;
			$this->data = $this->Categoria->read();
			$categorias = $this->Categoria->generatetreelist( null, null, null, ' -' );
			// elimino la misma categoria que es
			unset( $categorias[$this->data['Categoria']['id_categoria']] );
			$this->set( 'categorias', $categorias );
		}
	}

	function admin_cambiarImagen( $id_categoria = null ) {
		$this->layout = 'admin';
		$this->set( 'id_categoria', $id_categoria );
		$this->Categoria->id = $id_categoria;
		$this->set( 'categoria', $this->Categoria->read() );
	}


	function admin_envio() {
		//pr( $this->data );
		if( $this->data['Categoria']['archivo']['error'] == 0 ) {
			// Archivo subido correctamente
			// Verifico la extension
			$extensiones_permitidas = array( 'image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/jpeg', 'image/pjpeg' );
			if( in_array( $this->data['Categoria']['archivo']['type'], $extensiones_permitidas ) != false ) {
				// Lo muevo a su ubicacion
				$ubicacion = 'categorias'.DS . $this->data['Categoria']['archivo']['name'];
				$ruta = WWW_ROOT .'img'.DS. $ubicacion;
				if( rename( $this->data['Categoria']['archivo']['tmp_name'], $ruta ) ) {
					// cambio los permisos
					if( !chmod( $ruta, 0755 ) ) {
						echo "No se pudo cambiar los permisos del archivo";
					}
					$dato = array( 'Categoria' =>
							array(
								'imagen' => $ubicacion,
								'publicado' => true,
								'id_categoria' => $this->data['Categoria']['id_categoria']
							)
						);
					if ( $this->Categoria->save( $dato ) ){
						$this->log( "Archivo agregado correctamente a la base de datos" );
						$this->layout = '';
						$this->set( 'imagen', $ubicacion );
						$this->render( 'imagen' );
					} else {
						$this->Session->setFlash( __( 'Error al argregar el archivo a la base de datos' ) );
					}
				} else {
					echo "Error al mover el archivo";
				}
			} else {
				echo "El tipo de archivo ".$this->data['Categorias']['archivo']['type']." no esta permitido";
			}
		} else {
			echo "No se pudo recibir correctamente el archivo";
		}
		$this->autoRender = false;
	}

	function admin_publicar( $id_categoria = null ) {
		$this->Categoria->id = $id_categoria;
		$this->Categoria->set( 'publicado', true );
		if( $this->Categoria->save() ) {
			$this->Session->setFlash( 'Categoria publicada correctamente' );
		} else {
			$this->Session->setFlash( 'Error al publicar categoria' );
		}
		$this->redirect( array( 'action' => 'index' ) );
	}

	function admin_despublicar( $id_categoria = null ) {
		$this->Categoria->id = $id_categoria;
		$this->Categoria->set( 'publicado', false );
		if( $this->Categoria->save() ) {
			$this->Session->setFlash( 'Categoria despublicada correctamente' );
		} else {
			$this->Session->setFlash( 'Error al despublicar categoria' );
		}
		$this->redirect( array( 'action' => 'index' ) );
	}

	function beforeFilter() {
		$this->Auth->allow( array( 'index', 'buscar_hijas', 'ver', 'buscar_menu' ) );
	}

	function index() {
		// busco todos los padres y sus hijos directos
		///return $this->Categoria->generatetreelist( null, null, null, '-' );
		$ids_padres = $this->Categoria->find( 'list', array( 'conditions' => array( 'parent_id' => null, 'publicado' => true ), 'fields' => array( 'id_categoria' ), 'order' => array( 'lft' => 'asc' ) ) );
		$this->set( 'padres', $this->Categoria->find( 'all', array( 'conditions' => array( 'parent_id' => null, 'publicado' => true ), 'recursive' => -1, 'order' => array( 'lft' => 'asc' ) ) ) );
		$hijos = array();
		foreach( $ids_padres as $id_padre ) {
			$hijos[$id_padre] = $this->Categoria->find( 'all', array( 'conditions' => array( 'parent_id' => $id_padre, 'publicado' => true ), 'recursive' => -1, 'order' => array( 'lft' => 'asc' ) ) );
		}
		$this->set( 'hijos', $hijos );
		//$this->set( 'datos', $this->Categoria->find( 'all', array( 'conditions' => array( 'publicado' => true ), 'recursive' => -1 ) ) );
	}

	function ver( $id_categoria = null ) {
		if( $id_categoria == null ) {
			return;
		}
		$this->Categoria->id = $id_categoria;
		$categoria = $this->Categoria->read();
		$this->loadModel( 'Producto' );
		$categorias = $this->Categoria->find( 'list', array( 'conditions' => array( 'parent_id' => $id_categoria, 'publicado' => true ), 'recursive' => -1 , 'fields' => array( 'id_categoria' ) ) );
		$categorias[] = $id_categoria;
		$categoria['Productos'] = $this->Producto->find( 'all', array( 'conditions' => array( 'categoria_id' => $categorias, 'Producto.publicado' => 'true' )  ) );
		$this->set( 'categoria', $categoria );
	}

	function buscar_hijas( $id_categoria = null ) {
		return $this->Categoria->buscar_hijas( $this->params['id_categoria'] );
	}

	function buscar_menu( $id_categoria_padre = null ) {
		if( $this->params['padre'] != null ) { $id_categoria_padre = $this->params['padre']; }
		return $this->Categoria->find( 'all', array( 'conditions' => array( 'parent_id' => $id_categoria_padre, 'publicado' => true ), 'fields' => array( 'id_categoria', 'nombre' ), 'recursive' => -1, 'order' => array( 'lft' => 'asc' ) ) );
	}

}
?>