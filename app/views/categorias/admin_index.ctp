<?php
$this->pageTitle = 'Categorias :: Administraci&oacute;n :: La Oficina Muebles';
?>
<div class="categorias index">
	<h2><?php __('Categorias');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>Nombre</th>
			<th>Publicado</th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($categorias as $categoria):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		$id_cat = array_search( $categoria, $categorias );
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $categoria; ?>&nbsp;</td>
		<td class="actions">
		<?php if( $catpublicado[$id_cat] == true ) {
			echo $html->link( 'Si', array( 'action' => 'despublicar', $id_cat ) );
		} else {
			echo $html->link( 'No', array( 'action' => 'publicar', $id_cat ) );
		} ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link( 'Subir', array( 'action' => 'subir', $id_cat ) ); ?>
			<?php echo $this->Html->link( 'Bajar', array( 'action' => 'bajar', $id_cat ) ); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $id_cat)); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $id_cat), null, sprintf(__('Are you sure you want to delete # %s?', true), $id_cat)); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Categoria', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Productos', true), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Producto', true), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>