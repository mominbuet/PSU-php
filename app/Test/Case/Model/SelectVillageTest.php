<?php
App::uses('SelectVillage', 'Model');

/**
 * SelectVillage Test Case
 *
 */
class SelectVillageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.select_village',
		'app.union'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SelectVillage = ClassRegistry::init('SelectVillage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SelectVillage);

		parent::tearDown();
	}

}
