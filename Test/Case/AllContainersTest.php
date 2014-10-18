<?php
/**
 * Containers All Test Suite
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

/**
 * Containers All Test Suite
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @package NetCommons\Blocks\Test\Case
 * @codeCoverageIgnore
 */
class AllContainersTest extends CakeTestSuite {

/**
 * Suite defines all the tests for Containers
 *
 * @return CakeTestSuite
 */
	public static function suite() {
		$suite = new CakeTestSuite();
		$suite->addTestDirectoryRecursive(dirname(__FILE__));
		return $suite;
	}
}
