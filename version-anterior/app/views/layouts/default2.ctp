<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title><?php echo $title_for_layout?> :: La Oficina Amoblamientos S.C.</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <?php echo $html->css( 'general' ); ?>
  <?php echo $javascript->link( 'prototype' ); ?>
  <?php echo $scripts_for_layout; ?>
</head>
<body>
<table width="80%" cellspacing="0" border="0" cellpadding="0" align="center">
  <tbody>
    <tr>
      <td>
	<table border="0">
         <tbody>
          <tr>
	 	<td><?php echo $html->link( $html->image( 'logo.png', array( 'class' => 'logo') ), '/', array( 'escape' => false ) ); ?></td>
          </tr>
	  <tr>
		<td><?php echo $this->element( 'menu' ); ?></td>
	  </tr>
         </tbody>
        </table>
      </td>
      <td valign="top">
	<table width="100%" cellspacing="0" border="0" cellpadding="0">
         <tbody>
	  <tr>
	   <td colspan="6" align="right"><div class="boton-inicio">&nbsp;</div></td>
         </tr>
         <tr>
	    <td colspan="2" class="titulo-pagina" id="titulo"></td>
	    <td>&nbsp;</td>
	    <td rowspan="2" class="titulo-naranja" id="titulonaranja">&nbsp;</td>
	    <td>&nbsp;</td>
	    <td class="columna"></td>
	  </tr>
	  <tr>
	    <td class="columna"></td>
 	    <td rowspan="2" valign="top" class="contenido"><?php echo $content_for_layout ?></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td class="columna"></td>
	  </tr>
	  <tr>
           <td class="columna">&nbsp;</td>
	    <td>&nbsp;</td>
	   <td id="contenidoderecha"></td>
	   <td>&nbsp;</td>
           <td class="columna">&nbsp;</td>
         </tr>
	  <tr>
           <td colspan="6" class="inferior">9 de Julio 1901 esquina Corrientes | Tel/Fax: 0342 - 4598485 | laoficinaamoblamientos@fibertel.com.ar | www.laoficinaamoblamientos.com.ar </td>
         </tr>
       </tbody>
      </table>
     </td>
    </tr>
  </tbody>
</table>
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