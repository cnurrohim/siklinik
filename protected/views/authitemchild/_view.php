<?php
/* @var $this AuthitemchildController */
/* @var $data Authitemchild */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->parent), array('view', 'parent'=>$data->parent, 'child'=>$data->child)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('child')); ?>:</b>
	<?php echo CHtml::encode($data->child); ?>
	<br />


</div>