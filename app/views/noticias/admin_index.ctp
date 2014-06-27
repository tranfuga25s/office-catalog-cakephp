<div class="noticias index">
	<h2><?php __('Noticias');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('titulo');?></th>
			<th><?php echo $this->Paginator->sort('publicado');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($noticias as $noticia):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $noticia['Noticia']['titulo']; ?>&nbsp;</td>
		<?php if( $noticia['Noticia']['publicado'] ) { ?>
			<td align="center" class="actions">
				<?php echo $this->Html->link( 'Si', array('action' => 'despublicar', $noticia['Noticia']['id_noticia'])); ?>
			</td>
		<?php } else { ?>
			<td align="center" class="actions">
				<?php echo $this->Html->link( 'No', array('action' => 'publicar', $noticia['Noticia']['id_noticia'])); ?>
			</td>
		<?php } ?>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $noticia['Noticia']['id_noticia'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $noticia['Noticia']['id_noticia']), null, sprintf(__('Are you sure you want to delete # %s?', true), $noticia['Noticia']['id_noticia'])); ?>
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
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Noticia', true), array('action' => 'add')); ?></li>
	</ul>
</div>