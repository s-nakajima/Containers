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
		'plugin.boxes.box',
		'plugin.boxes.boxes_page',
		'plugin.containers.container',
		'plugin.containers.containers_page',
		'plugin.frames.frame',
		'plugin.pages.page',
		'plugin.m17n.language',
		'plugin.plugin_manager.plugin',
		'plugin.users.user',
		'plugin.users.user_attributes_user',
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

		$this->assertArrayHasKey('Container', $container, 'Container');
		$this->assertInternalType('array', $container['Container'], 'Container');
		$this->assertGreaterThanOrEqual(1, count($container['Container']), 'Container');

		$this->assertArrayHasKey('Box', $container, 'Box');
		$this->assertInternalType('array', $container['Box'], 'Box');
		$this->assertGreaterThanOrEqual(1, count($container['Box']), 'Box');

		$this->assertArrayHasKey('Frame', $container['Box'][0], 'Frame');
		$this->assertInternalType('array', $container['Box'][0]['Frame'], 'Frame');
		$this->assertGreaterThanOrEqual(1, count($container['Box'][0]['Frame']), 'Frame');

		//$this->assertArrayHasKey('Plugin', $container['Box'][0]['Frame'][0], 'Plugin');
		//$this->assertInternalType('array', $container['Box'][0]['Frame'][0]['Plugin'], 'Plugin');
		//$this->assertEqual(0, count($container['Box'][0]['Frame'][0]['Plugin']), 'Plugin');
		//
		//$this->assertArrayHasKey('Language', $container['Box'][0]['Frame'][0], 'Language');
		//$this->assertInternalType('array', $container['Box'][0]['Frame'][0]['Language'], 'Language');
		//$this->assertGreaterThanOrEqual(1, count($container['Box'][0]['Frame'][0]['Language']), 'Language');

		//$this->assertArrayHasKey('FramesLanguage', $container['Box'][0]['Frame'][0]['Language'][0]);
		//$this->assertInternalType('array', $container['Box'][0]['Frame'][0]['Language'][0]['FramesLanguage']);
		//$this->assertGreaterThanOrEqual(1, count($container['Box'][0]['Frame'][0]['Language'][0]['FramesLanguage']));

		$this->assertArrayHasKey('Page', $container, 'Page');
		$this->assertInternalType('array', $container['Page'], 'Page');
		$this->assertGreaterThanOrEqual(1, count($container['Page']), 'Page');

		$this->assertArrayHasKey('ContainersPage', $container['Page'][0], 'ContainersPage');
		$this->assertInternalType('array', $container['Page'][0]['ContainersPage'], 'ContainersPage');
		$this->assertGreaterThanOrEqual(1, count($container['Page'][0]['ContainersPage']), 'ContainersPage');
	}

}
