<?php
/* @var $this RekamMedikController */
/* @var $model RekamMedik */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keluhan'); ?>
		<?php echo $form->textField($model,'keluhan',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'diagnosis'); ?>
		<?php echo $form->textField($model,'diagnosis',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dokter_id'); ?>
		<?php echo $form->textField($model,'dokter_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pasien_id'); ?>
		<?php echo $form->textField($model,'pasien_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_periksa'); ?>
		<?php echo $form->textField($model,'tanggal_periksa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'terapi'); ?>
		<?php echo $form->textField($model,'terapi',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->