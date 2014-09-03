<?php
/* Categoria Fixture generated on: 2010-08-10 00:08:30 : 1281410730 */
class CategoriaFixture extends CakeTestFixture {
	var $name = 'Categoria';

	var $fields = array(
		'id_categoria' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nombre' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'padre_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'left_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'right_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id_categoria', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id_categoria' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'padre_id' => 1,
			'left_id' => 1,
			'right_id' => 1
		),
	);
}
?>