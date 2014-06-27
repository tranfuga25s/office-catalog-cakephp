<div class="promociones index">
	<h2>Promociones</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('publicado');?></th>
			<th class="actions">Acciones</th>
	</tr>
	<?php
	$i = 0;
	foreach ($promociones as $promocion):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $promocion['Promocion']['nombre']; ?>&nbsp;</td>
		<td align="center"><?php if( $promocion['Promocion']['publicado'] == 1 ) {
				echo $this->Html->link( 'Si', array( 'action' => 'despublicar', $promocion['Promocion']['publicado'] ) );
			} else {
				echo $this->Html->link( 'No', array( 'action' => 'publicar', $promocion['Promocion']['publicado'] ) );
			} ?></td>
		<td class="actions">
			<?php echo $this->Html->link( 'Eliminar', array('action' => 'delete', $promocion['Promocion']['id_promocion']), null, sprintf(__('Are you sure you want to delete # %s?', true), $promocion['Promocion']['id_promocion'])); ?>
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
		<li><?php echo $this->Html->link( 'Nueva Promocion', array('action' => 'add')); ?></li>
	</ul>
</div>