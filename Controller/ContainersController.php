<?php
/**
 * Containers Controller
 *
 * @property Container $Container
 * 
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('ContainersAppController', 'Containers.Controller');

class ContainersController extends ContainersAppController {

/**
 * index method
 *
 * @param string $id containerId
 * @throws NotFoundException
 * @return void
 */
	public function index($id = null) {
		$container = $this->Container->findById($id);
		if (empty($container)) {
			throw new NotFoundException();
		}

		$this->set('container', $container);
	}

}
