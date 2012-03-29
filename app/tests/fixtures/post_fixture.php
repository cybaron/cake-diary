<?php
/* Post Fixture generated on: 2012-03-28 13:49:25 : 1332910165 */
class PostFixture extends CakeTestFixture {
	var $name = 'Post';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'body' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'title' => '日記１個目',
			'body' => '記念すべき１個目の日記です。',
			'created' => '2012-03-28 13:49:25',
			'modified' => '2012-03-28 13:49:25'
		),
		array(
			'id' => 2,
			'user_id' => 1,
			'title' => '日記２個目',
			'body' => '２個目の日記です。',
			'created' => '2012-03-28 13:49:25',
			'modified' => '2012-03-28 13:49:25'
		),
		array(
			'id' => 3,
			'user_id' => 2,
			'title' => '由夏の日記',
			'body' => '由夏が書いた日記です。',
			'created' => '2012-03-28 13:49:25',
			'modified' => '2012-03-28 13:49:25'
		),
	);
}
