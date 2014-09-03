<?php $this->pageTitle = 'Vistas';
echo $this->javascript->link( 'prototype' );
?>
<script type="text/javascript" language="JavaScript">

function subida_completada( file, serverData, serverResponse ) {
	try {
		var progress = new FileProgress(file, this.customSettings.progressTarget);
		progress.setComplete();
		progress.setStatus("Completado.");
		progress.toggleCancel(false);

	} catch (ex) {
		this.debug(ex);
	}
	//Agrego la imagen a la lista que aparece
	$('miniatura').update( new Element( 'img' ).setStyle( { 'float': 'left', 'margin' : '2px' } ).update( serverData ) );
}
</script>
<div class="productos index">
	<h2>Vistas para el producto <?php echo $vista['Producto']['nombre']; ?></h2>
	<fieldset>
		<legend>Vista Actual</legend>
		<div>
			<?php echo $html->image( $vista['VistasProducto']['ruta'] ); ?>
		</div>
	</fieldset>
	<fieldset>
		<legend>Miniatura Actual</legend>
		<div id="miniatura">
			<?php if( $vista['VistasProducto']['miniatura'] != '' ) { echo $html->image( $vista['VistasProducto']['miniatura'] ); } ?>
		</div>
	</fieldset>
	<fieldset>
	<?php
	$variables = array(
			array( 'nombre' => 'id_vista', 'valor' => $vista['VistasProducto']['id_vista'] ),
			array( 'nombre' => 'id_producto', 'valor' => $vista['Producto']['id_producto'] )
			);
	 echo $swfUpload->crearsubida( 'Subir miniatura', Router::url( '/admin/vistas_productos/envio_miniatura' ), $variables, 1, "subida_completada" );
	?>
	</fieldset>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link( 'Listar Productos', array( 'controller' => 'productos', 'action' => 'index')); ?></li>
	</ul>
</div>