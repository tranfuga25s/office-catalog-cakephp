<?php
class SubidorHelper extends AppHelper {

	var $helpers = array( 'Javascript', 'Form' );

	function crearSubida( $titulo, $url, $modelo, $variables, $script = null )
	{
		?>
		<fieldset>
			<?php echo $this->Javascript->link( 'mootools' ); ?>
			<legend><?php echo $titulo; ?></legend>
			<?php
			$opciones = array( 'url' => $url, 'id' => 'formsubida', 'enctype' => 'multipart/form-data' );
			if( $script != null ) {
				$opciones = array_merge( $opciones, array( 'target' => 'subidor' ) );
			}
			echo $this->Form->create( $modelo, $opciones );
			foreach( $variables as $variable ) {
				  echo $this->Form->input( $variable['nombre'], array( 'value' => $variable['valor'], 'type' => 'hidden' ) );
			}
			echo $this->Form->input( 'archivo', array( 'label' => 'Enviar:', 'type' => 'file' ) );
			echo $this->Form->end( 'Enviar' );
			?>
			<?php if( $script != null ) { ?>
			<iframe name="subidor" id="subidor" style="display: none;"></iframe>
			<script>
			$('subidor').addEvent( 'load', function( evento) {
				var contenido = evento.target.contentWindow.document.body.innerHTML;
				<?php echo $script; ?>( contenido );
			} );
			<?php } ?>
			</script>
		</fieldset>
		<?php
	}
}
?>