<div class="usuario index">
	<h2>Usuario</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id_usuario');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th class="actions">Acciones</th>
	</tr>
	<?php
	$i = 0;
	foreach ($usuarios as $usuario):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $usuario['Usuario']['id_usuario']; ?>&nbsp;</td>
		<td><?php echo $usuario['Usuario']['nombre']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link( 'Editar', array('action' => 'edit', $usuario['Usuario']['id_usuario'])); ?>
			<?php echo $this->Html->link( 'Cambiar Contraseña', array( 'action' => 'cambiarcontra', $usuario['Usuario']['id_usuario'] ) ); ?>
			<?php echo $this->Html->link( 'Eliminar', array('action' => 'delete', $usuario['Usuario']['id_usuario']), null, sprintf(__('Are you sure you want to delete # %s?', true), $usuario['Usuario']['id_usuario'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link( 'Agregar Usuario', array('action' => 'add')); ?></li>
	</ul>
</div>