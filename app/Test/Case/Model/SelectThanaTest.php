<?php
App::uses('SelectThana', 'Model');

/**
 * SelectThana Test Case
 *
 */
class SelectThanaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.select_thana',
		'app.district'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SelectThana = ClassRegistry::init('SelectThana');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SelectThana);

		parent::tearDown();
	}

}
