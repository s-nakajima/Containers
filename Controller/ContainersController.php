<?php
/**
 * Containers Controller
 *
 * @property Container $Container
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('ContainersAppController', 'Containers.Controller');

class ContainersController extends ContainersAppController {

/**
 * uses
 *
 * @var array
 */
	public $uses = array('Containers.Container');

/**
 * index method
 *
 * @param string $id containerId
 * @throws NotFoundException
 * @return void
 */
	public function index($id = null) {
		$container = $this->Container->getContainerWithFrame($id);
		if (empty($container)) {
			throw new NotFoundException();
		}

		$containers = array($container['Container']['type'] => $container['Container']);
		$boxes = Hash::combine($container['Box'], '{n}.id', '{n}', '{n}.container_id');

		$this->set('containers', $containers);
		$this->set('boxes', $boxes);
	}

}
