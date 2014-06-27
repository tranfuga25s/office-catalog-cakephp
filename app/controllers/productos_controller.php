<?php
class ProductosController extends AppController {
	var $name = 'Productos';
	var $scaffold = 'admin';
	var $components = array( 'RequestHandler', 'Session' );
	var $helpers = array( 'Subidor', 'javascript' );

	var $paginate = array( 'order' => array( 'categoria_id', 'orden' ), 'limit' => 50 );

	function admin_index() {
		$this->layout = 'admin';
		$id_filtro = null;
		if( $this->Session->check( 'filtro_categoria' ) ) {
			$id_filtro = $this->Session->read( 'filtro_categoria' );
		}
		if( !isset( $this->params['named']['page'] ) ) {
			if( $this->data['Categoria']['categoria_id'] != null || $this->data['Categoria']['categoria_id'] != 0 ) {
				$id_filtro = $this->data['Categoria']['categoria_id'];
				$this->Session->write( 'filtro_categoria', $this->data['Categoria']['categoria_id'] );
			} else {
				$id_filtro = null;
			}
		}

		if( $id_filtro != null ) {
			$this->set( 'productos', $this->paginate( array( 'categoria_id' => $id_filtro ) ) );
			$this->set( 'categoria_id_ant', $id_filtro );
		} else {
			$this->set( 'productos', $this->paginate() );
			$this->set( 'categoria_id_ant', null );
			$this->Session->delete( 'filtro_categoria' );
		}
		$this->set( 'categorias', $this->Producto->Categoria->generatetreelist( null, null, null, '\-' ) );
	}

	function admin_add() {
		$this->layout = 'admin';
		if( !empty( $this->data ) ) {
			$o = $this->Producto->mayorOrden( $this->data['Producto']['categoria_id'] );
			$this->data['Producto']['orden'] = $o + 1;
			//$this->data['Producto']['novedad'] = true;
			if( $this->Producto->save( $this->data ) ) {
				$this->Session->setFlash( "Agregado correctamente" );
				$this->redirect( array( 'action' => 'index' ) );
			}
		}
		$this->set( 'categorias', $this->Producto->Categoria->generatetreelist( null, null, null, '\-' ) );
	}

	function admin_view( $id_producto = null ) {
		$this->layout = 'admin';
		$this->Producto->id = $id_producto;
		$this->set( 'producto', $this->Producto->read() );
	}

	function admin_publicar( $id_producto = null, $categoria_id_anterior = null ) {
		$this->Producto->id = $id_producto;
		$this->Producto->set( 'publicado', true );
		if( $this->Producto->save() ) {
			$this->Session->setFlash( "Producto publicado correctamente" );
			$this->redirect( array( 'action' => 'index' ) );
		} else {
			$this->Session->setFlash( "Producto NO publicado" );
			$this->redirect( array( 'action' => 'index' ) );
		}
	}

	function admin_despublicar( $id_producto = null ) {
		$this->Producto->id = $id_producto;
		$this->Producto->set( 'publicado', false );
		if( $this->Producto->save() ) {
			$this->Session->setFlash( "Producto despublicado correctamente" );
			$this->redirect( array( 'action' => 'index' ) );
		} else {
			$this->Session->setFlash( "Producto NO despublicado" );
			$this->redirect( array( 'action' => 'index' ) );
		}
	}

	function admin_edit( $id_producto = null, $categoria_id_anterior = null ) {
		$this->layout = 'admin';
		if( !empty( $this->data ) ) {
			if( $this->Producto->save( $this->data ) ) {
				$this->Session->setFlash( "Producto modificado correctamente" );
				$this->redirect( array( 'action' => 'index' ) );
			} else {
				$this->Session->setFlash( "Existio un error u omision al intentar guardar el producto" );
			}
		}
		$this->Producto->id = $id_producto;
		$this->set( 'categorias', $this->Producto->Categoria->generatetreelist( null, null, null, '\-' ) );
		$this->data = $this->Producto->read();
	}

	function admin_eliminar( $id_producto = null) {
		$this->layout = 'admin';
		$this->Session->setFlash( 'Todavia no implementado' );
		$this->redirect( array( 'action' => 'index' ) );
	}


