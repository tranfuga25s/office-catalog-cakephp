<?php
$hijot = array();
$nietot = array();
?>
<div id="contenedor-menu">
<a href="<?php echo Router::url( array( 'controller' => 'pages', 'action' => 'quienes' ) ); ?>"><div class="item1">¿Quienes Somos?</div></a>
<div class="item1" id="productos">Productos</div>
	<div class="menucategorias" id="categorias">
		<?php
			// Busco la estructura de arbol
			$padres = $this->requestAction( array( 'controller' => 'categorias', 'action' => 'buscar_menu', 'padre' => null ) );
			foreach( $padres as $item ) {	?>
		<div class="item2" id="categoria<?php echo $item['Categoria']['id_categoria']; ?>"><?php echo $item['Categoria']['nombre']; ?></div>
			<?php
			 // Verifico si tiene hijos
			  $hijos = $this->requestAction( array( 'controller' => 'categorias', 'action' => 'buscar_menu', 'padre' => $item['Categoria']['id_categoria'] ) );
			  //echo "hijos:"; pr( $hijos );
			  if( count( $hijos ) > 0 ) { ?>
			<div class="menucategorias" id="menucategoria<?php echo $item['Categoria']['id_categoria']; ?>">
				<?php foreach( $hijos as $hijo ) { ?>
				<div class="item3" id="categoria<?php echo $hijo['Categoria']['id_categoria']; ?>"><?php echo $hijo['Categoria']['nombre']; ?></div>
				<?php $nietos = $this->requestAction( array( 'controller' => 'categorias', 'action' => 'buscar_menu', 'padre' => $hijo['Categoria']['id_categoria'] ) );
					if( count( $nietos ) > 0 ) {
						$hijot[] = $hijo;
						// lo agrego al array de nietos
						$nietot = array_merge( $nietot, $nietos ); ?>
					<div class="menucategorias" id="menucategoria<?php echo $hijo['Categoria']['id_categoria']; ?>">
						<?php foreach( $nietos as $nieto ) { ?>
							<div class="item4" id="categoria<?php echo $nieto['Categoria']['id_categoria']; ?>"><?php echo $nieto['Categoria']['nombre']; ?></div>
						<?php } ?>
					</div>
					<?php } else {
						$nietot[] = $hijo;
					      }
				} ?>
			</div>
				<?php
			  } else {
				$nietot[] = $item;
			  }
	} // fin por item

		?>
	</div>
<div class="item1" id="novedades">Novedades</div>
<div class="item1" id="amoblamientos">Amoblamientos</div>
<a href="<?php echo Router::url( array( 'controller' => 'contactos', 'action' => 'index' ) ); ?>"><div class="item1">Contacto</div></a>
<a href="<?php echo Router::url( 'http://www.facebook.com/#!/profile.php?id=100001281195338&v=info&ref=search' ); ?>" target="_blank"><div class="item1">Facebook</div></a>
</div>
<script type="text/javascript" language="JavaScript">

// Variable para marcar la categoria anterior para sacar su selección
var id_cat_anterior = '';
// Variable para marcar el producto actual
var id_prod_anterior = '';
// Variable para marcar la galería anterior
var id_galeria_anterior = '';

var scrollerproductos = '';

function achicarProductos() {
 var myFx = new Fx.Tween( 'categorias', { duration: 'long', transition: Fx.Transitions.Sine.easeOut, property: 'heigth' } );
 myFx.start( '100%', '0%' );
 $('productos').removeEvent( 'click', achicarProductos );
 $('productos').addEvent( 'click', agrandarProductos );
 $('categorias').setStyle( 'display', 'none');
}


function agrandarProductos() {
 $('categorias').setStyle( 'display', 'inline' );
 var myFx = new Fx.Tween( 'categorias', { duration: 'long', transition: Fx.Transitions.Sine.easeOut, property: 'heigth' } );
 myFx.start( '0%', '100%' );
 $('productos').removeEvent( 'click', agrandarProductos );
 $('productos').addEvent( 'click', achicarProductos );
}

$('productos').addEvent( 'click', agrandarProductos );

