<?php
App::uses('SelectDivision', 'Model');

/**
 * SelectDivision Test Case
 *
 */
class SelectDivisionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.select_division'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SelectDivision = ClassRegistry::init('SelectDivision');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SelectDivision);

		parent::tearDown();
	}

}
