<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta name="google-site-verification" content="N3qrUWDNqhYe5UfVagMrC-LMOo9ZsOiExTtmyAmZCv4" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title><?php echo $title_for_layout?> :: La Oficina Amoblamientos S.C.</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <?php echo $html->css( 'general' ); ?>
  <?php echo $javascript->link( 'prototype' ); ?>
  <?php echo $scripts_for_layout; ?>
</head>
<body>
<center>
<div align="center" class="div-superior">
 <div class="div-menu">
  <table border="0" width="100%"><tbody><tr>
	 	<td><?php echo $html->link( $html->image( 'logo.png', array( 'class' => 'logo') ), '/', array( 'escape' => false ) ); ?></td>
          </tr><tr>
		<td><?php echo $this->element( 'menu' ); ?></td>
	  </tr></tbody>
  </table>
 </div>
 <div class="div-contenido">
   <div class="div-bordes">
    <?php echo $html->link( '<div class="boton-inicio">&nbsp;</div>', '/', array( 'escape' => false ) ); ?>
    <br />
    <div class="col-derecha">&nbsp;</div>
    <div class="col-izquierda">&nbsp;</div>
    <div class="titulo-pagina" id="titulo">&nbsp;</div>
    <div class="titulo-naranja" id="titulonaranja">&nbsp;</div>
    <br />
    <div class="contenido"><?php echo $content_for_layout; ?></div>
    <div class="contenidoderecha" id="contenidoderecha">&nbsp;</div>
    <br />
    <div class="inferior">9 de Julio 1901 Esq. Corrientes | Tel/Fax: 0342-4598485 | laoficinaamoblamientos@fibertel.com.ar | www.laoficinaamoblamientos.com.ar | Diseño: BSComputación</div>
   </div>
 </div>
</div></center>
<script type="text/javascript" language="JavaScript">
$('titulo').update( '<?php echo $this->getVar( 'texto_titulo' ); ?>' );
$('titulonaranja').update( '<?php echo $this->getVar( 'texto_titulonaranja' ); ?>' );
<?php if( $this->getVar( 'elemento_derecha' ) != '' ) { ?>
var contenido = '<?php echo preg_replace( '(\n)', '', $this->getVar( 'elemento_derecha' ) ); ?>';
$('contenidoderecha').update( contenido );
<?php } ?>
</script>
<?php echo $this->element('sql_dump'); ?>
<?php echo $this->element('publicidad'); ?>
</body>
</html>