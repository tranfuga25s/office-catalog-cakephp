<div class="usuario form">
<?php echo $this->Form->create('Usuario', array( 'url' => array( 'controller' => 'usuario', 'action' => 'edit' ) ) );?>
	<fieldset>
 		<legend>Editar un usuario</legend>
	<?php
		echo $this->Form->input('id_usuario');
		echo $this->Form->input('nombre', array( 'type' => 'text' ) );
		echo $this->Form->input('contra', array( 'type' => 'password' ) );
		echo $this->Form->input('confirma_contra', array( 'type' => 'password' ) );
	?>
	</fieldset>
<?php echo $this->Form->end( 'Guardar' );?>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>

		<li><?php echo $this->Html->link( 'Eliminar', array('action' => 'delete', $this->Form->value('Usuario.id_usuario')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Usuario.id_usuario'))); ?></li>
		<li><?php echo $this->Html->link( 'Listar Usuarios', array('action' => 'index'));?></li>
	</ul>
</div>