<?php
/**
 * SelectUnionFixture
 *
 */
class SelectUnionFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'select_union';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'union_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'union_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 120, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'upzilla_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'union_id', 'unique' => 1),
			'upzilla_id' => array('column' => 'upzilla_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'union_id' => 1,
			'union_name' => 'Lorem ipsum dolor sit amet',
			'upzilla_id' => 1
		),
	);

}
