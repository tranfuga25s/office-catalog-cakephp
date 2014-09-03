<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>La Oficina Muebleria : Administracion : <?php echo $title_for_layout; ?></title>
	<?php
		echo $this->Html->meta( 'icon' );
		echo $this->Html->css( 'cake.generic' );
		echo $this->Html->css( 'admin' );
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header" style="vertical-align : middle;">
			<?php echo $this->Html->image( 'logo.png', array( 'width' => 300 ) ); ?>
			<span style="color : #ffffff; font-size : xx-large; font-weight : bold;">- Administraci&oacute;n</span>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Session->flash('auth'); ?>
			<?php echo $content_for_layout; ?>
		</div>
		<div align="center" id="accesos">
			<?php echo $html->link( 'Inicio', array( 'controller' => 'general', 'action' => 'cpanel', 'admin' => true ), array( 'class' => 'link-acceso' ) ); ?> |
			<?php echo $html->link( 'Categorias', array( 'prefix' => 'admin', 'controller' => 'categorias', 'action' => 'index', 'admin' => true ), array( 'class' => 'link-acceso' ) ); ?>  |
			<?php echo $html->link( 'Productos', array( 'prefix' => 'admin', 'controller' => 'productos', 'action' => 'index', 'admin' => true ), array( 'class' => 'link-acceso' ) ); ?> <!-- |
			<?php //echo $html->link( 'Colores', array( 'prefix' => 'admin', 'controller' => 'colores', 'action' => 'index', 'admin' => true ), array( 'class' => 'link-acceso' ) ); ?> |
			<?php //echo $html->link( 'Noticias', array( 'prefix' => 'admin', 'controller' => 'noticias', 'action' => 'index', 'admin' => true ), array( 'class' => 'link-acceso' )  ); ?>--> |
			<?php echo $html->link( 'Promociones', array( 'admin' => true, 'controller' => 'promociones', 'action' => 'index' ), array( 'class' => 'link-acceso' ) ); ?> |
			<?php echo $html->link( 'Amoblamientos', array( 'admin' => true, 'controller' => 'galerias', 'action' => 'index' ), array( 'class' => 'link-acceso' ) ); ?> |
			<?php echo $html->link( 'Usuarios', array( 'admin' => true, 'controller' => 'usuario', 'action' => 'index' ), array( 'class' => 'link-acceso' ) ); ?> |
			<?php echo $html->link( 'Ver web', '/', array( 'class' => 'link-acceso' ) ); ?>
		</div>
		<div id="footer">
			<span style="font-size : x-small;"><a href="http://www.bscomputacion.com//" style="color: white; text-decoration: none;">www.bscomputacion.com</a> - &copy;2010</span>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>