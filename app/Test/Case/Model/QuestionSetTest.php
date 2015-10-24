<?php
App::uses('QuestionSet', 'Model');

/**
 * QuestionSet Test Case
 *
 */
class QuestionSetTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.question_set'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->QuestionSet = ClassRegistry::init('QuestionSet');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QuestionSet);

		parent::tearDown();
	}

}
