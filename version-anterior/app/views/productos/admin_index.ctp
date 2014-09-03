<?php $this->pageTitle = 'Productos'; ?>

<div class="productos index">
	<h2>Productos</h2>
	<!-- Filtro de categorias  -->
	<div id="filtro">
		<?php
			echo $this->Form->create( 'Categoria', array( 'url' => array( 'controller' => 'productos', 'action' => 'index' ) ) );
			echo "Filtrar por:" . $this->Form->select( 'categoria_id', array( 'options' => $categorias, 'selected' => $categoria_id_ant ) );
			echo $this->Form->submit( 'Filtrar' );
		?>
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('categoria_id');?></th>
			<th>Publicado</th>
			<th><?php echo $this->Paginator->sort('novedad'); ?></th>
			<th class="actions">Acciones</th>
	</tr>
	<?php
	$i = 0;
	foreach ($productos as $producto):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $producto['Producto']['nombre']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($producto['Categoria']['nombre'], array('controller' => 'categorias', 'action' => 'view', $producto['Categoria']['id_categoria'] ) ); ?>
		</td>
		<td>
			<?php if( $producto['Producto']['publicado'] == true ) {
				echo $this->Html->link( 'Si', array( 'action' => 'despublicar', $producto['Producto']['id_producto']) );
			} else {
				echo $this->Html->link( 'No', array( 'action' => 'publicar', $producto['Producto']['id_producto'] ) );
			} ?>
		</td>
		<td>
			<?php if( $producto['Producto']['novedad'] == true ) {
				echo $this->Html->link( 'Si', array( 'action' => 'sacar_novedad', $producto['Producto']['id_producto']) );
			} else {
				echo $this->Html->link( 'No', array( 'action' => 'poner_novedad', $producto['Producto']['id_producto'] ) );
			} ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link( __('Edit', true ), array('action' => 'edit', $producto['Producto']['id_producto'] ) ); ?>
			<?php echo $this->Html->link( 'Bajar', array( 'action' => 'bajar', $producto['Producto']['id_producto'] ) ); ?>
			<?php echo $this->Html->link( 'Subir', array( 'action' => 'subir', $producto['Producto']['id_producto']) ); ?>
			<?php //echo $this->Html->link( 'Ver colores', array('action' => 'colores', $producto['Producto']['id_producto'])); ?>
			<?php echo $this->Html->link( 'Vistas', array( 'controller' => 'vistas_productos', 'action' => 'index', $producto['Producto']['id_producto'])); ?>
			<?php echo $this->Html->link( 'Miniatura', array( 'controller' => 'productos', 'action' => 'miniatura', $producto['Producto']['id_producto'])); ?>
			<?php echo $this->Html->link( __( 'Delete', true ), array( 'action' => 'delete', $producto['Producto']['id_producto'] ), null, sprintf(__('Are you sure you want to delete # %s?', true), $producto['Producto']['id_producto'])); ?>
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
		<li><?php echo $this->Html->link(__('Nuevo Producto', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Categorias', true), array('controller' => 'categorias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Colores', true), array('controller' => 'colores', 'action' => 'index')); ?> </li>
	</ul>
</div>