<div class="formcontacto">
<?php
echo $this->Form->create( 'Contacto', array( 'controller' => 'contactos', 'action' => 'enviar' ) );
?>
<p class="texto-superior-contacto">Si quer&eacute;s conocer m&aacute;s sobre nuestros productos, no dudes en   contactarte con nosotros completando el siguiente formulario.</p>
<p class="texto-superior-contacto"><?php echo $this->Session->flash(); ?></p>
<table class="tabla-contacto">
  <tbody>
    <tr>
      <td class="titulo-campo-formulario">Enviar a:</td>
      <td><?php echo $this->Form->select( 'donde', array( 1 => 'Información', 2 => 'Administración' ), null, array( 'label' => '', 'class' => 'ingreso-contacto' ) ); ?></td>
    </tr>
    <tr>
      <td class="titulo-campo-formulario">Nombre:</td>
      <td><?php echo $this->Form->input( 'nombre', array( 'label' => '', 'class' => 'ingreso-contacto' ) ); ?></td>
    </tr>
    <tr>
      <td class="titulo-campo-formulario">Apellido:</td>
      <td><?php echo $this->Form->input( 'apellido', array( 'label' => '' ) ); ?></td>
    </tr>
    <tr>
      <td class="titulo-campo-formulario">Telefono:</td>
      <td><?php echo $this->Form->input( 'telefono', array( 'label' => '' ) ); ?></td>
    </tr>
    <tr>
      <td class="titulo-campo-formulario">Email:</td>
      <td><?php echo $this->Form->input( 'email', array( 'label' => '' ) ); ?></td>
    </tr>
    <tr>
      <td class="titulo-campo-formulario">Consulta:</td>
      <td><?php echo $this->Form->input( 'consulta', array( 'label' => '', 'cols' => 30 ) ); ?></td>
    </tr>
  </tbody>
</table>
<?php echo $this->Form->end( 'Enviar' ); ?>
</div>