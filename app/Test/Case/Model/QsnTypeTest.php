<?php
App::uses('QsnType', 'Model');

/**
 * QsnType Test Case
 *
 */
class QsnTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.qsn_type',
		'app.question',
		'app.qsn_set',
		'app.validity_rule'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->QsnType = ClassRegistry::init('QsnType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QsnType);

		parent::tearDown();
	}

}
