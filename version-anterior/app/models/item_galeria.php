<?php
class ItemGaleria extends AppModel {
	var $name = 'ItemGaleria';
	var $primaryKey = 'id_item';
	var $displayField = 'titulo';
	var $validate = array(
		'titulo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'El titulo no puede estar vacío',
			)
		),
		'publicado' => array(
			'boolean' => array(
				'rule' => array('boolean')
			)
		)
	);

	var $belongsTo = array(
		'Galeria' => array(
			'className' => 'Galeria',
			'foreignKey' => 'galeria_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	function ultimoOrden( $id_galeria ) {
		$datos = $this->find( 'first', array( 'conditions' => array( 'galeria_id' => $id_galeria ), 'fields' => 'MAX(orden)' ) );
		if( count( $datos ) == 0 ) {
			return -1;
		} else {
			return $datos[0]['MAX(orden)'];
		}
	}

	function adelantar( $id_item, $id_galeria ) {
		$this->id = $id_item;
		$posd = $this->read( 'orden' );
		$pos = $posd['ItemGaleria']['orden'];
		if( $pos == 0 ) { return; }
		$anteriores = $this->find( 'first', array( 'conditions' => array( 'galeria_id' => $id_galeria, 'orden <' => $pos ), 'order' => array( 'orden' ), 'recursive' => -1  ) );
		if( count( $anteriores ) > 0 ) {
			// existe una posicion anterior.. intecambio los ordenes
			$anterior = $anteriores['ItemGaleria']['orden'];
			$this->id = $id_item;
			$this->set( 'orden', $anterior );
			$this->save();
			$this->id = $anteriores['ItemGaleria']['id_item'];
			$this->set( 'orden', $pos );
			$this->save();
		}
	}

	function atrasar( $id_item, $id_galeria ) {
		$this->id = $id_item;
		$posd = $this->read( 'orden' );
		$pos = $posd['ItemGaleria']['orden'];
		$siguientes = $this->find( 'first', array( 'conditions' => array( 'galeria_id' => $id_galeria, 'orden >' => $pos ), 'order' => array( 'orden' => 'ASC' ), 'recursive' => -1 ) );
		if( count( $siguientes ) > 0 ) {
			// existe una posicion siguiente.. intecambio los ordenes
			$anterior = $siguientes['ItemGaleria']['orden'];
			$this->id = $id_item;
			$this->set( 'orden', $anterior );
			$this->save();
			$this->id = $siguientes['ItemGaleria']['id_item'];
			$this->set( 'orden', $pos );
			$this->save();
		}
	}

	function beforeDelete( $cascada ) {
		// Intento eliminar los archivos que se hayan generado
		$id = $this->id;
		$ruta = $this->read( 'ruta' );
		$miniatura = $this->read( 'minitaura' );
		$prefijo = WWW_ROOT . 'img' . DS . 'galeria' . DS . $id . DS;
		if( $miniatura != null || $miniatura != 0 ) {
			if( unlink( $prefijo . $ruta ) ) { return false; }
		}
		if( unlink( $prefijo . $ruta ) ) { return true; } else {  return true; }
		return false;
	}

}
?>