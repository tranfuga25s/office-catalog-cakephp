<div class="categorias view">
<h2><?php  __('Categoria');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Nombre</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $categoria['Categoria']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Publicado</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if ( $categoria['Categoria']['publicado'] == true ) {
				echo "Si";
			} else {
				echo "No";
			}
			?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Imagen'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->image( $categoria['Categoria']['imagen'] ); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Imagen Sobre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->image( $categoria['Categoria']['imagen_sobre'] ); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link( 'Editar Categoria', array('action' => 'edit', $categoria['Categoria']['id_categoria'])); ?> </li>
		<li><?php echo $this->Html->link( 'Eliminar Categoria', array('action' => 'delete', $categoria['Categoria']['id_categoria']), null, sprintf(__('Are you sure you want to delete # %s?', true), $categoria['Categoria']['id_categoria'])); ?> </li>
		<li><?php echo $this->Html->link( 'Listar Categorias', array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link( 'Cambiar imagenes', array( 'action' => 'cambiarImagenes', $categoria['Categoria']['id_categoria'] ) ) ?></li>
		<li><?php echo $this->Html->link( 'Nueva Categoria', array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link( 'Listar Productos', array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link( 'Nuevo Producto', array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Productos');?></h3>
	<?php if (!empty($categoria['Productos'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id Producto'); ?></th>
		<th><?php __('Nombre'); ?></th>
		<th><?php __('Codigo'); ?></th>
		<th><?php __('Alto'); ?></th>
		<th><?php __('Largo'); ?></th>
		<th><?php __('Prof'); ?></th>
		<th><?php __('Categoria Id'); ?></th>
		<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($categoria['Productos'] as $productos):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $productos['id_producto'];?></td>
			<td><?php echo $productos['nombre'];?></td>
			<td><?php echo $productos['codigo'];?></td>
			<td><?php echo $productos['alto'];?></td>
			<td><?php echo $productos['largo'];?></td>
			<td><?php echo $productos['prof'];?></td>
			<td><?php echo $productos['categoria_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'productos', 'action' => 'view', $productos['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'productos', 'action' => 'edit', $productos['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'productos', 'action' => 'delete', $productos['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $productos['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link( 'Nuevo Producto', array('controller' => 'productos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
