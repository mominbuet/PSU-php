<?php
App::uses('Device', 'Model');

/**
 * Device Test Case
 *
 */
class DeviceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.device',
		'app.user',
		'app.user_group',
		'app.group',
		'app.users_question_data',
		'app.question_set',
		'app.question',
		'app.question_type',
		'app.validation_rule',
		'app.question_section',
		'app.select_misc',
		'app.question_group',
		'app.select_water_point_type',
		'app.select_land_type',
		'app.select_ownership',
		'app.select_district',
		'app.select_division',
		'app.select_union',
		'app.select_upzilla',
		'app.select_village',
		'app.question_answer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Device = ClassRegistry::init('Device');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Device);

		parent::tearDown();
	}

}
