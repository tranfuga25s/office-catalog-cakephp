<?php
$this->pageTitle = 'Colores para un producto';
echo $javascript->link( 'prototype' );
?>
<script type="text/javascript">
function agregar() {
 var disponibles = $('disponibles');
 if( disponibles.options.length > 0 ) {
	for ( var i = 0; i < disponibles.options.length; i++ ) {
	   if( disponibles.options[i].selected  == true ) {
		$('ProductoColores').appendChild( disponibles.options[i] );
		//disponibles.removeChild( disponibles.options[i] );
 	   }
	}
 } else { alert( 'Ningun item seleccionado' ); }
}

function quitar() {
 var usados = $('ProductoColores');
 if( usados.options.length > 0 ) {
	for ( var i = 0; i < usados.options.length; i++ ) {
	   if( usados.options[i].selected  == true ) {
		$('disponibles').appendChild( usados.options[i] );
		//disponibles.removeChild( disponibles.options[i] );
 	   }
	}
 } else { alert( 'Ningun item seleccionado' ); }
}

function enviar() {
  var sel = $('ProductoColores');
  for( var i = 0; i < sel.options.length; i++ ) {
    sel.options[i].selected = true;
  }
  document.form.submit();
}
</script>
<div class="productos form">
<?php echo $this->Form->create('Producto'/*, array( 'default' => false )*/ );?>
	<fieldset>
 		<legend>Colores para <?php echo $producto['Producto']['nombre']; ?></legend>
		<?php echo $this->Form->input( 'id_producto', array( 'type' => 'hidden', 'value' => $producto['Producto']['id_producto'] ) ); ?>
	<table align="center">
		<tbody>
			<tr>
				<th>Colores Disponibles</th>
				<th>&nbsp;</th>
				<th>Colores Asignados</th>
			</tr>
			<tr>
				<td>
					<SELECT name="disponibles" multiple id="disponibles" class="selector">
					<?php
						foreach( $colores as $color ) {
							$id = array_keys( $colores, $color );
							echo "<option value=\"".$id[0]."\">".$color."</option>";
						} ?>
					</SELECT>
				</td>
				<td>
					<INPUT type="button" value="-->" onclick="agregar()">
					<br />
					<INPUT type="button" value="<--" onclick="quitar()">
				</td>
				<td>
					<?php echo $this->Form->input( 'colores', array( 'type' => 'select', 'options' => $usados, 'multiple' => true, 'label' => '' ) ); ?>
				</td>
			</tr>
		</tbody>
	</table>
	</fieldset>
	<div class="submit"><input type="submit" value="Guardar" onclick="enviar()"></div></form>
</div>
<div class="actions">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link( 'Listar Productos', array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link( 'Listar Colores', array('controller' => 'colores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link( 'Nuevo Color', array('controller' => 'colores', 'action' => 'add')); ?> </li>
	</ul>
</div>
