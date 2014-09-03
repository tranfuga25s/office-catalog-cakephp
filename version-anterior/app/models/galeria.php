<?php
class Galeria extends AppModel {
	var $name = 'Galeria';
	var $primaryKey = 'id_galeria';
	var $displayField = 'nombre';
	var $validate = array(
		'id_galeria' => array(
			'numeric' => array(
				'rule' => array('numeric')
			)
		),
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'El nombre de la galería no puede ser nulo',
			)
		),
		'publicado' => array(
			'boolean' => array( 'rule' => array('boolean') )
		)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'ItemGalerium' => array(
			'className' => 'ItemGaleria',
			'foreignKey' => 'galeria_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


	function todosIndice() {
		return $this->find( 'all', array( 'conditions' => array( 'publicado' => true ), 'fields' => array( 'nombre', 'id_miniatura', 'id_galeria' ), 'recursive' => -1 ) );
	}

}
?>