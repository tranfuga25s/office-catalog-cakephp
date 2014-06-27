<?php
$this->pageTitle = 'Agregar Noticia :: Administracion :: La Oficina Muebleria';
echo $this->Javascript->link( 'ckeditor/ckeditor' );
?>
<div class="noticias form">
<?php echo $this->Form->create('Noticia');?>
	<fieldset>
 		<legend>Agregar una noticia</legend>
	<?php
		echo $this->Form->input('titulo', array( 'type' => 'text' ) );
		echo $this->Form->input('cuerpo');
		echo $fck->load( 'Noticia.cuerpo' );
		echo $this->Form->input('publicado');
	?>
	</fieldset>
<?php echo $this->Form->end( 'Guardar' );?>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link( 'Listar Noticias', array('action' => 'index'));?></li>
	</ul>
</div>