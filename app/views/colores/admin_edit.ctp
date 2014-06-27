<?php $this->pageTitle = "Agregar color"; ?>
<div class="colores form">
<?php echo $this->Form->create('Color');?>
	<fieldset>
 		<legend>Editar Color</legend>
	<?php
		echo $this->Form->input('id_color');
		echo $this->Form->input('nombre', array( 'type' => 'text' ) );
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
<div class="actions">
	<h3><?php __('Accciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Color.id_color')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Color.id_color'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Colores', true), array('action' => 'index'));?></li>
	</ul>
</div>