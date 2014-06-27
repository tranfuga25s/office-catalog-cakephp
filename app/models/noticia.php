<?php
class Noticia extends AppModel {
	var $name = 'Noticia';
	var $primaryKey = 'id_noticia';
	var $displayField = 'titulo';
	var $validate = array(
		'titulo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'El titulo no puede estar vacio'
			)
		),
		'publicado' => array(
			'boolean' => array(
				'rule' => array('boolean')
			)
		)
	);

	function ultimas() {
		return $this->find( 'all', array( 'conditions' => array( 'Noticia.publicado' => true ), 'limit' => 5 ) );
	}
}
?>