<?php
class Categoria extends AppModel {
	var $name = 'Categoria';
	var $primaryKey = 'id_categoria';
	var $displayField = 'nombre';
	var $actsAs = array( 'Tree' );

	var $hasMany = array(
		'Productos' => array(
			'className' => 'Producto',
			'dependent' => true
		)
	);

	function buscar_hijas( $id_categoria ) {
		return $this->find( 'all', array( 'conditions' => array( 'publicado' => true, 'parent_id' => $id_categoria ), 'limit' => 5 ) );
	}
}
?>