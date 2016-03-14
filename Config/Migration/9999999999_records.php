<?php
/**
 * Initial data generation of Migration
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('NetCommonsMigration', 'NetCommons.Config/Migration');

/**
 * Initial data generation of Migration
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Containers\Config\Migration
 */
class Records extends NetCommonsMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'records';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(),
		'down' => array(),
	);

/**
 * Records keyed by model name.
 *
 * @var array $records
 */
	public $records = array(
		'Container' => array(
			//パブリックスペース自体
			array(
				'id' => '1',
				'type' => '1',
			),
			array(
				'id' => '2',
				'type' => '2',
			),
			array (
				'id' => '3',
				'type' => '3',
			),
			array(
				'id' => '4',
				'type' => '4',
			),
			array(
				'id' => '5',
				'type' => '5',
			),
			//パブリックスペースのホーム
			array(
				'id' => '6',
				'type' => '3',
			),
		),

		'ContainersPage' => array(
			//パブリックスペース自体
			array(
				'id' => '1',
				'page_id' => '1',
				'container_id' => '1',
				'is_published' => true,
			),
			array(
				'id' => '2',
				'page_id' => '1',
				'container_id' => '2',
				'is_published' => true,
			),
			array(
				'id' => '3',
				'page_id' => '1',
				'container_id' => '3',
				'is_published' => true,
			),
			array(
				'id' => '4',
				'page_id' => '1',
				'container_id' => '4',
				'is_published' => true,
			),
			array(
				'id' => '5',
				'page_id' => '1',
				'container_id' => '5',
				'is_published' => true,
			),
			//パブリックスペースのホーム
			array(
				'id' => '6',
				'page_id' => '2',
				'container_id' => '1',
				'is_published' => true,
			),
			array(
				'id' => '7',
				'page_id' => '2',
				'container_id' => '2',
				'is_published' => true,
			),
			array(
				'id' => '8',
				'page_id' => '2',
				'container_id' => '6',
				'is_published' => true,
			),
			array(
				'id' => '9',
				'page_id' => '2',
				'container_id' => '4',
				'is_published' => true,
			),
			array(
				'id' => '10',
				'page_id' => '2',
				'container_id' => '5',
				'is_published' => true,
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		if ($direction === 'down') {
			return true;
		}

		foreach ($this->records as $model => $records) {
			if (!$this->updateRecords($model, $records)) {
				return false;
			}
		}

		return true;
	}
}
