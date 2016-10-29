<?php
/**
 * ContainersPageFixture
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

/**
 * Summary for ContainersPageFixture
 */
class ContainersPageFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
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
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'page_id' => '1',
			'container_id' => '1',
			'is_published' => true,
			'is_configured' => true,
			'created_user' => null,
			'created' => '2014-05-12 05:04:42',
			'modified_user' => null,
			'modified' => '2014-05-12 05:04:42'
		),
		array(
			'id' => '2',
			'page_id' => '1',
			'container_id' => '2',
			'is_published' => true,
			'is_configured' => true,
			'created_user' => null,
			'created' => '2014-05-12 05:04:42',
			'modified_user' => null,
			'modified' => '2014-05-12 05:04:42'
		),
		array(
			'id' => '3',
			'page_id' => '1',
			'container_id' => '3',
			'is_published' => true,
			'is_configured' => true,
			'created_user' => null,
			'created' => '2014-05-12 05:04:42',
			'modified_user' => null,
			'modified' => '2014-05-12 05:04:42'
		),
		array(
			'id' => '4',
			'page_id' => '1',
			'container_id' => '4',
			'is_published' => true,
			'is_configured' => true,
			'created_user' => null,
			'created' => '2014-05-12 05:04:42',
			'modified_user' => null,
			'modified' => '2014-05-12 05:04:42'
		),
		array(
			'id' => '5',
			'page_id' => '1',
			'container_id' => '5',
			'is_published' => true,
			'is_configured' => true,
			'created_user' => null,
			'created' => '2014-05-12 05:04:42',
			'modified_user' => null,
			'modified' => '2014-05-12 05:04:42'
		),
		//page.permalink=test
		array(
			'page_id' => '2',
			'container_id' => '6',
			'is_published' => true,
			'is_configured' => true,
			'created_user' => null,
			'created' => '2014-05-12 05:04:42',
			'modified_user' => null,
			'modified' => '2014-05-12 05:04:42'
		),
		//別ルーム(room_id=4)
		array(
			'page_id' => '3',
			'container_id' => '7',
			'is_published' => true,
			'is_configured' => true,
			'created_user' => null,
			'created' => '2014-05-12 05:04:42',
			'modified_user' => null,
			'modified' => '2014-05-12 05:04:42'
		),
		//別ルーム(room_id=5)
		array(
			'page_id' => '4',
			'container_id' => '8',
			'is_published' => true,
			'is_configured' => true,
			'created_user' => null,
			'created' => '2014-05-12 05:04:42',
			'modified_user' => null,
			'modified' => '2014-05-12 05:04:42'
		),
	);

}
