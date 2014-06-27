<div class="productos view">
<h2><?php  __('Producto');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Producto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $producto['Producto']['id_producto']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $producto['Producto']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Codigo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $producto['Producto']['codigo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Categoria'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($producto['Categoria']['nombre'], array('controller' => 'categorias', 'action' => 'view', $producto['Categoria']['id_categoria'])); ?>
			&nbsp;
		</dd>
<!--		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Alto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $producto['Producto']['alto']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Largo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $producto['Producto']['largo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Prof'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $producto['Producto']['prof']; ?>
			&nbsp;
		</dd> -->
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link( 'Editar Producto', array('action' => 'edit', $producto['Producto']['id_producto'])); ?> </li>
		<li><?php echo $this->Html->link( 'Eliminar Producto', array('action' => 'delete', $producto['Producto']['id_producto']), null, sprintf(__('Are you sure you want to delete # %s?', true), $producto['Producto']['id_producto'])); ?> </li>
		<li><?php echo $this->Html->link( 'Listar Productos', array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link( 'Listar Categorias', array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link( 'Listar Colores', array('controller' => 'colores', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Colores');?></h3>
	<?php if (!empty($producto['Colores'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id Color'); ?></th>
		<th><?php __('Nombre'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Publicado'); ?></th>
		<th><?php __('Imagen'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($producto['Colores'] as $colores):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $colores['id_color'];?></td>
			<td><?php echo $colores['nombre'];?></td>
			<td><?php echo $colores['created'];?></td>
			<td><?php echo $colores['modified'];?></td>
			<td><?php echo $colores['publicado'];?></td>
			<td><?php echo $colores['imagen'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'colores', 'action' => 'view', $colores['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'colores', 'action' => 'edit', $colores['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'colores', 'action' => 'delete', $colores['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $colores['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<h3><?php __('Related Vistas Productos');?></h3>
	<?php if (!empty($producto['VistasProductos'])):?>
<?php pr( $producto['VistasProductos'] ); ?>



	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id Vista'); ?></th>
		<th><?php __('Producto Id'); ?></th>
		<th><?php __('Nombre'); ?></th>
		<th><?php __('Ruta'); ?></th>
		<th><?php __('Publicado'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($producto['VistasProductos'] as $vistasProductos):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $vistasProductos['id_vista'];?></td>
			<td><?php echo $vistasProductos['producto_id'];?></td>
			<td><?php echo $vistasProductos['nombre'];?></td>
			<td><?php echo $vistasProductos['ruta'];?></td>
			<td><?php echo $vistasProductos['publicado'];?></td>
			<td><?php echo $vistasProductos['created'];?></td>
			<td><?php echo $vistasProductos['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'vistas_productos', 'action' => 'view', $vistasProductos['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'vistas_productos', 'action' => 'edit', $vistasProductos['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'vistas_productos', 'action' => 'delete', $vistasProductos['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $vistasProductos['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Vistas Productos', true), array('controller' => 'vistas_productos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
