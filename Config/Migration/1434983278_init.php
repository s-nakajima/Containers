<?php
/**
 * Init migration
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

/**
 * Init migration
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Containers\Config\Migration
 */
class Init extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'init';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'containers' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'type' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'Type of the container.  1:Header, 2:Major, 3:Main, 4:Minor, 5:Footer'),
					'created_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'modified_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'containers_pages' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'page_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'container_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'is_published' => array('type' => 'boolean', 'null' => true, 'default' => null, 'comment' => '一般以下のパートが閲覧可能かどうか。ルーム配下ならルーム管理者、またはそれに準ずるユーザはこの値に関わらず閲覧できる。  e.g.) ルーム管理者、またはそれに準ずるユーザ: ルーム管理者、編集長'),
					'is_configured' => array('type' => 'boolean', 'null' => false, 'default' => false, 'comment' => '設定したかどうか'),
					'created_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'modified_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'containers', 'containers_pages'
			),
		),
	);

/**
 * Records keyed by model name.
 *
 * @var array $records
 */
	public $records = array(
		'Container' => array(
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
		),

		'ContainersPage' => array(
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

/**
 * Update model records
 *
 * @param string $model model name to update
 * @param string $records records to be stored
 * @param string $scope ?
 * @return bool Should process continue
 */
	public function updateRecords($model, $records, $scope = null) {
		$Model = $this->generateModel($model);
		foreach ($records as $record) {
			$Model->create();
			if (!$Model->save($record, false)) {
				return false;
			}
		}

		return true;
	}

}
