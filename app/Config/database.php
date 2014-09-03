<?php
class DATABASE_CONFIG {
    public $default = array(
        'datasource' => 'Database/Sqlite',
        'persistent' => false,
        'database' => 'database.sqlite'
    );
    public $test = array(
        'datasource' => 'Database/Sqlite',
        'persistent' => false,
        'database' => 'test.database.sqlite'
    );
}
