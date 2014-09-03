<?php $this->pageTitle = 'Producto';?>
<script type="text/javascript" language="JavaScript">

function subida_completada( respuesta ) {
	//Agrego la imagen a la lista que aparece
	if( respuesta != "" ) {
		$('miniatura').set( 'html', respuesta );
	}
}
</script>
<div class="productos index">
	<h2>Producto <?php echo $producto['Producto']['nombre']; ?></h2>
	<fieldset>
		<legend>Miniatura Actual</legend>
		<div id="miniatura">
			<?php if( $producto['Producto']['miniatura_vista'] != '' ) { echo $html->image( $producto['Producto']['miniatura_vista'] ); } ?>
		</div>
	</fieldset>
	<?php
	$variables = array(
			array( 'nombre' => 'id_producto', 'valor' => $producto['Producto']['id_producto'] )
			);
	 echo $this->Subidor->crearsubida( 'Subir miniatura', '/admin/productos/envio_miniatura', 'Producto', $variables, "subida_completada" );
	?>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link( 'Listar Productos', array( 'controller' => 'productos', 'action' => 'index')); ?></li>
	</ul>
</div>