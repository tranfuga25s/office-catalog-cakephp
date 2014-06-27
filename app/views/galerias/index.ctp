<?php
//pr( $datos );
foreach( $datos as $galeria ) {
	//pr( $producto );
	?>
	<div class="item-producto" id="galeria<?php echo $galeria['Galeria']['id_galeria']; ?>">
	<?php
	if( $galeria['Galeria']['id_miniatura'] != null && $galeria['Galeria']['id_miniatura'] != 0 ) {
		$miniatura = $this->requestAction( array( 'controller' => 'item_galerias', 'action' => 'ruta_miniatura', "id_miniatura" => $galeria['Galeria']['id_miniatura'] ) );
		if( $miniatura != "" ) {
			echo "<img src=\"/". $miniatura . "\" id=\"galeria" .$galeria['Galeria']['id_galeria']. "\" width=\"200\" /><br />".$galeria['Galeria']['nombre'];
		} else {
			echo $galeria['Galeria']['nombre'];
		}
	} else {
		echo $galeria['Galeria']['nombre'];
	} ?>
	</div>
	<script>
	$('galeria<?php echo $galeria['Galeria']['id_galeria']; ?>').addEvent( 'click', mostrarGaleria );
	</script>
	<?php
}
?>