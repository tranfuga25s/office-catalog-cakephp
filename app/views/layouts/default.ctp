<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta name="google-site-verification" content="ARQA0t6J6XJJyEV7dsRWCuG3JIqnKXQQ_-KIG5kRoXY" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title><?php echo $title_for_layout?> :: La Oficina Amoblamientos S.C.</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <?php echo $html->css( 'general' ); ?>
  <?php echo $html->css( 'slimbox' ); ?>
  <?php echo $javascript->link( 'mootools' ); ?>
  <?php echo $javascript->link( 'slimbox' ); ?>
  <?php echo $javascript->link( 'mootools-more' ); ?>
  <?php echo $scripts_for_layout; ?>
</head>
<body onload="autoFireLightbox()">
<div id="contenedor">
	<div id="barra_marca"><?php echo $this->Html->image( 'logo.png', array( 'class' => 'logo' ) ); ?></div>
	<div id="menu"><?php echo $this->element( 'menu' ); ?></div>
	<div id="productos-menu">
		<div class="flecha-arriba" id="flecha-arriba">&nbsp;</div>
		<div id="contenedor-productos">&nbsp;</div>
		<div class="flecha-abajo" id="flecha-abajo">&nbsp;</div>
	</div>

	<div id="contenido"><?php echo $content_for_layout; ?></div>
	<div id="imagen"><?php echo $this->element( 'publicidad' ); ?></div>
	<div id="pie">9 de Julio 1901 Esquina Corrientes &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;(3000) Santa Fe - Argentina&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;Tel-fax: 342 4598485&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:info@laoficinamuebles.com.ar">info@laoficinamuebles.com.ar</a></div>
</div>
<script>

function agrandarMenu() {
 var fx = new Fx.Tween( 'menu', { duration: 'long', transition: Fx.Transitions.Sine.easeOut, property: 'top' } );
 fx.start( $('menu').getStyle( 'top' ), '-23px' );
 var maximo = $('menu').getSize().y - 65;
 var valor = '' + maximo + 'px';
 $('contenedor-menu').setStyle( 'max-height', valor );
 var scrollercomun = new Scroller( 'contenedor-menu', { area: 30, velocity: 0.25 } );
 scrollercomun.start();
 //$('menu').addEvent( 'mouseleave', achicarMenu );
}

function achicarMenu() {
 var alto =  0 - $('menu').getSize().height;
 $('menu').set( 'tween', { duration: 'long' } );
 $('menu').tween( 'top', alto );
 $('menu').addEvent( 'mouseenter', agrandarMenu );
}

$('menu').addEvent( 'mouseenter', agrandarMenu );
</script>
</body>
</html>