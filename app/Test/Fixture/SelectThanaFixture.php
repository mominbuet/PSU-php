<?php
/**
 * SelectThanaFixture
 *
 */
class SelectThanaFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'select_thana';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'thana_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => false, 'key' => 'primary'),
		'thana_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 120, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'district_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'thana_id', 'unique' => 1),
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
			'thana_id' => 1,
			'thana_name' => 'Lorem ipsum dolor sit amet',
			'district_id' => 1
		),
	);

}
