<table cellspacing="0" border="0" cellpadding="0" align="center" bgcolor="#d3d3d3" style="border-bottom-color : #d4d4d4; border-bottom-style : dashed; border-bottom-width : 2px; border-left-color : #d4d4d4; border-left-style : dashed; border-left-width : 2px; border-right-color : #d4d4d4; border-right-style : dashed; border-right-width : 2px; border-top-color : #d4d4d4; border-top-style : dashed; border-top-width : 2px; margin: 2px">
 <tbody>
	<tr>
		<td id="imagen<?php echo $vista['VistasProducto']['id_vista']; ?>">
			<img width="250" src="<?php echo $vista['VistasProducto']['miniatura']; ?>" />
		</td>
	</tr>
	<tr>
		<td><?php echo $this->Html->link( 'Eliminar', array( 'controller' => 'vistas_productos', 'action' => 'eliminar_miniatura', $vista['VistasProducto']['id_vista'] ) ); ?></td>
	</tr>
 </tbody>
</table>