<?php
/**
 * ContainersPage Test Case
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('ContainersPage', 'Pages.Model');
App::uses('YACakeTestCase', 'NetCommons.TestSuite');

/**
 * Summary for ContainersPage Test Case
 */
class ContainersPageTest extends YACakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.containers.container',
		'plugin.containers.containers_page',
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ContainersPage = ClassRegistry::init('Containers.ContainersPage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ContainersPage);

		parent::tearDown();
	}

/**
 * test
 *
 * @return void
 */
	public function test() {
	}

}