function agrandarCategoria( evento ) {
  // event.target tiene de donde se genero
  var nombre = 'menu' + evento.target.id;
  if( $('imagengrande') != null ) {
	$('imagengrande').setStyle( 'display', 'none' );
  }
  // Busco todos los divs de esta altura
  var hijos = evento.target.getParent().getElements('div.menucategorias');
  Array.each( hijos, function( elem, indice ) {
	if( elem.getStyle( 'display' ) == 'inline' ) {
		elem.setStyle( 'display', 'none' );
		elem.getPrevious().removeEvent( 'click', achicarCategoria );
		elem.getPrevious().addEvent( 'click', agrandarCategoria );
	}
  } );
  if( $(nombre) != null ) {
  	$(nombre).setStyle( 'display', 'inline' );
  	var myFx = new Fx.Tween( nombre, { duration: 'long', transition: Fx.Transitions.Sine.easeOut, property: 'heigth' } );
  	myFx.start( '0%', '100%' );
  	evento.target.removeEvent( 'click', agrandarCategoria );
  	evento.target.addEvent( 'click', achicarCategoria );
  }
}

function achicarCategoria( evento ) {
  // event.target tiene de donde se genero
  var nombre = 'menu' + evento.target.id;
  var myFx = new Fx.Tween( nombre, { duration: 'long', transition: Fx.Transitions.Sine.easeOut, property: 'heigth' } );
  myFx.start( '100%', '0%' );
  evento.target.removeEvent( 'click', achicarCategoria );
  evento.target.addEvent( 'click', agrandarCategoria );
  $(nombre).setStyle( 'display', 'none' );
}

function mostrarFlechas() {
	$('flecha-arriba').setStyle( 'display', 'block' );
	$('flecha-abajo').setStyle( 'display', 'block' );
}

function moverScrollEntra() {
	if (!scrollerproductos.timer) scrollerproductos.timer = scrollerproductos.scroll.periodical( Math.round( 4000 / scrollerproductos.options.fps), scrollerproductos );
}

function moverScrollSale() {
	scrollerproductos.timer = clearInterval( scrollerproductos.timer );
}

function setearFlechas() {
	$('flecha-arriba').addEvents({ mouseenter: moverScrollEntra, mouseleave: moverScrollSale });
	$('flecha-abajo').addEvents({ mouseenter: moverScrollEntra, mouseleave: moverScrollSale });
}


function listaProductos( evento ) {
	var myFx3 = new Fx.Tween( 'productos-menu', {duration: 'long', transition: Fx.Transitions.Sine.easeInOut, property: 'heigth' } );
	myFx3.start( '0%', '100%' );
	mostrarFlechas();
	if( id_cat_anterior != '' ) {
		$(id_cat_anterior).setStyles( { 'background': 'none', 'color': 'Wheat' } );
	}
	evento.target.setStyles( { 'background-color': 'lightGrey', 'color': 'black' } );
	id_cat_anterior = evento.target.id;
	if( $('imagengrande') != null ) {
		$('imagengrande').setStyle( 'display', 'none' );
	}
	// Pido los productos por AJAX
	var direccion = '/productos/menu/id:'+evento.target.id;
	var opciones = { url: direccion,
			 evalScripts: true,
			 update: 'contenedor-productos',
		 	 onComplete: function() {
 				var maximo = $('menu').getSize().y - 60;
 				var valor = '' + maximo + 'px';
 				$('contenedor-productos').setStyle( 'max-height', valor );
				$('contenedor-productos').setStyle( 'min-height', valor );
				$('contenedor-productos').setStyle( 'top', '11px' );
    				$('contenedor-productos').setStyle( 'margin-bottom', '30px' );
				scrollerproductos = new Scroller( 'contenedor-productos', { area: 20, velocity: 0.25 } );
				scrollerproductos.start();
				setearFlechas();
			 }
		       };
	var pedido = new Request.HTML( opciones );
	pedido.get();
}

 function mostrarProducto( evento ) {
	var id_producto = evento.target.id;
	if( id_prod_anterior != '' ) {
		id_prod_anterior.setStyles( { 'background' : 'none', 'color' : 'white' } );
	}
	evento.target.setStyles( { 'background-color' : 'lightGrey' } );
	id_prod_anterior = evento.target;
	//hago la solicitud AJAX para ver el producto
	var pedido = new Request.HTML( { url: '/productos/ver/'+id_producto,
		 evalScripts: true,
		 update: 'contenido'
	 } );
	pedido.get();
	//Slimbox.scanPage();
 }

