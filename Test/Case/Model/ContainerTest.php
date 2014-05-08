<?php
/**
 * Container Test Case
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('Container', 'Containers.Model');

/**
 * Summary for Container Test Case
 */
class ContainerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.containers.container',
		//'plugin.containers.box',
		//'plugin.containers.page',
		//'plugin.containers.containers_page'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Container = ClassRegistry::init('Containers.Container');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Container);

		parent::tearDown();
	}

/**
 * test method
 *
 * @return void
 */
	public function test() {
	}

}
