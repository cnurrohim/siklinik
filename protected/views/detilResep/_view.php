<?php
/* @var $this DetilResepController */
/* @var $data DetilResep */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obat_id')); ?>:</b>
	<?php echo CHtml::encode($data->obat_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resep_id')); ?>:</b>
	<?php echo CHtml::encode($data->resep_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga')); ?>:</b>
	<?php echo CHtml::encode($data->harga); ?>
	<br />


</div>