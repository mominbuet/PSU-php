<?php
App::uses('QuestionAnswer', 'Model');

/**
 * QuestionAnswer Test Case
 *
 */
class QuestionAnswerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.question_answer',
		'app.user_qsn_data'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->QuestionAnswer = ClassRegistry::init('QuestionAnswer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QuestionAnswer);

		parent::tearDown();
	}

}
