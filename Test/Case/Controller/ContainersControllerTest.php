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

/**
 * Summary for ContainersController Test Case
 */
class ContainersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.containers.container',
		'plugin.containers.containers_page',
		'plugin.containers.site_setting',
		'plugin.containers.site_setting_value',
		'plugin.boxes.box',
		'plugin.boxes.boxes_page',
		'plugin.boxes.page',
		'plugin.boxes.plugin',
		'plugin.frames.frame',
		'plugin.frames.language',
		'plugin.frames.frames_language'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->testAction('/containers/containers/index/1', array('return' => 'view'));
		$this->assertTextContains('<header id="container-header">', $this->view);
	}

/**
 * testIndexNotFound method
 *
 * @return void
 */
	public function testIndexNotFound() {
		$this->setExpectedException('NotFoundException');
		$this->testAction('/containers/containers/index');
	}

}