	function admin_subir( $id_producto = null ) {
		$this->layout = 'admin';
		$this->Producto->unbindModel( array( 'hasMany' => array( "VistasProductos" ),
						     'belongsTo' => array( "Categoria" ),
						     'hasAndBelongsToMany' => array( "Colores" )  ) );

		$this->Producto->id = $id_producto;
		$o1 = $this->Producto->read( 'orden' );
		$oanterior = $o1['Producto']['orden'];
		if( $oanterior == 0 ) { return; }
		$cat = $this->Producto->read( 'categoria_id' );
		// Busco el producto anterior
		$anterior = $this->Producto->query( "SELECT id_producto, orden FROM productos AS Producto WHERE categoria_id = ".$cat['Producto']['categoria_id']. " AND orden < ".$oanterior. " ORDER BY orden DESC LIMIT 1" );
		//pr( $anterior );
		if( count( $anterior ) > 0 ) {
			$id_anterior = $anterior[0]['Producto']['id_producto'];
			$o2 = $anterior[0]['Producto']['orden'];
			if( $o2 == $o1 ) { $o2 = $o1['Producto']['orden'] - 1; }
			$this->Producto->query( "UPDATE productos SET orden = ".$o2." WHERE id_producto = ". $id_producto );
			$this->Producto->query( "UPDATE productos SET orden = ".$o1['Producto']['orden']." WHERE id_producto = ". $id_anterior );
		}
		//die();
		$this->redirect( array( 'action' => 'index' ) );
	}

	function admin_bajar( $id_producto = null, $categoria_id_anterior = null ) {
		$this->layout = 'admin';
		$this->Producto->unbindModel( array( 'hasMany' => array( "VistasProductos" ),
						     'belongsTo' => array( "Categoria" ),
						     'hasAndBelongsToMany' => array( "Colores" )  ) );
		$this->Producto->id = $id_producto;
		$a = $this->Producto->read( 'orden' );
		$oanterior = $a['Producto']['orden'];
		//echo "orden: ".$oanterior. "<br />";
		$cat = $this->Producto->read( 'categoria_id' );
		// Busco el producto anterior
		$anterior = $this->Producto->query( "SELECT id_producto, orden FROM productos AS Producto WHERE categoria_id = ".$cat['Producto']['categoria_id']. " AND orden > ".$oanterior. " ORDER BY orden ASC LIMIT 1" );
		//pr( $anterior );
		if( count( $anterior ) > 0 ) {
			$id_anterior = $anterior[0]['Producto']['id_producto'];
			$o2 = $anterior[0]['Producto']['orden'];
			$this->Producto->query( "UPDATE productos SET orden = ".$o2." WHERE id_producto = ". $id_producto );
			$this->Producto->query( "UPDATE productos SET orden = ".$oanterior." WHERE id_producto = ". $id_anterior );
		}
		//die();
		$this->redirect( array( 'action' => 'index' ) );
	}

	function admin_poner_novedad( $id_producto = null ) {
		$this->Producto->id = $id_producto;
		$this->Producto->set( 'novedad', true );
		if( $this->Producto->save() ) {
			$this->Session->setFlash( "Producto colocado como novedad correctamente" );
			$this->redirect( array( 'action' => 'index' ) );
		} else {
			$this->Session->setFlash( "Producto colocado como novedad - No se pudo realizar la acción" );
			$this->redirect( array( 'action' => 'index' ) );
		}
	}

	function admin_sacar_novedad( $id_producto = null ) {
		$this->Producto->id = $id_producto;
		$this->Producto->set( 'novedad', false );
		if( $this->Producto->save() ) {
			$this->Session->setFlash( "Producto sacado como novedad correctamente" );
			$this->redirect( array( 'action' => 'index' ) );
		} else {
			$this->Session->setFlash( "Producto sacado como novedad - No se pudo realizar la acción" );
			$this->redirect( array( 'action' => 'index' ) );
		}
	}
// 	function admin_colores( $id_producto = null ) {
// 		$this->layout = 'admin';
// 		if( !empty( $this->data ) ) {
// 			// Recibo el producto y un array de productos
// 			if( !empty( $this->data['Producto']['colores'] ) ) {
// 				if( $this->Producto->guardarColores( $this->data['Producto']['id_producto'], $this->data['Producto']['colores'] ) ) {
// 					$this->Session->setFlash( 'Colores guardados correctamente' );
// 				} else {
// 					$this->Session->setFlash( 'No se pudieron guardar los colores' );
// 				}
// 			} else {
// 				$this->Producto->eliminarColores( $this->data['Producto']['id_producto'] );
// 				$this->Session->setFlash( 'Colores eliminados correctamente' );
// 			}
// 			$this->redirect( array( 'action' => 'index' ) );
// 		}
// 		$this->Producto->id = $id_producto;
// 		$producto = $this->Producto->read();
// 		$colores_anteriores = $producto['Colores'];
// 		$colores2 = array();
// 		foreach( $colores_anteriores as $a ) {
// 			$colores2[$a['id_color']] = $a['nombre'];
// 		}
// 		$this->set( 'producto', $producto );
// 		$this->set( 'usados', $colores2 );
// 		$this->loadModel( 'Color' );
// 		$colores = $this->Color->find( 'list' );
// 		// elimino los colores que ya estan de la lista a asignar
// 		$this->set( 'colores', array_diff( $colores, $colores2 ) );
// 	}

