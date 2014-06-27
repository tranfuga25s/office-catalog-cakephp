<?php
class VistasProducto extends AppModel {
	var $name = 'VistasProducto';
	var $primaryKey = 'id_vista';
	var $displayField = 'nombre';
	var $validate = array(
		'id_vista' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'publicado' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Producto' => array(
			'className' => 'Producto',
			'foreignKey' => 'producto_id'
		)
	);

	function ultimoOrden( $id_producto ) {
		$datos = $this->query( "SELECT MAX(orden) FROM vistas_productos WHERE producto_id = ". $id_producto );
		if( count( $datos ) == 0 ) {
			return -1;
		} else {
			return $datos[0][0]['MAX(orden)'];
		}
	}

	function adelantar( $id_vista, $id_producto ) {
		$this->id = $id_vista;
		$posd = $this->read( 'orden' );
		$pos = $posd['VistasProducto']['orden'];
		if( $pos == 0 ) { return; }
		$anteriores = $this->find( 'first', array( 'conditions' => array( 'producto_id' => $id_producto, 'orden <' => $pos ), 'order' => array( 'orden' ), 'recursive' => -1  ) );
		if( count( $anteriores ) > 0 ) {
			// existe una posicion anterior.. intecambio los ordenes
			$anterior = $anteriores['VistasProducto']['orden'];
			$this->id = $id_vista;
			$this->set( 'orden', $anterior );
			$this->save();
			$this->id = $anteriores['VistasProducto']['id_vista'];
			$this->set( 'orden', $pos );
			$this->save();
		}
	}

	function atrasar( $id_vista, $id_producto ) {
		$this->id = $id_vista;
		$posd = $this->read( 'orden' );
		$pos = $posd['VistasProducto']['orden'];
		$siguientes = $this->find( 'first', array( 'conditions' => array( 'producto_id' => $id_producto, 'orden >' => $pos ), 'order' => array( 'orden' => 'ASC' ), 'recursive' => -1 ) );
		if( count( $siguientes ) > 0 ) {
			// existe una posicion siguiente.. intecambio los ordenes
			$anterior = $siguientes['VistasProducto']['orden'];
			$this->id = $id_vista;
			$this->set( 'orden', $anterior );
			$this->save();
			$this->id = $siguientes['VistasProducto']['id_vista'];
			$this->set( 'orden', $pos );
			$this->save();
		}
	}
}
?>