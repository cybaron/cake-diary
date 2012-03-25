<?php
/* User Fixture generated on: 2012-03-25 20:16:27 : 1332674187 */
class UserFixture extends CakeTestFixture {
	var $name = 'User';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'unique', 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 40, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'email' => array('column' => 'email', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'username' => 'kazuki',
			'email' => 'cybaron@gmail.com',
			'password' => '6cc94c7ed0b63a6614517c80b6362ce45c328569',
			'created' => '2012-03-25 20:16:27',
			'modified' => '2012-03-25 20:16:27'
		),
		array(
			'id' => 2,
			'username' => 'yuka',
			'email' => 'mizukinman@gmail.com',
			'password' => '6cc94c7ed0b63a6614517c80b6362ce45c328569',
			'created' => '2012-03-26 20:16:27',
			'modified' => '2012-03-26 20:16:27'
		),
	);
}
