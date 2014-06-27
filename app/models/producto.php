<?php
class Producto extends AppModel {
	var $name = 'Producto';
	var $primaryKey = 'id_producto';
	var $displayField = 'nombre';

	var $belongsTo = array( 'Categoria' );

	var $hasMany = array( 'VistasProductos' => array( 'order' => 'VistasProductos.orden' ) );

// 	var $hasAndBelongsToMany = array(
// 		'Colores' => array(
// 			'className' => 'Color'
// 		)
// 	);
// 
// 	function afterDelete() {
// 		// Elimino la asociacion que tenga cualquier color con este producto eliminado
// 		if( $this->id != null ) {
// 			$this->query( "DELETE FROM colores_productos WHERE producto_id = ".$this->id );
// 			return true;
// 		}
// 	}
// 
// 	function eliminarColores( $id_producto ) {
// 		return $this->query( "DELETE FROM colores_productos WHERE producto_id = ".$id_producto );
// 	}
// 
// 	function guardarColores( $id_producto, $colores ) {
// 		$reg = $this->eliminarColores( $id_producto );
// 		foreach( $colores as $color ) {
// 			if( ! $this->query( "INSERT INTO colores_productos( producto_id, color_id, publicado ) VALUES ( ".$id_producto.", ".$color.", 1 )" ) )
// 			{ return false; }
// 		}
// 		return $reg;
// 	}

	function buscarProductosCategoria( $id_categoria ) {
		return $this->find( 'all', array( 'conditions' => array( 'Producto.publicado' => true, 'categoria_id' => $id_categoria ), 'recursive' => -1, 'order' => array( 'orden' ) ) );
	}

	function mayorOrden( $id_categoria ) {
		$datos = $this->query( "SELECT MAX(orden) FROM productos WHERE categoria_id = ".$id_categoria );
		if( $datos[0][0]['MAX(orden)'] == null ) { return 0; } else { return $datos[0][0]['MAX(orden)']; }
	}

	function novedades() {
		return $this->find( 'all', array( 'conditions' => array( 'Producto.publicado' => true, 'Producto.novedad' => true ), 'order' => array( 'modified' ) ) );
	}
}
?>