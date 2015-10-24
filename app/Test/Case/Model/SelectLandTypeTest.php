<?php
App::uses('SelectLandType', 'Model');

/**
 * SelectLandType Test Case
 *
 */
class SelectLandTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.select_land_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SelectLandType = ClassRegistry::init('SelectLandType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SelectLandType);

		parent::tearDown();
	}

}
