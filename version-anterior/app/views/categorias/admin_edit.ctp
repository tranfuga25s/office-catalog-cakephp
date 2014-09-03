<div class="categorias form">
<?php echo $this->Form->create('Categoria');?>
	<fieldset>
 		<legend><?php __('Admin Edit Categoria'); ?></legend>
	<?php
		echo $this->Form->input('id_categoria');
		echo $this->Form->input('nombre', array( 'type' => 'text' ) );
		echo $this->Form->label( 'Categoria padre' );
		echo $this->Form->select('parent_id', array( 'values' => $categorias, 'selected' => $this->data['Categoria']['parent_id'] ) );
		echo $this->Form->input('lft', array( 'type' => 'hidden' ) );
		echo $this->Form->input('rght', array( 'type' => 'hidden' ) );
		echo $this->Form->input('imagen', array( 'type' => 'hidden' ) );
		echo $this->Form->input('imagen_sobre', array( 'type' => 'hidden' ) );
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Categoria.id_categoria')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Categoria.id_categoria'))); ?></li>
		<li><?php echo $this->Html->link(__('List Categorias', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Productos', true), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Productos', true), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>