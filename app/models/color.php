<?php
class Color extends AppModel {
	var $name = 'Color';
	var $primaryKey = 'id_color';
	var $displayField = 'nombre';
	var $validate = array(
		'id_color' => array( 'numeric' => array( 'rule' => array('numeric'), ) ),
		'nombre' => array('notempty' => array( 'rule' => array('notempty') ) )
	);

	var $hasAndBelongsToMany = array(
		'Productos' => array(
			'className' => 'Producto'
		)
	);

	function afterDelete() {
		// Elimino la asociacion que tenga cualquier producto con este color eliminado
		if( $this->id != null ) {
			$this->query( "DELETE FROM colores_productos WHERE color_id = ".$this->id );
			return true;
		}
	}
}
?>