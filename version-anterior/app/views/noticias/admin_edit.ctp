<?php
$this->pageTitle = 'Editar Noticia :: Administracion :: La Oficina Muebleria';
echo $this->Javascript->link( 'ckeditor/ckeditor' );
?>
<div class="noticias form">
<?php echo $this->Form->create('Noticia');?>
	<fieldset>
 		<legend>Editar Noticia</legend>
	<?php
		echo $this->Form->input('id_noticia');
		echo $this->Form->input('titulo', array( 'type' => 'text' ) );
		echo $this->Form->input('cuerpo');
		echo $fck->load( 'Noticia.cuerpo' );
		echo $this->Form->input('publicado');
	?>
	</fieldset>
<?php echo $this->Form->end('Guardar');?>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link( 'Eliminar', array('action' => 'delete', $this->Form->value('Noticia.id_noticia')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Noticia.id_noticia'))); ?></li>
		<li><?php echo $this->Html->link( 'Listar Noticias', array('action' => 'index'));?></li>
	</ul>
</div>