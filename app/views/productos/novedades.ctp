<?php
//pr( $datos );
if( count( $datos ) == 0 ) { echo "<small>No existe ningun producto novedoso</small>"; } else {
foreach( $datos as $producto ) {
	//pr( $producto );
	?>
	<div class="item-producto" id="producto<?php echo $producto['Producto']['id_producto']; ?>">
	<?php
	if( $producto['Producto']['miniatura_vista'] != null ) {
		echo $this->Html->image( $producto['Producto']['miniatura_vista'], array( 'id' => 'producto'.$producto['Producto']['id_producto'] )  );
	} else {
		echo $producto['Producto']['nombre'];
	} ?>
	</div>
	<script>
	$('producto<?php echo $producto['Producto']['id_producto']; ?>').addEvent( 'click', mostrarProducto );
	</script>
	<?php
 }
} // fin conteo != 0
?>