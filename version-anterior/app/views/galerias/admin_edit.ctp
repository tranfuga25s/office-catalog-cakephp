<div class="galerias form">
<?php echo $this->Form->create('Galeria');?>
	<fieldset>
 		<legend>Editar una galería</legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('publicado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link( 'Listar Galerias', array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link( 'Lista de Items de Galeria', array('controller' => 'item_galerias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link( 'Nuevo Item de Galeria', array('controller' => 'item_galerias', 'action' => 'add')); ?> </li>
	</ul>
</div>