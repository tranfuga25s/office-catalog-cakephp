<?php $this->pageTitle = 'Cambiar imagen'; ?>
<div class="colores index">
	<h2>Cambiar imagen para esta categoria</h2>
	<p><b>Atencion:</b>Si usted sube una imagen reemplazara a la imagen existente.</p>
	<fieldset>
	<legend>Imagen Actual</legend>
	<div id="imagen">
		<?php echo $this->Html->image( $categoria['Categoria']['imagen'] ); ?>
	</div>

	<script>
		function cambiarImagen( contenido ) {
			if( contenido != "" ) {
				$('imagen').set( 'html', contenido );
			}
		}
	</script>
	</fieldset>
	<?php
	$variables = array(
			array( 'nombre' => 'id_categoria', 'valor' => $id_categoria ),
			array( 'nombre' => 'campo', 'valor' => '"imagen"' )
		);
	echo $this->Subidor->crearsubida( 'Imagen comun', '/admin/categorias/envio', 'Categoria', $variables, "cambiarImagen" );
	?>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link( 'Listar Categorias', array('action' => 'index'));?></li>
	</ul>
</div>