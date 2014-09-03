<div class="promociones form">
<?php echo $this->Form->create('Promocion');?>
	<fieldset>
 		<legend><?php __('Admin Edit Promocion'); ?></legend>
	<?php
		echo $this->Form->input('id_promocion');
		echo $this->Form->input('nombre', array( 'type' => 'text' ) );
		echo $this->Form->input('publicado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>

		<li><?php echo $this->Html->link( 'Eliminar', array('action' => 'delete', $this->Form->value('Promocion.id_promocion')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Promocion.id_promocion'))); ?></li>
		<li><?php echo $this->Html->link( 'Listar Promociones', array('action' => 'index'));?></li>
	</ul>
</div>