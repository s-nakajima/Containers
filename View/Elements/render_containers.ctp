<?php
/**
 * Render containers element.
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */
?>

<?php if (isset($containers[Container::TYPE_HEADER])): ?>
	<!-- container-header -->
	<header id="container-header">
		<?php
			echo $this->element('Boxes.render_boxes',
				array('boxes' => $boxes[$containers[Container::TYPE_HEADER]['id']]));
		?>
	</header>
<?php endif; ?>

<div class="container">

	<?php if (isset($containers[Container::TYPE_MAJOR])): ?>
		<!-- container-major -->
		<div id="container-major" class="col-sm-3">
			<?php
				echo $this->element('Boxes.render_boxes',
					array('boxes' => $boxes[$containers[Container::TYPE_MAJOR]['id']]));
			?>
		</div>
	<?php endif; ?>

	<!-- container-main -->
	<?php if (isset($containers[Container::TYPE_MAIN])): ?>
		<div id="container-main" class="col-sm-6" role="main">
			<?php
				echo $this->element('Boxes.render_boxes',
					array('boxes' => $boxes[$containers[Container::TYPE_MAIN]['id']]));
			?>
		</div>
	<?php endif; ?>

	<?php if (isset($containers[Container::TYPE_MINOR])): ?>
		<!-- container-minor  -->
		<div id="container-minor" class="col-sm-3">
			<?php
				echo $this->element('Boxes.render_boxes',
					array('boxes' => $boxes[$containers[Container::TYPE_MINOR]['id']]));
			?>
		</div>
	<?php endif; ?>

</div>

<?php if (isset($containers[Container::TYPE_FOOTER])): ?>
	<!-- area-footer  -->
	<footer id="container-footer" role="contentinfo">
		<?php
			echo $this->element('Boxes.render_boxes',
				array('boxes' => $boxes[$containers[Container::TYPE_FOOTER]['id']]));
		?>
	</footer>
<?php endif;
