<?php $this->pageTitle = 'Colores'; ?>
<div class="colores index">
	<h2><?php __('Colores');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('imagen');?></th>
			<th><?php echo $this->Paginator->sort('publicado');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($colores as $color):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $color['Color']['nombre']; ?>&nbsp;</td>
		<td>
		<?php if( $color['Color']['imagen'] != "" ) {
			echo $html->image( $color['Color']['imagen'] );
		} else {
			echo "&nbsp;";
		} ?></td>
		<td>
		<?php if( $color['Color']['publicado'] == true ) {
			echo $html->link( "Si", array( 'action' => 'despublicar', $color['Color']['id_color'] ) );
		} else {
			echo $html->link( "No", array( 'action' => 'publicar', $color['Color']['id_color'] ) );
		} ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $color['Color']['id_color'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $color['Color']['id_color']), null, sprintf(__('Are you sure you want to delete # %s?', true), $color['Color']['id_color'])); ?>
			<?php echo $this->Html->link( 'Cambiar Imagen', array('action' => 'cambiarImagen', $color['Color']['id_color'])); ?>
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
		<li><?php echo $this->Html->link(__('Nuevo Color', true), array('action' => 'add')); ?></li>
	</ul>
</div>