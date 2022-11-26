<?php
/* @var $this RekamMedikController */
/* @var $model RekamMedik */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rekam-medik-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'pasien_id'); ?>
		<?php echo $form->hiddenField($model,'pasien_id'); ?>
		<?php 
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'pasienAutocomplete',
				'source'=>$this->createUrl('pasien/Autocomplete'),
				'options'=>array(
					'minLength'=>'2',
					'select'=>"js:function(event, ui) {
						console.log(ui.item.id);
						$('#RekamMedik_pasien_id').val(ui.item.id);
					}"
				),
				'htmlOptions'=>array(
					'style'=>'width: 200px;',
					'placeholder' => 'Nama Pasien'
				),
			));
		
		?>
		<?php echo $form->error($model,'pasien_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keluhan'); ?>
		<?php echo $form->textField($model,'keluhan',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'keluhan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'diagnosis'); ?>
		<?php echo $form->textField($model,'diagnosis',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'diagnosis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dokter_id'); ?>
		<?php echo $form->hiddenField($model,'dokter_id'); ?>
		<?php 
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'dokterAutocomplete',
				'source'=>$this->createUrl('dokter/Autocomplete'),
				'options'=>array(
					'minLength'=>'2',
					'select'=>"js:function(event, ui) {
						console.log(ui.item.id);
						$('#RekamMedik_dokter_id').val(ui.item.id);
					}"
				),
				'htmlOptions'=>array(
					'style'=>'width: 200px;',
					'placeholder' => 'Dokter'
				),
			));
		
		?>
		<?php echo $form->error($model,'dokter_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_periksa'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$model,
				'name'=>'tanggal_periksa',
				'attribute'=>'tanggal_periksa',
				'options'=>array(
					'showAnim'=>'fold',
					'dateFormat'=>'yy-mm-dd',
				),
				'htmlOptions'=>array(
					'style'=>'height:20px;'
				),
			)); ?>
		<?php echo $form->error($model,'tanggal_periksa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'terapi'); ?>
		<?php echo $form->textField($model,'terapi',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'terapi'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->