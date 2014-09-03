<?php
$this->pageTitle = 'La Oficina Muebles :: Ultimas Noticias';
$this->set( 'elemento_derecha', $html->image( 'noticias_principal.jpg' ) );
$this->set( 'texto-titulonaranja', 'Noticias' );
$this->set( 'texto_titulo', "Ultimas noticias" );
if( count( $noticias ) == 0 ) {
?> <div>No se encontro ninguna noticia.</div> <?php
} else {
	foreach( $noticias as $noticia ) {
	?>
	<div class="noticia">
		<h3><?php echo $noticia['Noticia']['titulo']; ?></h3>
		<?php echo $noticia['Noticia']['cuerpo']; ?>
		<div class="noticia-modificacion">Ultima Modificacion: <?php echo $noticia['Noticia']['modified']; ?></div>
	</div>
	<?php
	}
}
?>