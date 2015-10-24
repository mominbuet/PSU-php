<?php
App::uses('SelectOwnership', 'Model');

/**
 * SelectOwnership Test Case
 *
 */
class SelectOwnershipTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.select_ownership'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SelectOwnership = ClassRegistry::init('SelectOwnership');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SelectOwnership);

		parent::tearDown();
	}

}
