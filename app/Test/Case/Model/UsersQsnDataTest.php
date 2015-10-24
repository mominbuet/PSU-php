<?php
App::uses('UsersQsnData', 'Model');

/**
 * UsersQsnData Test Case
 *
 */
class UsersQsnDataTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.users_qsn_data',
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
		$this->UsersQsnData = ClassRegistry::init('UsersQsnData');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UsersQsnData);

		parent::tearDown();
	}

}
