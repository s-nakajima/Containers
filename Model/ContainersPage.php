<?php
/**
 * ContainersPage Model
 *
 * @property Page $Page
 * @property Container $Container
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('PagesAppModel', 'Pages.Model');

/**
 * Summary for ContainersPage Model
 */
class ContainersPage extends PagesAppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Page' => array(
			'className' => 'Pages.Page',
			'foreignKey' => 'page_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Container' => array(
			'className' => 'Containers.Container',
			'foreignKey' => 'container_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * Save page each association model
 *
 * @param array $data request data
 * @throws InternalErrorException
 * @return mixed On success Model::$data if its not empty or true, false on failure
 */
	public function saveContainersPage($data) {
		//トランザクションBegin
		$this->begin();

		if (! $this->validateMany($data['ContainersPage'])) {
			return false;
		}
		try {
			if (! $this->saveMany($data['ContainersPage'], ['validate' => false])) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}
			$this->commit();

		} catch (Exception $ex) {
			$this->rollback($ex);
		}

		return true;
	}
}
