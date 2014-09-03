<div class="categorias form">
<?php echo $this->Form->create('Categoria');?>
	<fieldset>
 		<legend><?php __('Admin Add Categoria'); ?></legend>
	<?php
		echo $this->Form->input('nombre', array( 'type' => 'text' ) );
		echo $this->Form->label( 'Categoria Padre' );
		echo $this->Form->select( 'parent_id', array( 'values' => $categorias ) );
		echo $this->Form->input('imagen', array( 'type' => 'hidden' ) );
		echo $this->Form->input('publicado');
	?>
	</fieldset>
<?php echo $this->Form->end( "Guardar" );?>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Categorias', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Productos', true), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Producto', true), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>