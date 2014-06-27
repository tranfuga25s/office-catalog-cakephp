<div class="producto" id="producto">
<script type="text/javascript" language="JavaScript">
function cambiarImagen( ruta ) {
	var Myimg = new Element( 'img', { 'src' : ruta } );
	$('imagengrande').setStyle( 'display', 'none' );
	$('imagengrande').empty().adopt( Myimg );
	$('imagengrande').set( 'href', ruta );
	var altoImagen = $('producto').getSize().y;
	var anchoImagen = $('producto').getSize().x;
	var div = anchoImagen / 2;
	div = div + ( anchoImagen / 4 );
	var margen1 = 0 - div;
	var margen2 = 0 - 84;
 	$('producto').setStyle( 'margin-left', margen1 );
 	$('producto').setStyle( 'margin-top', margen2 );
	// Calculo el tamaño maximo que puede tener
	var arriba = $('producto').getPosition().y;
	var a1 = $('contenedor').getSize().y;
	var abajo = a1 - 5;
	var alto_imagen_maximo = abajo - arriba;
	Myimg.setStyles( { 'height' : alto_imagen_maximo  } );
	$('imagengrande').setStyle( 'display', 'block' );
}
</script>
	<div><a id="imagengrande" rel="lightbox-a" href=""></a></div>
	<div style="display: none;">
	<?php
		// Elimino el primer elemento del array ya que esta declarado antes
		$f = array_reverse( $producto['VistasProductos'] );
		array_pop( $f );
		$fotos = array_reverse( $f );
		foreach( $fotos as $foto ) {
			echo "<a rel=\"lightbox-a\" href=\"" . $foto['ruta'] . "\">" . $foto['nombre']. "</a>";
		}
	?>
	</div>
<?php if( count( $producto['VistasProductos'] > 0 ) ) { ?>
<script>
cambiarImagen( '<?php echo $producto['VistasProductos'][0]['ruta']; ?>' );
Slimbox.scanPage();
</script>
<?php } ?>
<span class="aclaracion">* Las imagenes son solo ilustrativas. Pueden cambiar sin previo aviso.<br /> Haga click para agrandar y ver m&acute;s im&aacute;genes si est&aacute;n disponibles.</span>
</div>
