<?php
/* @var $this BayarController */
/* @var $model Bayar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bayar-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'resep_id'); ?>
		<?php echo $form->textField($model,'resep_id'); ?>
		<?php echo $form->error($model,'resep_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'biaya_obat'); ?>
		<?php echo $form->textField($model,'biaya_obat',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'biaya_obat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'biaya_jasa'); ?>
		<?php echo $form->textField($model,'biaya_jasa',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'biaya_jasa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bayar'); ?>
		<?php echo $form->textField($model,'bayar',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'bayar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal'); ?>
		<?php echo $form->textField($model,'tanggal'); ?>
		<?php echo $form->error($model,'tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->