function listaNovedades( evento ) {
	var myFx3 = new Fx.Tween( 'productos-menu', {duration: 'long', transition: Fx.Transitions.Sine.easeInOut, property: 'heigth' } );
	myFx3.start( '0%', '100%' );
	mostrarFlechas();
	if( id_cat_anterior != '' ) {
		$(id_cat_anterior).setStyles( { 'background': 'none', 'color': 'Wheat' } );
	}
	evento.target.setStyles( { 'background-color': 'lightGrey', 'color': 'black' } );
	id_cat_anterior = evento.target.id;
	if( $('imagengrande') != null ) {
		$('imagengrande').setStyle( 'display', 'none' );
	}
	// Pido los productos por AJAX
	var direccion = '/productos/novedades';
	var opciones = { url: direccion,
			 evalScripts: true,
			 update: 'contenedor-productos',
		 	 onComplete: function() {
 				var maximo = $('menu').getSize().y - 80;
 				var valor = '' + maximo + 'px';
 				$('contenedor-productos').setStyle( 'max-height', valor );
				$('contenedor-productos').setStyle( 'min-height', valor );
				$('contenedor-productos').setStyle( 'top', '11px' );
    				$('contenedor-productos').setStyle( 'margin-bottom', '30px' );
				scrollerproductos = new Scroller( 'contenedor-productos', { area: 20, velocity: 0.25 } );
				scrollerproductos.start();
				setearFlechas();
			 }
		       };
	var pedido = new Request.HTML( opciones );
	pedido.get();
}

function listaAmoblamientos( evento ) {
	var myFx3 = new Fx.Tween( 'productos-menu', {duration: 'long', transition: Fx.Transitions.Sine.easeInOut, property: 'heigth' } );
	myFx3.start( '0%', '100%' );
	mostrarFlechas();
	if( id_cat_anterior != '' ) {
		$(id_cat_anterior).setStyles( { 'background': 'none', 'color': 'Wheat' } );
	}
	evento.target.setStyles( { 'background-color': 'lightGrey', 'color': 'black' } );
	id_cat_anterior = evento.target.id;
	if( $('imagengrande') != null ) {
		$('imagengrande').setStyle( 'display', 'none' );
	}
	// Pido los productos por AJAX
	var direccion = '/galerias/index';
	var opciones = { url: direccion,
			 evalScripts: true,
			 update: 'contenedor-productos',
		 	 onComplete: function() {
 				var maximo = $('menu').getSize().y - 80;
 				var valor = '' + maximo + 'px';
 				$('contenedor-productos').setStyle( 'max-height', valor );
				$('contenedor-productos').setStyle( 'min-height', valor );
				$('contenedor-productos').setStyle( 'top', '11px' );
    				$('contenedor-productos').setStyle( 'margin-bottom', '30px' );
				scrollerproductos = new Scroller( 'contenedor-productos', { area: 20, velocity: 0.25 } );
				scrollerproductos.start();
				setearFlechas();
			 }
		       };
	var pedido = new Request.HTML( opciones );
	pedido.get();
}

 function mostrarGaleria( evento ) {
	var id_galeria = evento.target.id;
	if( id_galeria_anterior != '' ) {
		id_galeria_anterior.setStyles( { 'background' : 'none', 'color' : 'white' } );
	}
	evento.target.setStyles( { 'background-color' : 'lightGrey' } );
	id_galeria_anterior = evento.target;
	//hago la solicitud AJAX para ver el producto
	var pedido = new Request.HTML( { url: '/galerias/ver/'+id_galeria,
		 evalScripts: true,
		 update: 'contenido'
	 } );
	pedido.get();
	//Slimbox.scanPage();
 }



<?php
foreach( $padres as $padre ) {
	echo "$('categoria".$padre['Categoria']['id_categoria']."').addEvent( 'click', agrandarCategoria );\n";
}
foreach( $hijot as $hijo ) {
	echo "$('categoria".$hijo['Categoria']['id_categoria']."').addEvent( 'click', agrandarCategoria );\n";
}

//pr( $nietot );
foreach( $nietot as $nieto ) {
	echo "$('categoria".$nieto['Categoria']['id_categoria']."').addEvent( 'click', listaProductos );\n";
}
// Agrego el callback de novedades
?>
$('novedades').addEvent( 'click', listaNovedades );

$('amoblamientos').addEvent( 'click', listaAmoblamientos );

</script>