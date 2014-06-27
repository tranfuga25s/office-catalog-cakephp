<?php
class SwfUploadHelper extends AppHelper {

	var $helpers = array( 'javascript', 'Html', 'Form' );

	function crearsubida( $etiqueta = null, $url_envio = null, $campos_extra = null, $numero = 1, $funcion_completado = null, $session = null ) {
		if( $url_envio == null ) {
			echo "Error al intentar generar el codigo para el cargador.";
			return;
		}
		if( $numero == 1 ) {
		echo $this->javascript->link( 'prototype' );
		echo $this->javascript->link( 'swfupload' );
		echo $this->javascript->link( 'handlers' );
		echo $this->javascript->link( 'swfupload.queue' );
		echo $this->javascript->link( 'fileprogress' );  ?>
		<style type="text/css">
			div.fieldset span.legend {
				background-color:#FFFFFF;
				color:#73B304;
				font:700 14px Arial,Helvetica,sans-serif;
				padding:3px;
			}

			div.flash {
				-moz-border-radius:5px 5px 5px 5px;
				border-color:#D9E4FF;
				margin:10px 5px;
				width:375px;
			}

			button {
				border-width:1px;
				margin-bottom:10px;
				padding:2px 3px;
			}
			input[disabled] {
				border:1px solid #CCCCCC;
			}

			#btnSubmit {
				margin:0 0 0 155px;
			}
			.progressWrapper {
				overflow:hidden;
				width:357px;
			}
			.progressContainer {
				background-color:#F7F7F7;
				border:1px solid #E8E8E8;
				margin:5px;
				overflow:hidden;
				padding:4px;
			}

			.progressName  {
				color:#555555;
				font-size:8pt;
				font-weight:700;
				height:14px;
				overflow:hidden;
				text-align:left;
				white-space:nowrap;
				width:323px;
			}
			.progressBarInProgress, .progressBarComplete, .progressBarError {
				background-color:blue;
				font-size:0;
				height:2px;
				margin-top:2px;
				width:0;
			}
			.progressBarComplete {
				background-color:green;
				visibility:hidden;
				width:100%;
			}
			.progressBarError {
				background-color:red;
				visibility:hidden;
				width:100%;
			}
			.progressBarStatus {
				font-family:Arial;
				font-size:7pt;
				margin-top:2px;
				text-align:left;
				white-space:nowrap;
				width:337px;
			}
			a.progressCancel {
				background-image:url("../images/cancelbutton.gif");
				background-position:-14px 0;
				background-repeat:no-repeat;
				display:block;
				float:right;
				font-size:0;
				height:14px;
				width:14px;
			}
			a.progressCancel:hover {
				background-position:0 0;
			}
			span.legend {
				background-color:#FFFFFF;
				color:#73B304;
				font:700 14px Arial,Helvetica,sans-serif;
				padding:3px;
			}
		</style>

		<script type="text/javascript">
			var swfupload_url = 'swfupload.swf';
			var file_info_url = '/files/info';
			var subidores = new Array();
			window.onload = function() {
				// Para cada elemento del array inicializo el subidor
				for( i = 1; i<subidores.size(); i++ ) {
					subidores[i][0] = new SWFUpload(subidores[i][1]);
				}
			}
		</script>
		<?php } ?>
		<!-- <?php echo ini_get('upload_max_filesize'); ?>-->
		<script>
			var swfu<?php echo $numero; ?> = null;
			var sswfu<?php echo $numero; ?> = {
				file_size_limit : "<?php echo ini_get('upload_max_filesize')*1024; ?>",
				file_types : "*.jpg;*.gif;*.jpeg;*.JPG;*.bmp;*.PNG;*.png",
				file_types_description : "Imagenes( JPG, GIF, JPEG, BMP, PNG )",
				file_upload_limit : <?php echo ini_get('upload_max_filesize')*1024*1024; ?>,
				file_queue_limit : 0,
				custom_settings : {
					progressTarget : "fsUploadProgress<?php echo $numero; ?>",
					cancelButtonId : "btnCancel<?php echo $numero; ?>"
				},
				swfupload_element_id : "flashUI<?php echo $numero; ?>",
				debug: true,

				// Button settings
				button_width: "150",
				button_height: "29",
				button_placeholder_id: "spanButtonPlaceHolder<?php echo $numero; ?>",
				button_text: '<span class="theFont">Agregar Archivo</span>',
				button_text_style: ".theFont { font-size: 14; }",
				button_text_left_padding: 12,
				button_text_top_padding: 3,
				
				// The event handler functions are defined in handlers.js
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				<?php if( $funcion_completado != null ) {
					echo "upload_success_handler: ".$funcion_completado.",";
				} else {
					echo "upload_success_handler : uploadSuccess,";
				} ?>
				upload_complete_handler : uploadComplete,
				queue_complete_handler : queueComplete,	// Queue plugin event


				upload_backend : 'http://www.laoficinamuebles.com.ar/<?php echo $url_envio; ?>/<?php echo $session; ?>',
				upload_url: 'http://www.laoficinamuebles.com.ar/<?php echo $url_envio; ?>/<?php echo $session; ?>',
				flash_path : swfupload_url,
				flash_url: '<?php echo Router::url( '/swfupload.swf' ); ?>',
				preserve_relative_urls: true,
				post_params: { "PHPSESSID" : "<?php echo session_id(); ?>",
					       "PHPSESSNAME": "<?php echo session_name(); ?>"<?php
				if( count( $campos_extra ) != null ) {
					foreach( $campos_extra as $campo ) {
						echo ", \"".$campo['nombre']."\" : ".$campo['valor'];
					}
				echo " } ";
				} else {
					echo " }";
				}
				?>
			};
			subidores[<?php echo $numero; ?>] = [ swfu<?php echo $numero; ?>, sswfu<?php echo $numero; ?> ];
		</script>
		<legend><?php echo $etiqueta; ?></legend>
			<div class="fieldset flash" id="fsUploadProgress<?php echo $numero; ?>">
				<span class="legend">Cola de envio</span>
			</div>
		<div id="divStatus">0 Archivos Subidos</div>
			<div>
				<span id="spanButtonPlaceHolder<?php echo $numero; ?>"></span>
				<input type="button" disabled value="Cancelar" id="btnCancel<?php echo $numero; ?>" style="margin-left: 1px; font-size: 8pt; height: 29px; width: 80px;" onclick="swfu<?php echo $numero; ?>.cancelQueue();">
			</div>
		<div><?php //echo phpInfo(); ?></div>
		<?php
	}
}

?>