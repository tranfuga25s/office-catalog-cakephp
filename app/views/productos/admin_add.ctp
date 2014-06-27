<div class="productos form">
<?php echo $this->Form->create('Producto');?>
	<fieldset>
 		<legend>Agregar Producto</legend>
	<?php
		echo $this->Form->input('nombre', array( 'type' => 'text' ) );
		echo $this->Form->input('publicado');
		echo $this->Form->input('categoria_id');
	?>
	</fieldset>
<?php echo $this->Form->end( 'Guardar' );?>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>

		<li><?php echo $this->Html->link( 'Listar Productos', array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link( 'Listar Categorias', array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link( 'Listar Colores', array('controller' => 'colores', 'action' => 'index')); ?> </li>
	</ul>
</div>