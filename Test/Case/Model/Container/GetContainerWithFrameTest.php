<?php
/**
 * Container::getContainerWithFrame()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('NetCommonsGetTest', 'NetCommons.TestSuite');

/**
 * Container::getContainerWithFrame()のテスト
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Containers\Test\Case\Model\Container
 */
class ContainerGetContainerWithFrameTest extends NetCommonsGetTest {

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
 * Plugin name
 *
 * @var string
 */
	public $plugin = 'containers';

/**
 * Model name
 *
 * @var string
 */
	protected $_modelName = 'Container';

/**
 * Method name
 *
 * @var string
 */
	protected $_methodName = 'getContainerWithFrame';

/**
 * getContainerWithFrame()のテスト
 *
 * @return void
 */
	public function testGetContainerWithFrame() {
		//データ生成
		$id = 1;

		//テスト実施
		$model = $this->_modelName;
		$methodName = $this->_methodName;
		$result = $this->$model->$methodName($id);

		//チェック
		$this->assertEquals(['Container', 'Box', 'Page'], array_keys($result));
		// * Container
		$this->assertEquals('1', Hash::get($result, 'Container.id'));
		// * Box
		$this->assertCount(1, Hash::get($result, 'Box'));
		$this->assertEquals('1', Hash::get($result, 'Box.0.id'));
		$this->assertInternalType('array', Hash::get($result, 'Box.0.Frame'));
		$this->assertInternalType('array', Hash::get($result, 'Box.0.Page'));
		$this->assertEquals('1', Hash::get($result, 'Box.0.Page.0.BoxesPage.page_id'));
		$this->assertEquals('1', Hash::get($result, 'Box.0.Page.0.BoxesPage.box_id'));
		// * Page
		$this->assertCount(1, Hash::get($result, 'Page'));
		$this->assertEquals('1', Hash::get($result, 'Page.0.id'));
		$this->assertEquals('1', Hash::get($result, 'Page.0.lft'));
		$this->assertEquals('2', Hash::get($result, 'Page.0.rght'));
		$this->assertEquals('1', Hash::get($result, 'Page.0.ContainersPage.page_id'));
		$this->assertEquals('1', Hash::get($result, 'Page.0.ContainersPage.container_id'));
	}
}
