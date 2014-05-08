<?php
/**
 * Containers Template
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */
?>

<?php foreach ($container['Box'] as $box): ?>
	<div class="box-site box-id-<?php echo $box['id']; ?>">
		<?php echo $this->requestAction('boxes/boxes/index/' . $box['id'], array('return')); ?>
	</div>
<?php endforeach;