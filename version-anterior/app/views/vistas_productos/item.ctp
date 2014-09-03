<table cellspacing="0" border="0" cellpadding="0" align="center" bgcolor="#d3d3d3" style="border-bottom-color : #d4d4d4; border-bottom-style : dashed; border-bottom-width : 2px; border-left-color : #d4d4d4; border-left-style : dashed; border-left-width : 2px; border-right-color : #d4d4d4; border-right-style : dashed; border-right-width : 2px; border-top-color : #d4d4d4; border-top-style : dashed; border-top-width : 2px; margin: 2px">
 <tbody>
	<tr>
		<td id="imagen<?php echo $vista['VistasProducto']['id_vista']; ?>">
			<?php echo $html->image( $vista['VistasProducto']['ruta'], array( 'width' => 250 ) ); ?>
		</td>
		<td>
			<div class="acciones"><ul>
				<li><?php echo $this->Html->link( 'Eliminar', array( 'controller' => 'vistas_productos', 'action' => 'eliminar', $vista['VistasProducto']['id_vista'], $vista['VistasProducto']['producto_id'] ) ); ?></li>
				<li><?php echo $this->Html->link( 'Cambiar Miniatura', array( 'controller' => 'vistas_productos', 'action' => 'cambiar_minitura', $vista['VistasProducto']['id_vista'], $vista['VistasProducto']['producto_id'] ) ); ?></li>
				<li><?php if( $vista['VistasProducto']['publicado'] == true ) {
						echo $this->Html->link( 'Despublicar', array( 'controller' => 'vistas_productos', 'action' => 'despublicar', $vista['VistasProducto']['id_vista'], $vista['VistasProducto']['producto_id'] ) );
					  } else {
						echo $this->Html->link( 'Publicar', array( 'controller' => 'vistas_productos', 'action' => 'publicar', $vista['VistasProducto']['id_vista'], $vista['VistasProducto']['producto_id'] ) );
					  } ?></li>
				<li><?php echo $this->Html->link( '<-', array( 'controller' => 'vistas_productos', 'action' => 'antes', $vista['VistasProducto']['id_vista'], $vista['VistasProducto']['producto_id'] ) ); ?></li>
				<li><?php echo $this->Html->link( '->', array( 'controller' => 'vistas_productos', 'action' => 'despues', $vista['VistasProducto']['id_vista'], $vista['VistasProducto']['producto_id'] ) ); ?></li>
			</ul></div>
		</td>
	</tr>
 </tbody>
</table>