	function admin_miniatura( $id_producto ) {
		$this->layout = 'admin';
		if( !empty( $this->data ) ) {
			$this->redirect( array( 'action' => 'index' ) );
		}
		$this->Producto->id = $id_producto;
		$this->set( 'producto', $this->Producto->read() );
	}

	function admin_envio_miniatura() {
		// El archivo se subio bien
		//pr( $this->data );
		if( $this->data['Producto']['archivo']['error'] == 0 ) {
			// Archivo subido correctamente
			// Verifico la extension
			$extensiones_permitidas = array( 'image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/jpg', 'image/pjpeg' );
			if( in_array( $this->data['Producto']['archivo']['type'], $extensiones_permitidas ) != false ) {
				// Lo muevo a su ubicacion
				$ubicacion = 'productos'.DS. $this->data['Producto']['archivo']['name'];
				$ruta = WWW_ROOT .'img'.DS. $ubicacion;
				if( rename( $this->data['Producto']['archivo']['tmp_name'], $ruta ) ) {
					if( !chmod( $ruta, 0755 ) ) {
						echo "No se pudo cambiar los permisos del archivo";
					}
					$dato = array( 'Producto' =>
							array(
								'miniatura_vista' => $ubicacion,
								'id_producto' => $this->data['Producto']['id_producto']
							)
						);
					if ( $this->Producto->save( $dato ) ){
						$this->log( "Archivo agregado correctamente a la base de datos" );
						// retorno el contenido para poner en la vista
						$this->layout = '';
						$this->set( 'producto', $this->Producto->read() );
						$this->render( 'miniatura_vista' );
                			} else {
						$this->Session->setFlash( __( 'Error al agregar el archivo a la base de datos' ) );
					}
				} else {
					echo "Error al mover el archivo";
				}
			} else {
				echo "El tipo de archivo ".$this->data['Producto']['archivo']['type']." no esta permitido";
			}
		} else {
			echo "No se pudo recibir correctamente el archivo";
		}
		$this->autoRender = false;
	}

	function beforeFilter() {
		$this->Auth->allow( array( 'ver', 'categoria', 'menu', 'novedades' ) );
	}

	function ver( $id_producto ) {
		//echo $id_producto;
		if( strstr( $id_producto, "producto" ) ) {
			$id_producto = str_replace( "producto", "", $id_producto );
			//echo "<b>test</b>".$id_producto;
		}
		$this->Producto->id = $id_producto;
		$producto = $this->Producto->read();
		//pr( $producto );
		$this->set( 'producto', $producto );
		// Buscar la categoria padre de la categoria del producto
		$this->Producto->Categoria->id = $producto['Categoria']['parent_id'];
		$this->set( 'categoria_padre', $this->Producto->Categoria->read() );
	}

	function categoria( $id_categoria = null ) {
		if( isset( $this->params['id_categoria'] ) ) {
			$id_categoria = $this->params['id_categoria'];
		}
		if( $id_categoria == null ) {
			pr($this->params);
			return array();
		} else {
			return $this->Producto->buscarProductosCategoria( $id_categoria );
		}
	}

	function menu() {
		if( $this->params['named']['id'] != null ) {
			// saco el numero de la cadena
			$id_categoria = substr( $this->params['named']['id'], 9 );
			// Busco todos los productos de esta categoria
			$this->set( 'datos', $this->Producto->buscarProductosCategoria( $id_categoria ) );
			//pr( $datos );
			$this->RequestHandler->respondAs( 'ajax' );
			$this->layout = '';
		} else { echo "Error de parametro"; $this->layout = ''; }
	}

	function admin_reordenar() {
		$resultado = $this->Producto->query( "SELECT id_producto, categoria_id, orden FROM productos AS Producto" );
		$orden = 1;
		$categoria = 0;
		foreach( $resultado as $producto ) {
			if( $categoria != $producto['Producto']['categoria_id'] ) {
				$orden = 1;
				$categoria = $producto['Producto']['categoria_id'];
			}
			$this->Producto->query( "UPDATE productos SET orden = ".$orden." WHERE id_producto = ".$producto['Producto']['id_producto'] );
			echo "UPDATE productos SET orden = ".$orden." WHERE id_producto = ".$producto['Producto']['id_producto']. "<br />";
			$orden++;
		}
		die();
		$this->redirect( array( 'action' => 'index' ) );
	}

	function novedades() {
		// Muestra la lista de novedades en la pagina principal
		$this->set( 'datos', $this->Producto->novedades() );
		$this->RequestHandler->respondAs( 'ajax' );
		$this->layout = '';
	}
}
?>