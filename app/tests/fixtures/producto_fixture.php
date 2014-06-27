<?php
/* Producto Fixture generated on: 2010-08-10 00:08:19 : 1281411079 */
class ProductoFixture extends CakeTestFixture {
	var $name = 'Producto';

	var $fields = array(
		'id_producto' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nombre' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'codigo' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'alto' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'largo' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'prof' => array('type' => 'float', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id_producto', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id_producto' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'codigo' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'alto' => 1,
			'largo' => 1,
			'prof' => 1
		),
	);
}
?>