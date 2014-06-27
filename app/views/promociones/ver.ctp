<?php
if( count( $datos ) ) {

	echo "<center>".$this->Html->image( $datos['Promocion']['ruta'], array( 'class' => 'imagen_promocion', 'align' => 'center' ) )."</center>";
}
?>