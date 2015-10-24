<?php
/**
 * SelectMiscFixture
 *
 */
class SelectMiscFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'select_misc';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'misc_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => false, 'key' => 'primary'),
		'misc_option' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'question_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'misc_id', 'unique' => 1)
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
			'misc_id' => 1,
			'misc_option' => 'Lorem ipsum dolor sit amet',
			'question_id' => 1
		),
	);

}
