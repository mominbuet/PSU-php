<?php
/**
 * QsnAnswerFixture
 *
 */
class QsnAnswerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_qsn_data_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'qsn_desc' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'qsn_answer' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'pmtc_qsn_answers_fk1' => array('column' => 'user_qsn_data_id', 'unique' => 0)
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
			'user_qsn_data_id' => 1,
			'qsn_desc' => 1,
			'qsn_answer' => 'Lorem ipsum dolor sit amet'
		),
	);

}
