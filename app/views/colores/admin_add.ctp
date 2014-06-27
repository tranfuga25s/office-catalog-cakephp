<?php $this->pageTitle = "Agregar color"; ?>
<div class="colores form">
<?php echo $this->Form->create('Color');?>
	<fieldset>
 		<legend>Agregar color</legend>
	<?php
		echo $this->Form->input('nombre', array( 'type' => 'text' ) );
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Colores', true), array('action' => 'index'));?></li>
	</ul>
</div>