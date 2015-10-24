<?php
/**
 * QuestionFixture
 *
 */
class QuestionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'qsn_set_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'qsn_desc' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'qsn_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false, 'key' => 'index'),
		'is_ans_required' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'validity_rule_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false, 'key' => 'index'),
		'qsu_order' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'pmtc_questions_fk1' => array('column' => 'qsn_set_id', 'unique' => 0),
			'pmtc_questions_fk2' => array('column' => 'qsn_type_id', 'unique' => 0),
			'qsn_rules_id_assw' => array('column' => 'validity_rule_id', 'unique' => 0)
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
			'qsn_set_id' => 1,
			'qsn_desc' => 'Lorem ipsum dolor sit amet',
			'qsn_type_id' => 1,
			'is_ans_required' => 1,
			'validity_rule_id' => 1,
			'qsu_order' => 1
		),
	);

}
