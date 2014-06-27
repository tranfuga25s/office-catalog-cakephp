<div class="promociones view">
<h2>Promocion</h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $promocion['Promocion']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Imagen</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->image( $promocion['Promocion']['ruta'], array( 'width' => 400 ) ); ?>
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Publicado</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if( $promocion['Promocion']['publicado'] == true ) { echo "Si"; } else { echo "No"; } ?>
		</dd>
	</dl>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link( 'Editar Promocion', array('action' => 'edit', $promocion['Promocion']['id_promocion'])); ?> </li>
		<li><?php echo $this->Html->link( 'Eliminar Promocion', array('action' => 'delete', $promocion['Promocion']['id_promocion']), null, sprintf(__('Are you sure you want to delete # %s?', true), $promocion['Promocion']['id_promocion'])); ?> </li>
		<li><?php echo $this->Html->link( 'Listar Promociones', array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link( 'Nueva Promocion', array('action' => 'add')); ?> </li>
	</ul>
</div>
