<?php
class UsuarioController extends AppController {
	var $name = "Usuario";

	function admin_login() {}
	function admin_logout() { $this->redirect( $this->Auth->logout() ); }

	function admin_index() {
		$this->layout = 'admin';
		$this->set( 'usuarios', $this->paginate() );
	}

	function admin_add() {
		$this->layout = 'admin';
		if( !empty( $this->data ) ) {
			if( $this->data['Usuario']['contra'] == $this->Auth->password( $this->data['Usuario']['confirma_contra'] ) ) {
				if( $this->Usuario->save( $this->data ) ) {
					$this->Session->setFlash( 'Usuario agregado correctamente' );
					$this->redirect( array( 'action' => 'index' ) );
				} else {
					$this->Session->setFlash( 'Error al guardar el usuario' );
				}
			} else {
				$this->Session->setFlash( 'Las contraseñas suministradas no coinciden' );
			}
		}
	}

	function admin_edit( $id_usuario = null ) {
		$this->layout = 'admin';
		if( !empty( $this->data ) ) {
			if( $this->data['Usuario']['contra'] == $this->Auth->password( $this->data['Usuario']['confirma_contra'] ) ) {
				if( $this->Usuario->save( $this->data ) ) {
					$this->Session->setFlash( 'Usuario modificado correctamente' );
					$this->redirect( array( 'action' => 'index' ) );
				} else {
					$this->Session->setFlash( 'Error al guardar el usuario' );
				}
			} else {
				$this->Session->setFlash( 'Las contraseñas subministradas no coinciden' );
			}
		}
		$this->Usuario->id = $id_usuario;
		$this->data = $this->Usuario->read();
	}

}
?>