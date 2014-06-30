<?php
class AppController extends Controller {
    
    var $components = array( 
      'Auth' => array(
          'userModel' => 'Usuario',
          'loginAction' => array( 'admin' => true, 'action' => 'login', 'controller' => 'usuario' )
      )  
    );
    
    var $helpers = array( 'Html', 'Form', 'Javascript' );

    function beforeFilter() {
        if( $this->params['controller'] == "pages" ) {
            $this->Auth->allow( '*' );
        }
    }
}