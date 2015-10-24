<?php
/**
 * UsersQsnDataFixture
 *
 */
class UsersQsnDataFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'group_visible_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'qsn_set_master_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'geo_lat' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'geo_lon' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'division_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'district_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'thana_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'union_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'pmtc_users_qsn_data_fk1' => array('column' => 'user_id', 'unique' => 0),
			'pmtc_users_qsn_data_fk2' => array('column' => 'qsn_set_master_id', 'unique' => 0)
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
			'id' => 1,
			'user_id' => 1,
			'group_visible_id' => 'Lorem ipsum dolor ',
			'qsn_set_master_id' => 1,
			'geo_lat' => 'Lorem ipsum dolor ',
			'geo_lon' => 'Lorem ipsum dolor ',
			'division_id' => 1,
			'district_id' => 1,
			'thana_id' => 1,
			'union_id' => 1
		),
	);

}
