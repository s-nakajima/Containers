<?php
/**
 * Container Test Case
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
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
		'plugin.containers.containers_page',
		'plugin.boxes.box',
		'plugin.boxes.page',
		'plugin.boxes.boxes_page',
		'plugin.boxes.plugin',
		'plugin.frames.frame',
		'plugin.frames.language',
		'plugin.frames.frames_language'
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
 * testGetBoxWithFrame method
 *
 * @return void
 */
	public function testGetContainerWithFrame() {
		$container = $this->Container->getContainerWithFrame(1);

		$this->assertCount(3, $container);

		$this->assertArrayHasKey('Container', $container);
		$this->assertInternalType('array', $container['Container']);
		$this->assertGreaterThanOrEqual(1, count($container['Container']));

		$this->assertArrayHasKey('Box', $container);
		$this->assertInternalType('array', $container['Box']);
		$this->assertGreaterThanOrEqual(1, count($container['Box']));

		$this->assertArrayHasKey('Frame', $container['Box'][0]);
		$this->assertInternalType('array', $container['Box'][0]['Frame']);
		$this->assertGreaterThanOrEqual(1, count($container['Box'][0]['Frame']));

		$this->assertArrayHasKey('Plugin', $container['Box'][0]['Frame'][0]);
		$this->assertInternalType('array', $container['Box'][0]['Frame'][0]['Plugin']);
		$this->assertEqual(0, count($container['Box'][0]['Frame'][0]['Plugin']));

		$this->assertArrayHasKey('Language', $container['Box'][0]['Frame'][0]);
		$this->assertInternalType('array', $container['Box'][0]['Frame'][0]['Language']);
		$this->assertGreaterThanOrEqual(1, count($container['Box'][0]['Frame'][0]['Language']));

		$this->assertArrayHasKey('FramesLanguage', $container['Box'][0]['Frame'][0]['Language'][0]);
		$this->assertInternalType('array', $container['Box'][0]['Frame'][0]['Language'][0]['FramesLanguage']);
		$this->assertGreaterThanOrEqual(1, count($container['Box'][0]['Frame'][0]['Language'][0]['FramesLanguage']));

		$this->assertArrayHasKey('Page', $container);
		$this->assertInternalType('array', $container['Page']);
		$this->assertGreaterThanOrEqual(1, count($container['Page']));

		$this->assertArrayHasKey('ContainersPage', $container['Page'][0]);
		$this->assertInternalType('array', $container['Page'][0]['ContainersPage']);
		$this->assertGreaterThanOrEqual(1, count($container['Page'][0]['ContainersPage']));
	}

}
