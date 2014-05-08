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
 * @throws NotFoundException
 * @param string $id containerId
 * @return void
 */
	public function index($id = null) {
		$container = $this->Container->findById($id);
		if (empty($container)) {
			throw new NotFoundException();
		}

		$this->set('container', $container);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Container->exists($id)) {
			throw new NotFoundException(__('Invalid container'));
		}
		$options = array('conditions' => array('Container.' . $this->Container->primaryKey => $id));
		$this->set('container', $this->Container->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Container->create();
			if ($this->Container->save($this->request->data)) {
				return $this->flash(__('The container has been saved.'), array('action' => 'index'));
			}
		}
		$pages = $this->Container->Page->find('list');
		$this->set(compact('pages'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Container->exists($id)) {
			throw new NotFoundException(__('Invalid container'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Container->save($this->request->data)) {
				return $this->flash(__('The container has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Container.' . $this->Container->primaryKey => $id));
			$this->request->data = $this->Container->find('first', $options);
		}
		$pages = $this->Container->Page->find('list');
		$this->set(compact('pages'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Container->id = $id;
		if (!$this->Container->exists()) {
			throw new NotFoundException(__('Invalid container'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Container->delete()) {
			return $this->flash(__('The container has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The container could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
