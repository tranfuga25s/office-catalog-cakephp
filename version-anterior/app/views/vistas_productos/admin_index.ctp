<?php $this->pageTitle = 'Vistas'; ?>
<script type="text/javascript" language="JavaScript">

function subida_completada( respuesta ) {
	//Agrego la imagen a la lista que aparece
	$('imagenes').adopt( new Element( 'div' ).setStyles( { 'float': 'left', 'margin' : '2px' } ).set( 'html', respuesta ) );
}
</script>
<div class="productos index">
	<h2>Vistas para el producto <?php echo $producto['Producto']['nombre']; ?></h2>
	<fieldset>
		<legend>Vistas Actuales</legend>
		<div id="imagenes">
	<?php
		foreach( $producto['VistasProductos'] as $vista ) {
			?>
			<div style="float: left; margin: 2px;">
				<table cellspacing="0" border="0" cellpadding="0" align="center" bgcolor="#d3d3d3" style="border-bottom-color : #d4d4d4; border-bottom-style : dashed; border-bottom-width : 2px; border-left-color : #d4d4d4; border-left-style : dashed; border-left-width : 2px; border-right-color : #d4d4d4; border-right-style : dashed; border-right-width : 2px; border-top-color : #d4d4d4; border-top-style : dashed; border-top-width : 2px; margin: 2px">
				 <tbody>
					<tr>
						<td align="center" valign="middle" id="imagen<?php echo $vista['id_vista']; ?>">
							<img width="250" src="<?php echo $vista['ruta']; ?>" />
						</td>
						<td>
							<div class="acciones"><ul>
								<li><?php echo $this->Html->link( 'Eliminar', array( 'controller' => 'vistas_productos', 'action' => 'eliminar', $vista['id_vista'], $vista['producto_id'] ) ); ?></li>
								<li><?php echo $this->Html->link( 'Cambiar Miniatura', array( 'controller' => 'vistas_productos', 'action' => 'cambiar_minitura', $vista['id_vista'], $vista['producto_id'] ) ); ?></li>
								<li><?php if( $vista['publicado'] == true ) {
										echo $this->Html->link( 'Despublicar', array( 'controller' => 'vistas_productos', 'action' => 'despublicar', $vista['id_vista'], $vista['producto_id'] ) );
									  } else {
										echo $this->Html->link( 'Publicar', array( 'controller' => 'vistas_productos', 'action' => 'publicar', $vista['id_vista'], $vista['producto_id'] ) );
									  } ?></li>
								<li><?php echo $this->Html->link( '<-', array( 'controller' => 'vistas_productos', 'action' => 'antes', $vista['id_vista'], $vista['producto_id'] ) ); ?></li>
								<li><?php echo $this->Html->link( '->', array( 'controller' => 'vistas_productos', 'action' => 'despues', $vista['id_vista'], $vista['producto_id'] ) ); ?></li>
							</ul></div>
						</td>
					</tr>
				 </tbody>
				</table>
			</div>
			<?php
		} 
	?>
	</div>
	</fieldset>
	<?php
	$variables = array(
			array( 'nombre' => 'id_producto', 'valor' => $producto['Producto']['id_producto'] )
			);
	echo $subidor->crearsubida( 'Agregar vista', '/admin/vistas_productos/envio', "VistasProductos", $variables, "subida_completada" );
	?>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Productos', true), array( 'controller' => 'productos', 'action' => 'index')); ?></li>
	</ul>
</div>