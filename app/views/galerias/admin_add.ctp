<div class="galerias form">
<?php echo $this->Form->create('Galeria');?>
	<fieldset>
 		<legend>Agregar Galeria</legend>
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
		<li><?php echo $this->Html->link( 'Lista de Galerias', array('action' => 'index'));?></li>
	</ul>
</div>