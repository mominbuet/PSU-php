<?php
App::uses('QsnAnswer', 'Model');

/**
 * QsnAnswer Test Case
 *
 */
class QsnAnswerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.qsn_answer',
		'app.user_qsn_data'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->QsnAnswer = ClassRegistry::init('QsnAnswer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QsnAnswer);

		parent::tearDown();
	}

}
