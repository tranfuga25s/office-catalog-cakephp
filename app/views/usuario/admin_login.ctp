Formulario de Ingreso
<?php
echo $this->Form->create( 'Usuario', array( 'url' => array( 'controller' => 'usuario', 'action' => 'login'  ) ) );
echo $this->Form->input( 'nombre', array( 'type' => 'text' ) );
echo $this->Form->input( 'contra', array( 'type' => 'password' ) );
echo $this->Form->end( 'Ingresar' );
?>