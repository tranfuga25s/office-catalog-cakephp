<?php
class Promocion extends AppModel {
	var $name = 'Promocion';
	var $primaryKey = 'id_promocion';
	var $displayField = 'nombre';
	var $validate = array(
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'El nombre no puede estar vacio'
			)
		),
		'publicado' => array(
			'boolean' => array(
				'rule' => array('boolean')
			)
		)
	);

	function ultimo() {
	  return $this->find( 'first', array( 'conditions' => array( 'publicado' => true ), 'order' => array( 'modified' => 'asc' ) ) );
	}
}
?>