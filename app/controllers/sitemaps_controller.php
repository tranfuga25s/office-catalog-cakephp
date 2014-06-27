<?php
class SitemapsController extends AppController{

	var $name = 'Sitemaps';
	var $uses = array( 'Noticias', 'Categorias', 'Productos', 'Promociones' );
	var $helpers = array('Time', 'Xml');
	var $components = array('RequestHandler');

	function beforeFilter() {
		$this->Auth->allow( 'index' );
	}

	function index (){
		$this->RequestHandler->respondAs('xml');
		$this->layout = 'xml/default';
		$this->set( 'noticias', $this->Noticias->find( 'all', array( 'conditions' => array( 'publicado' => 1 ), 'fields' => array( 'id_noticia', 'titulo', 'modified' ), 'recursive' => -1 ) ) );
		$this->set( 'categorias', $this->Categorias->find( 'all', array( 'conditions' => array( 'publicado' => 1 ), 'fields' => array( 'id_categoria', 'nombre' ), 'recursive' => -1 ) ) );
		$this->set( 'productos', $this->Productos->find( 'all', array( 'conditions' => array( 'publicado' => 1 ), 'fields' => array( 'id_producto', 'nombre' ), 'recursive' => -1 ) ) );
		$this->set( 'promociones', $this->Promociones->find( 'all', array( 'conditions' => array( 'publicado' => 1 ), 'fields' => array( 'id_promocion', 'nombre' ), 'recursive' => -1 ) ) );
		//debug logs will destroy xml format, make sure were not in drbug mode
		//Configure::write ('debug', 0);
	}
}
?>