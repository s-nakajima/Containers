<?php
/**
 * ContainersController Test Case
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('ContainersController', 'Containers.Controller');
App::uses('NetCommonsControllerTestCase', 'NetCommons.TestSuite');

/**
 * Plugin controller class for testAction
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @package NetCommons\Containers\Test\Case\Controller
 */
class TestPluginController extends ContainersController {

/**
 * Set to true to automatically render the view
 * after action logic.
 *
 * @var bool
 */
	public $autoRender = false;

/**
 * index action
 *
 * @param string $id frameId
 * @return string
 */
	public function index($id = null) {
		return 'TestPluginController_index_' . $id;
	}
}
CakePlugin::load('TestPlugin', array('path' => 'test_plugin'));

/**
 * Summary for ContainersController Test Case
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @package NetCommons\Containers\Test\Case\Controller
 */
class ContainersControllerTest extends NetCommonsControllerTestCase {

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
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		//$this->testAction('/containers/containers/index/1', array('return' => 'view'));
		//$this->assertTextContains('<header id="container-header">', $this->view);
	}

/**
 * testIndexContainerMajor method
 *
 * @return void
 */
	public function testIndexContainerMajor() {
		//$this->testAction('/containers/containers/index/2', array('return' => 'view'));
		//$this->assertTextContains('<div id="container-major" class="col-sm-3">', $this->view);
	}

/**
 * testIndexContainerMain method
 *
 * @return void
 */
	public function testIndexContainerMain() {
		//$this->testAction('/containers/containers/index/3', array('return' => 'view'));
		//$this->assertTextContains('<div id="container-main" class="col-sm-6" role="main">', $this->view);
	}

/**
 * testIndexContainerMinor method
 *
 * @return void
 */
	public function testIndexContainerMinor() {
		//$this->testAction('/containers/containers/index/4', array('return' => 'view'));
		//$this->assertTextContains('div id="container-minor" class="col-sm-3">', $this->view);
	}

/**
 * testIndexContainerFooter method
 *
 * @return void
 */
	public function testIndexContainerFooter() {
		//$this->testAction('/containers/containers/index/5', array('return' => 'view'));
		//$this->assertTextContains('<footer id="container-footer" role="contentinfo">', $this->view);
	}

/**
 * testIndexNotFound method
 *
 * @return void
 */
	public function testIndexNotFound() {
		//$this->setExpectedException('NotFoundException');
		//$this->testAction('/containers/containers/index');
	}

}
