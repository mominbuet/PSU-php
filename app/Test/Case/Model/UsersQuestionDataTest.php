<?php
App::uses('UsersQuestionData', 'Model');

/**
 * UsersQuestionData Test Case
 *
 */
class UsersQuestionDataTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.users_question_data',
		'app.user',
		'app.device',
		'app.user_group',
		'app.group',
		'app.group_visible',
		'app.qsn_set_master',
		'app.division',
		'app.district',
		'app.thana',
		'app.union'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UsersQuestionData = ClassRegistry::init('UsersQuestionData');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UsersQuestionData);

		parent::tearDown();
	}

}
