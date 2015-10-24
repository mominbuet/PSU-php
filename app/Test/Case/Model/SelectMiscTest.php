<?php
App::uses('SelectMisc', 'Model');

/**
 * SelectMisc Test Case
 *
 */
class SelectMiscTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.select_misc',
		'app.question',
		'app.qsn_set',
		'app.qsn_type',
		'app.validity_rule'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SelectMisc = ClassRegistry::init('SelectMisc');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SelectMisc);

		parent::tearDown();
	}

}
