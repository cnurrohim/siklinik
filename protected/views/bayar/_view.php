<?php
/* @var $this BayarController */
/* @var $data Bayar */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resep_id')); ?>:</b>
	<?php echo CHtml::encode($data->resep_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('biaya_obat')); ?>:</b>
	<?php echo CHtml::encode($data->biaya_obat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('biaya_jasa')); ?>:</b>
	<?php echo CHtml::encode($data->biaya_jasa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bayar')); ?>:</b>
	<?php echo CHtml::encode($data->bayar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user->username); ?>
	<br />


</div>