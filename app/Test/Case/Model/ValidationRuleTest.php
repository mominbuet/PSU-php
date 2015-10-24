<?php
App::uses('ValidationRule', 'Model');

/**
 * ValidationRule Test Case
 *
 */
class ValidationRuleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.validation_rule'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ValidationRule = ClassRegistry::init('ValidationRule');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ValidationRule);

		parent::tearDown();
	}

}
