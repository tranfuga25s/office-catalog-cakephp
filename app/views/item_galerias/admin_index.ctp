<?php $this->pageTitle = 'Imagenes de Galeria'; ?>
<script type="text/javascript" language="JavaScript">

function subida_completada( respuesta ) {
	//Agrego la imagen a la lista que aparece
	$('imagenes').adopt( new Element( 'div' ).setStyles( { 'float': 'left', 'margin' : '2px' } ).set( 'html', respuesta ) );
}
</script>
<div class="productos index">
	<h2>Imagenes para la galeria "<?php echo $galeria['Galeria']['nombre']; ?>"</h2>
	<fieldset>
		<legend>Imagenes Actuales</legend>
		<div id="imagenes">
	<?php
		foreach( $itemGalerias as $vista ) {
			?>
			<div style="float: left; margin: 2px;">
				<table cellspacing="0" border="0" cellpadding="0" align="center" bgcolor="#d3d3d3" style="border-bottom-color : #d4d4d4; border-bottom-style : dashed; border-bottom-width : 2px; border-left-color : #d4d4d4; border-left-style : dashed; border-left-width : 2px; border-right-color : #d4d4d4; border-right-style : dashed; border-right-width : 2px; border-top-color : #d4d4d4; border-top-style : dashed; border-top-width : 2px; margin: 2px">
				 <tbody>
					<tr>
						<td align="center" valign="middle" id="imagen<?php echo $vista['ItemGaleria']['id_item']; ?>">
							<img width="250" src="/<?php echo $vista['ItemGaleria']['ruta']; ?>" />
						</td>
						<td>
							<div class="acciones"><ul>
								<li><?php echo $this->Html->link( 'Eliminar', array( 'controller' => 'item_galerias', 'action' => 'eliminar', $vista['ItemGaleria']['id_item'], $vista['Galeria']['id_galeria'] ) ); ?></li>
								<li><?php if( $vista['ItemGaleria']['publicado'] == true ) {
										echo $this->Html->link( 'Despublicar', array( 'controller' => 'item_galerias', 'action' => 'despublicar', $vista['ItemGaleria']['id_item'], $vista['Galeria']['id_galeria'] ) );
									  } else {
										echo $this->Html->link( 'Publicar', array( 'controller' => 'item_galerias', 'action' => 'publicar', $vista['ItemGaleria']['id_item'], $vista['Galeria']['id_galeria'] ) );
									  } ?></li>
								<li><?php echo $this->Html->link( '<-', array( 'controller' => 'item_galerias', 'action' => 'antes', $vista['ItemGaleria']['id_item'], $vista['Galeria']['id_galeria'] ) ); ?></li>
								<li><?php echo $this->Html->link( '->', array( 'controller' => 'item_galerias', 'action' => 'despues', $vista['ItemGaleria']['id_item'], $vista['Galeria']['id_galeria'] ) ); ?></li>
								<li><?php echo $this->Html->link( 'Poner como vista galeria', array( 'controller' => 'galerias', 'action' => 'miniatura', $vista['ItemGaleria']['id_item'], $vista['Galeria']['id_galeria'] ) ); ?></li>
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
			array( 'nombre' => 'id_galeria', 'valor' => $galeria['Galeria']['id_galeria'] )
			);
	echo $subidor->crearsubida( 'Agregar imagen', '/admin/item_galerias/envio', "ItemGaleria", $variables, "subida_completada" );
	?>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link( 'Lista de Galerias', array( 'controller' => 'galerias', 'action' => 'index' ) ); ?></li>
	</ul>
</div>