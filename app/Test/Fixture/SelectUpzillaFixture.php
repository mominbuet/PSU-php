<?php
/**
 * SelectUpzillaFixture
 *
 */
class SelectUpzillaFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'select_upzilla';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'upzilla_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'upzilla_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 120, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'district_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'is_active' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'upzilla_code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'upzilla_id', 'unique' => 1),
			'district_id' => array('column' => 'district_id', 'unique' => 0)
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
			'upzilla_id' => 1,
			'upzilla_name' => 'Lorem ipsum dolor sit amet',
			'district_id' => 1,
			'is_active' => 1,
			'upzilla_code' => 'Lorem ipsum dolor '
		),
	);

}
