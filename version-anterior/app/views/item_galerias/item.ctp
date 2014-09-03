<table cellspacing="0" border="0" cellpadding="0" align="center" bgcolor="#d3d3d3" style="border-bottom-color : #d4d4d4; border-bottom-style : dashed; border-bottom-width : 2px; border-left-color : #d4d4d4; border-left-style : dashed; border-left-width : 2px; border-right-color : #d4d4d4; border-right-style : dashed; border-right-width : 2px; border-top-color : #d4d4d4; border-top-style : dashed; border-top-width : 2px; margin: 2px">
 <tbody>
	<tr>
		<td id="imagen<?php echo $vista['ItemGaleria']['id_item']; ?>">
			<img width="250" src="/<?php echo $vista['ItemGaleria']['ruta']; ?>" />
		</td>
		<td>
			<div class="acciones"><ul>
				<li><?php echo $this->Html->link( 'Eliminar', array( 'controller' => 'item_galerias', 'action' => 'eliminar', $vista['ItemGaleria']['id_item'], $vista['ItemGaleria']['galeria_id'] ) ); ?></li>
				<li><?php echo $this->Html->link( 'Cambiar Miniatura', array( 'controller' => 'item_galerias', 'action' => 'cambiar_minitura', $vista['ItemGaleria']['id_item'], $vista['ItemGaleria']['galeria_id'] ) ); ?></li>
				<li><?php if( $vista['ItemGaleria']['publicado'] == true ) {
						echo $this->Html->link( 'Despublicar', array( 'controller' => 'item_galerias', 'action' => 'despublicar', $vista['ItemGaleria']['id_item'], $vista['ItemGaleria']['galeria_id'] ) );
					  } else {
						echo $this->Html->link( 'Publicar', array( 'controller' => 'item_galerias', 'action' => 'publicar', $vista['ItemGaleria']['id_item'], $vista['ItemGaleria']['galeria_id'] ) );
					  } ?></li>
				<li><?php echo $this->Html->link( '<-', array( 'controller' => 'item_galerias', 'action' => 'antes', $vista['ItemGaleria']['id_item'], $vista['ItemGaleria']['galeria_id'] ) ); ?></li>
				<li><?php echo $this->Html->link( '->', array( 'controller' => 'item_galerias', 'action' => 'despues', $vista['ItemGaleria']['id_item'], $vista['ItemGaleria']['galeria_id'] ) ); ?></li>
			</ul></div>
		</td>
	</tr>
 </tbody>
</table>