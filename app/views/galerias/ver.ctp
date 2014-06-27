<div class="producto" id="galeria">
<script type="text/javascript" language="JavaScript">
function cambiarImagen( ruta ) {
	var Myimg = new Element( 'img', { 'src' : ruta } );
	$('imagengrande').setStyle( 'display', 'block' );
	$('imagengrande').empty().adopt( Myimg );
	$('imagengrande').set( 'href', ruta );
	var altoImagen = $('galeria').getSize().y;
	var anchoImagen = $('galeria').getSize().x;
	var margen1 = 0 - ( anchoImagen / 2 );
	var margen2 = 0 - 84;
 	$('galeria').setStyle( 'margin-left', margen1 );
 	$('galeria').setStyle( 'margin-top', margen2 );
	// Calculo el tamaño maximo que puede tener
	var arriba = $('galeria').getPosition().y;
	var a1 = $('contenedor').getSize().y;
	var abajo = a1 - 5;
	var alto_imagen = abajo - arriba;
	Myimg.setStyles( { 'height' : alto_imagen  } );
}
</script>
	<div><a id="imagengrande" rel="lightbox-a" href=""></a></div>
	<div style="display: none;">
	<?php
		// Elimino el primer elemento del array ya que esta declarado antes
		$f = array_reverse( $galeria['ItemGalerium'] );
		array_pop( $f );
		$fotos = array_reverse( $f );
		foreach( $fotos as $foto ) {
			echo "<a rel=\"lightbox-a\" href=\"". $foto['ruta'] . "\">". $foto['nombre']. "</a>";
		}
	?>
	</div>
<?php if( count( $galeria['ItemGalerium'] ) > 0 ) { ?>
<script>
cambiarImagen( '/<?php echo $galeria['ItemGalerium'][0]['ruta']; ?>' );
Slimbox.scanPage();
</script>
<?php } ?>
<!--<span class="aclaracion">* Las imagenes son solo ilustrativas. Pueden cambiar sin previo aviso.</span>-->
</div>
