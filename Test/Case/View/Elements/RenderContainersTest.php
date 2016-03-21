<?php
/**
 * View/Elements/render_containersのテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('NetCommonsControllerTestCase', 'NetCommons.TestSuite');

/**
 * View/Elements/render_containersのテスト
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Containers\Test\Case\View\Elements\RenderContainers
 */
class ViewElementsRenderContainersTest extends NetCommonsControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array();

/**
 * Plugin name
 *
 * @var string
 */
	public $plugin = 'containers';

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		//テストプラグインのロード
		NetCommonsCakeTestCase::loadTestPlugin($this, 'Containers', 'TestContainers');
	}

/**
 * addアクションのGETテスト(ログインなし)用DataProvider
 *
 * #### 戻り値
 *  - id Containers.id
 *  - actual 期待値
 *
 * @return array
 */
	public function dataProvider() {
		$results[0] = array('id' => '1', '<header id="container-header">');
		$results[1] = array('id' => '2', '<div id="container-major" class="col-sm-3">');
		$results[2] = array('id' => '3', '<div id="container-main" class="col-sm-6" role="main">');
		$results[3] = array('id' => '4', '<div id="container-minor" class="col-sm-3">');
		$results[4] = array('id' => '5', '<footer id="container-footer" role="contentinfo">');

		return $results;
	}

/**
 * View/Elements/render_containersのテスト
 *
 * @param int $id Containers.id
 * @param string $actual 期待値
 * @dataProvider dataProvider
 * @return void
 */
	public function testRenderContainers($id, $actual) {
		//テストコントローラ生成
		$this->generateNc('TestContainers.TestViewElements');

		//テスト実行
		$this->_testNcAction('/test_containers/test_view_elements/render_containers/' . $id, array(
			'method' => 'get'
		));

		//チェック
		$pattern = '/' . preg_quote('View/Elements/render_containers', '/') . '/';
		$this->assertRegExp($pattern, $this->view);

		$this->assertTextContains($actual, $this->view);
	}
}