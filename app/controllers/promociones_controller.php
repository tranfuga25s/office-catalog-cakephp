<?php
class PromocionesController extends AppController {
	var $name = 'Promociones';
	var $scaffold = 'admin';
	var $helpers = array( 'Subidor' );
	var $components = array( 'SwfUpload' );

	function admin_index() {
		$this->layout = 'admin';
		$this->set( 'promociones', $this->paginate() );
	}

	function admin_add() {
		$this->layout = 'admin';
		if( !empty( $this->data ) ) {
			// Muevo el archivo desde el temp a su lugar
			if( $this->data['Promocion']['ruta']['error'] == 0 ) {
				$destino = 'img' . DS . 'promociones' . DS;
				if( !move_uploaded_file( $this->data['Promocion']['ruta']['tmp_name'], $destino . $this->data['Promocion']['ruta']['name'] ) ) {
					$this->Session->setFlash( 'Hubo un error al intentar copiar el archivo a su ubicación final.' );
					$this->redirect( array( 'action' => 'index' ) );
				}
				$this->data['Promocion']['ruta'] = $destino . $this->data['Promocion']['ruta']['name'];
			} else {
				$this->Session->setFlash( 'hubo un error al intentar subir el archivo' );
				$this->redirect( array( 'action' => 'index' ) );
			}
			if( $this->Promocion->save( $this->data ) ) {
				$this->Session->setFlash( 'Promoción agregada correctamente' );
				$this->redirect( array( 'action' => 'index' ) );
			} else {
				$this->Session->setFlash( 'No se pudo guardar la promoción' );
			}
		}
	}

	function admin_view( $id_promocion = null ) {
		$this->layout = 'admin';
		$this->Promocion->id = $id_promocion;
		$this->set( 'promocion', $this->Promocion->read() );
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
		$dato = $this->Promocion->ultimo();
		return $dato['Promocion']['ruta'];
	}

}
?>