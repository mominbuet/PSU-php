<?php
App::uses('ValidityRule', 'Model');

/**
 * ValidityRule Test Case
 *
 */
class ValidityRuleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.validity_rule'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ValidityRule = ClassRegistry::init('ValidityRule');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ValidityRule);

		parent::tearDown();
	}

}
