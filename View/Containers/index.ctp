<?php
/**
 * Containers Template
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

echo $this->element('Containers.render_containers',
	array(
		'containers' => $containers,
		'boxes' => $boxes
	));
