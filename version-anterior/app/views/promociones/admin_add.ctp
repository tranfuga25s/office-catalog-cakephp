<div class="promociones form">
<?php echo $this->Form->create('Promocion', array( 'type' => 'file' ) );?>
	<fieldset>
	<?php
		echo $this->Form->input( 'nombre', array( 'type' => 'text' ) );
		echo "Archivo de Imagen:" . $this->Form->file( 'Promocion.ruta', array( 'label' => 'Archivo de imagen' ) );
		echo $this->Form->input( 'publicado', array( 'value' => true, 'type' => 'hidden' ) );
	?>
	</fieldset>
	<?php echo $this->Form->end( 'Listo' );?>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link( 'Listar Promociones', array('action' => 'index'));?></li>
	</ul>
</div>