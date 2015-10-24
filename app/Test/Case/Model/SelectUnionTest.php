<?php
App::uses('SelectUnion', 'Model');

/**
 * SelectUnion Test Case
 *
 */
class SelectUnionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.select_union',
		'app.union',
		'app.upzilla'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SelectUnion = ClassRegistry::init('SelectUnion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SelectUnion);

		parent::tearDown();
	}

}
