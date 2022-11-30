<?php
/* @var $this AuthassignmentController */
/* @var $data Authassignment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('itemname')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->itemname), array('view', "itemname"=>$data->itemname, "userid"=>$data->userid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
	<?php echo CHtml::encode($data->users->username); ?>
	<br />



</div>