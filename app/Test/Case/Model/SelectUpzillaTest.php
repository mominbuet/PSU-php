<?php
App::uses('SelectUpzilla', 'Model');

/**
 * SelectUpzilla Test Case
 *
 */
class SelectUpzillaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.select_upzilla',
		'app.district'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SelectUpzilla = ClassRegistry::init('SelectUpzilla');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SelectUpzilla);

		parent::tearDown();
	}

}
