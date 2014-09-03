<?php
/* Colore Fixture generated on: 2010-08-10 00:08:54 : 1281411294 */
class ColoreFixture extends CakeTestFixture {
	var $name = 'Colore';

	var $fields = array(
		'id_color' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nombre' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id_color', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id_color' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2010-08-10 00:34:54',
			'modified' => '2010-08-10 00:34:54'
		),
	);
}
?>