<?php
$this->set( 'texto_titulo', 'Productos' );
$this->set( 'elemento_derecha', $html->image( 'categoria_principal.jpg' ) );
//$this->set( 'texto-titulonaranja', 'Productos' );
//pr( $padres ); pr( $hijos ); pr( $datos ); ?>
<table width="100%" cellspacing="0" border="0" cellpadding="0" class="tabla-categorias-general">
 <tbody>
<?php
$total = count( $padres );
$pasados = 0;
for( $pasados = 0; $pasados < $total; $pasados++ ) {
	if( ( $pasados < $total - 1  ) && ( ( $pasados % 2 ) == 0 ) ) {
	?>
	<tr>
		<td class="titulo-vistas"><?php echo $padres[$pasados]['Categoria']['nombre']; ?></td>
		<td>&nbsp;</td>
		<td class="titulo-vistas"><?php echo $padres[$pasados+1]['Categoria']['nombre']; ?></td>
	</tr>
	<tr>
		<td>
		<?php foreach( $hijos[$padres[$pasados]['Categoria']['id_categoria']] as $hijo ) {  //pr( $hijo ); ?>
			<div>
			 <a href="<?php echo Router::url( array( 'controller' => 'categorias', 'action' => 'ver', $hijo['Categoria']['id_categoria'], $this->StringUrl->convertir( $hijo['Categoria']['nombre']) ) ); ?>" class="tabla-categoria-link">
			  <table cellspacing="0" border="1" cellpadding="0" class="tabla-categoria">
			   <tbody>
			    <tr>
			     <td class="tabla-categoria-imagen"><?php if( $hijo['Categoria']['imagen'] != "" ) { echo $html->image( $hijo['Categoria']['imagen'], array( 'class' => 'tabla-categoria-imagen' ) ); } ?></td>
			     <td class="tabla-categoria-titulo"><?php echo $hijo['Categoria']['nombre']; ?></td>
			    </tr>
			   </tbody>
			  </table>
			 </a>
			</div>
		<?php } ?>
		</td>
		<td>&nbsp;</td>
		<td>
		<?php foreach( $hijos[$padres[$pasados+1]['Categoria']['id_categoria']] as $hijo ) {  //pr( $hijo ); ?>
			<div>
			 <a href="<?php echo Router::url( array( 'controller' => 'categorias', 'action' => 'ver', $hijo['Categoria']['id_categoria'], $this->StringUrl->convertir( $hijo['Categoria']['nombre']) ) ); ?>" class="tabla-categoria-link">
			  <table cellspacing="0" border="1" cellpadding="0" class="tabla-categoria">
			   <tbody>
			    <tr>
			     <td class="tabla-categoria-imagen"><?php if( $hijo['Categoria']['imagen'] != "" ) { echo $html->image( $hijo['Categoria']['imagen'], array( 'class' => 'tabla-categoria-imagen' ) ); } ?></td>
			     <td class="tabla-categoria-titulo"><?php echo $hijo['Categoria']['nombre']; ?></td>
			    </tr>
			   </tbody>
			  </table>
			 </a>
			</div>
		<?php } ?>
		</td>
	</tr>
	<?php
		$pasados++;
	} else {
	?>
	<tr>
		<td colspan="3" class="titulo-vistas"><?php echo $padres[$pasados]['Categoria']['nombre']; ?></td>
	</tr>
	<tr>
		<td colspan="3">
		<?php foreach( $hijos[$padres[$pasados]['Categoria']['id_categoria']] as $hijo ) {  //pr( $hijo ); ?>
			<div style="float: left;">
			 <a href="<?php echo Router::url( array( 'controller' => 'categorias', 'action' => 'ver', $hijo['Categoria']['id_categoria'], $this->StringUrl->convertir( $hijo['Categoria']['nombre']) ) ); ?>" class="tabla-categoria-link">
			  <table cellspacing="0" border="1" cellpadding="0" class="tabla-categoria">
			   <tbody>
			    <tr>
			     <td class="tabla-categoria-imagen"><?php if( $hijo['Categoria']['imagen'] != "" ) { echo $html->image( $hijo['Categoria']['imagen'], array( 'class' => 'tabla-categoria-imagen' ) ); } ?></td>
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
	<?php
	}
}
?>
 </tbody>
</table>