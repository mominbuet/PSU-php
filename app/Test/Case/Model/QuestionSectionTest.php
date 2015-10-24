<?php
App::uses('QuestionSection', 'Model');

/**
 * QuestionSection Test Case
 *
 */
class QuestionSectionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.question_section',
		'app.section'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->QuestionSection = ClassRegistry::init('QuestionSection');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QuestionSection);

		parent::tearDown();
	}

}
