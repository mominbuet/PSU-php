<?php
App::uses('QuestionGroup', 'Model');

/**
 * QuestionGroup Test Case
 *
 */
class QuestionGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.question_group',
		'app.group',
		'app.question_set'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->QuestionGroup = ClassRegistry::init('QuestionGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QuestionGroup);

		parent::tearDown();
	}

}
