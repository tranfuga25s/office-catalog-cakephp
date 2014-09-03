<?php $this->pageTitle = 'Cambiar color'; ?>
<div class="colores index">
	<h2>Cambiar imagen</h2>
	<?php
	$variables = array( array( 'nombre' => 'id_color', 'valor' => $id_color ) );
	echo $this->SwfUpload->crearsubida( 'Imagen para este color', Router::url(  '/admin/colores/envios' ), $variables, 1 );
	?>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Colores', true), array('action' => 'index'));?></li>
	</ul>
</div>