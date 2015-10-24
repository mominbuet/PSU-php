<?php
/**
 * QuestionGroupFixture
 *
 */
class QuestionGroupFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'question_group';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => false, 'key' => 'index'),
		'question_set_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => false, 'key' => 'index'),
		'active_from' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'active_to' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'is_active' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'group_id' => array('column' => 'group_id', 'unique' => 0),
			'question_set_id' => array('column' => 'question_set_id', 'unique' => 0)
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
			'group_id' => 1,
			'question_set_id' => 1,
			'active_from' => '2015-02-22 20:59:41',
			'active_to' => '2015-02-22 20:59:41',
			'is_active' => 1
		),
	);

}
