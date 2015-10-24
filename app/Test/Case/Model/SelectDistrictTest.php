<?php
App::uses('SelectDistrict', 'Model');

/**
 * SelectDistrict Test Case
 *
 */
class SelectDistrictTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.select_district',
		'app.division'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SelectDistrict = ClassRegistry::init('SelectDistrict');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SelectDistrict);

		parent::tearDown();
	}

}
