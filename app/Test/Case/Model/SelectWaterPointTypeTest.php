<?php
App::uses('SelectWaterPointType', 'Model');

/**
 * SelectWaterPointType Test Case
 *
 */
class SelectWaterPointTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.select_water_point_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SelectWaterPointType = ClassRegistry::init('SelectWaterPointType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SelectWaterPointType);

		parent::tearDown();
	}

}
