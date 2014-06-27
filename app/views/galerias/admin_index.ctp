<div class="galerias index">
	<h2><?php __('Galerias');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('publicado');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($galerias as $galeria):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $galeria['Galeria']['nombre']; ?>&nbsp;</td>
		<td><center>
		<?php if( $galeria['Galeria']['publicado'] ) {
			echo $this->Html->link( "Si", array( 'action' => 'despublicar', $galeria['Galeria']['id_galeria'] ) );
		} else {
			echo $this->Html->link( "No", array( 'action' => 'publicar', $galeria['Galeria']['id_galeria'] ) );
		} ?></center></td>
		<td class="actions">
			<?php echo $this->Html->link( 'Editar', array('action' => 'edit', $galeria['Galeria']['id_galeria'])); ?>
			<?php echo $this->Html->link( 'Imagenes', array( 'controller' => 'item_galerias', 'action' => 'index', $galeria['Galeria']['id_galeria'])); ?>
			<?php echo $this->Html->link( 'Eliminar', array('action' => 'delete', $galeria['Galeria']['id_galeria']), null, 'Esta seguro que desea eliminar esta galería? Se eliminarán ademas todos los items que tenga adentro incluyendo sus archivos' ); ?>
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
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link( 'Nueva Galeria', array('action' => 'add')); ?></li>
	</ul>
</div>