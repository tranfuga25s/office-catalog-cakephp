<div class="galerias view">
<h2><?php  __('Galeria');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $galeria['Galeria']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descripcion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $galeria['Galeria']['descripcion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Publicado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $galeria['Galeria']['publicado']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $galeria['Galeria']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $galeria['Galeria']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Miniatura'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $galeria['Galeria']['id_miniatura']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Galeria', true), array('action' => 'edit', $galeria['Galeria']['id_galeria'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Galeria', true), array('action' => 'delete', $galeria['Galeria']['id_galeria']), null, sprintf(__('Are you sure you want to delete # %s?', true), $galeria['Galeria']['id_galeria'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Galerias', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Galeria', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Item Galerias', true), array('controller' => 'item_galerias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item Galerium', true), array('controller' => 'item_galerias', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Item Galerias');?></h3>
	<?php if (!empty($galeria['ItemGalerium'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id Item'); ?></th>
		<th><?php __('Galeria Id'); ?></th>
		<th><?php __('Titulo'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Publicado'); ?></th>
		<th><?php __('Minitaura'); ?></th>
		<th><?php __('Ruta'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($galeria['ItemGalerium'] as $itemGalerium):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $itemGalerium['id_item'];?></td>
			<td><?php echo $itemGalerium['galeria_id'];?></td>
			<td><?php echo $itemGalerium['titulo'];?></td>
			<td><?php echo $itemGalerium['created'];?></td>
			<td><?php echo $itemGalerium['modified'];?></td>
			<td><?php echo $itemGalerium['publicado'];?></td>
			<td><?php echo $itemGalerium['minitaura'];?></td>
			<td><?php echo $itemGalerium['ruta'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'item_galerias', 'action' => 'view', $itemGalerium['id_item'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'item_galerias', 'action' => 'edit', $itemGalerium['id_item'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'item_galerias', 'action' => 'delete', $itemGalerium['id_item']), null, sprintf(__('Are you sure you want to delete # %s?', true), $itemGalerium['id_item'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Item Galerium', true), array('controller' => 'item_galerias', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
