<?php
$this->pageTitle = $categoria['Categoria']['nombre'];
$this->set( 'texto_titulo', "Productos" );
$this->set( 'texto_titulonaranja', $categoria['Categoria']['nombre'] );
$this->set( 'elemento_derecha', $html->image( 'categoria_principal.png' ) );

//pr( $categoria);
if( count( $categoria['Productos'] ) > 0 ) {

?>
<table width="100%" cellspacing="0" border="0" cellpadding="0" class="tabla-categorias-productos">
 <tbody>
	<tr>
		<td colspan="3" class="titulo-vistas">Productos de <?php echo $categoria['Categoria']['nombre']; ?></td>
	</tr>
	<tr>
		<td colspan="3" class="tabla-producto-categoria-items">
		<?php foreach( $categoria['Productos'] as $hijo ) {  //pr( $hijo ); ?>
			<div style="float: left;">
			 <a href="<?php echo Router::url( array( 'controller' => 'productos', 'action' => 'ver', $hijo['Producto']['id_producto'], $this->StringUrl->convertir( $hijo['Producto']['nombre']) ) ); ?>" class="tabla-categoria-link">
			  <table cellspacing="0" border="1" cellpadding="0" class="tabla-categoria">
			   <tbody>
			    <tr>
			     <td class="tabla-categoria-imagen"><a href="<?php echo Router::url( array( 'controller' => 'productos', 'action' => 'ver', $hijo['Producto']['id_producto'], $this->StringUrl->convertir( $hijo['Producto']['nombre']) ) ); ?>" class="tabla-categoria-link"><?php if( count( $hijo['VistasProductos'] ) > 0 ) { echo $html->image( $hijo['VistasProductos'][0]['ruta'], array( 'class' => 'tabla-categoria-imagen-producto' ) ); } else { echo $html->image( '/img/categoria_sin_imagen.png', array( 'class' => 'tabla-categoria-imagen' ) ); } ?></a></td>
			    </tr>
			    <tr>
			     <td class="tabla-categoria-titulo"><a href="<?php echo Router::url( array( 'controller' => 'productos', 'action' => 'ver', $hijo['Producto']['id_producto'], $this->StringUrl->convertir( $hijo['Producto']['nombre']) ) ); ?>" class="tabla-categoria-link"><?php echo $hijo['Producto']['nombre']; ?></a></td>
			    </tr>
			   </tbody>
			  </table>
			 </a>
			</div>
		<?php } ?>
		</td>
	</tr>
 </tbody>
</table>
<?php
} else if( count( $categoria['Hijos'] ) > 0 ) {
?>
<table width="100%" cellspacing="0" border="0" cellpadding="0" class="tabla-categorias-productos">
 <tbody>
	<tr>
		<td colspan="3" class="titulo-vistas">Categor&iacute;as de <?php echo $categoria['Categoria']['nombre']; ?></td>
	</tr>
	<tr>
		<td colspan="3" class="tabla-producto-categoria-items">
		<?php foreach( $categoria['Hijos'] as $hijo ) {  //pr( $hijo ); ?>
			<div style="float: left;">
			 <a href="<?php echo Router::url( array( 'controller' => 'categorias', 'action' => 'ver', $hijo['Categoria']['id_categoria'], $this->StringUrl->convertir( $hijo['Categoria']['nombre']) ) ); ?>" class="tabla-categoria-link">
			  <table cellspacing="0" border="1" cellpadding="0" class="tabla-categoria">
			   <tbody>
			    <tr>
			     <td class="tabla-categoria-imagen"><?php if( $hijo['Categoria']['imagen'] != "" ) { echo $html->image( $hijo['Categoria']['imagen'], array( 'class' => 'tabla-categoria-imagen' ) );  } else { echo $html->image( '/img/categoria_sin_imagen.png', array( 'class' => 'tabla-categoria-imagen' ) ); } ?></td>
			    </tr>
			    <tr>
			     <td class="tabla-categoria-titulo"><?php echo $hijo['Categoria']['nombre']; ?></td>
			    </tr>
			   </tbody>
			  </table>
			 </a>
			</div>
		<?php } ?>
		</td>
	</tr>
 </tbody>
</table>
<?php
} else {
?>
<table width="100%" cellspacing="0" border="0" cellpadding="0" class="tabla-categorias-productos">
 <tbody>
	<tr>
		<td colspan="3" class="titulo-vistas">Categor&iacute;as de <?php echo $categoria['Categoria']['nombre']; ?></td>
	</tr>
	<tr>
		<td colspan="3" class="tabla-categoria-vacio">No existe ningun producto o categoria en esta categoria</td>
	</tr>
 </tbody>
</table>
<?php
}
?>