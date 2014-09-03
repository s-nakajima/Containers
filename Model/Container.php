<?php
/**
 * Container Model
 *
 * @property Box $Box
 * @property Page $Page
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('ContainersAppModel', 'Containers.Model');

/**
 * Summary for Container Model
 */
class Container extends ContainersAppModel {

/**
 * constant value
 */
	const TYPE_HEADER = '1';
	const TYPE_MAJOR = '2';
	const TYPE_MAIN = '3';
	const TYPE_MINOR = '4';
	const TYPE_FOOTER = '5';

/**
 * Default behaviors
 *
 * @var array
 */
	public $actsAs = array('Containable');

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Box' => array(
			'className' => 'Boxes.Box',
			'foreignKey' => 'container_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Page' => array(
			'className' => 'Page',
			'joinTable' => 'containers_pages',
			'foreignKey' => 'container_id',
			'associationForeignKey' => 'page_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

/**
 * Get container with frame
 *
 * @param string $id Container ID
 * @return array
 */
	public function getContainerWithFrame($id) {
		$query = array(
			'conditions' => array(
				'Container.id' => $id
			),
			'contain' => array(
				'Box' => $this->Box->getContainableQueryAssociatedPage(),
				'Page' => array(
					'conditions' => array(
						// It must check settingmode and page_id
						'ContainersPage.is_visible' => true
					)
				)
			)
		);

		return $this->find('first', $query);
	}

}
