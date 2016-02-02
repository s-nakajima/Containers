<?php
/**
 * ContainersPage::saveContainersPage()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('NetCommonsSaveTest', 'NetCommons.TestSuite');
App::uses('ContainersPageFixture', 'Containers.Test/Fixture');

/**
 * ContainersPage::saveContainersPage()のテスト
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Containers\Test\Case\Model\ContainersPage
 */
class ContainersPageSaveContainersPageTest extends NetCommonsSaveTest {

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
 * Plugin name
 *
 * @var string
 */
	public $plugin = 'containers';

/**
 * Model name
 *
 * @var string
 */
	protected $_modelName = 'ContainersPage';

/**
 * Method name
 *
 * @var string
 */
	protected $_methodName = 'saveContainersPage';

/**
 * Save用DataProvider
 *
 * ### 戻り値
 *  - data 登録データ
 *
 * @return array テストデータ
 */
	public function dataProviderSave() {
		$records = (new ContainersPageFixture())->records;

		$data = array();
		$data['ContainersPage']['1'] = $records[0];
		$data['ContainersPage']['2'] = $records[1];
		$data['ContainersPage']['3'] = $records[2];
		$data['ContainersPage']['4'] = $records[3];
		$data['ContainersPage']['5'] = $records[4];
		$data = Hash::insert($data, 'ContainersPage.{n}.is_published', false);

		$results = array();
		$results[0] = array($data);

		return $results;
	}
/**
 * Saveのテスト
 *
 * @param array $data 登録データ
 * @dataProvider dataProviderSave
 * @return void
 */
	public function testSave($data) {
		$model = $this->_modelName;
		$method = $this->_methodName;

		//期待値の取得
		$ids = Hash::extract($data, 'ContainersPage.{n}.id');
		$before = $this->$model->find('all', array(
			'recursive' => -1,
			'conditions' => array('id' => $ids),
		));
		$before = Hash::remove($before, '{n}.ContainersPage.modified');
		$before = Hash::remove($before, '{n}.ContainersPage.modified_user');
		$before = Hash::insert($before, '{n}.ContainersPage.is_published', false);

		//テスト実行
		$result = $this->$model->$method($data);
		$this->assertTrue($result);

		//テスト結果データ生成
		$actual = $this->$model->find('all', array(
			'recursive' => -1,
			'conditions' => array('id' => $ids),
		));
		$actual = Hash::remove($actual, '{n}.ContainersPage.modified');
		$actual = Hash::remove($actual, '{n}.ContainersPage.modified_user');

		//チェック
		$this->assertEquals($actual, $before);
	}
/**
 * SaveのExceptionError用DataProvider
 *
 * ### 戻り値
 *  - data 登録データ
 *  - mockModel Mockのモデル
 *  - mockMethod Mockのメソッド
 *
 * @return array テストデータ
 */
	public function dataProviderSaveOnExceptionError() {
		$records = (new ContainersPageFixture())->records;

		$data = array();
		$data['ContainersPage']['1'] = $records[0];
		$data['ContainersPage']['2'] = $records[1];
		$data['ContainersPage']['3'] = $records[2];
		$data['ContainersPage']['4'] = $records[3];
		$data['ContainersPage']['5'] = $records[4];

		return array(
			array($data, 'Containers.ContainersPage', 'saveMany'),
		);
	}

/**
 * SaveのValidationError用DataProvider
 *
 * ### 戻り値
 *  - data 登録データ
 *  - mockModel Mockのモデル
 *  - mockMethod Mockのメソッド
 *
 * @return array テストデータ
 */
	public function dataProviderSaveOnValidationError() {
		$records = (new ContainersPageFixture())->records;

		$data = array();
		$data['ContainersPage']['1'] = $records[0];
		$data['ContainersPage']['2'] = $records[1];
		$data['ContainersPage']['3'] = $records[2];
		$data['ContainersPage']['4'] = $records[3];
		$data['ContainersPage']['5'] = $records[4];

		return array(
			array($data, 'Containers.ContainersPage', 'validateMany'),
		);
	}

}
