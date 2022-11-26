<?php
/* @var $this DetilResepController */
/* @var $model DetilResep */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action' => array('detilresep/create'),
	'id'=>'detil-resep-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="column">
		<?php echo $form->labelEx($model,'obat_id'); ?>
		<?php echo $form->hiddenField($model,'obat_id'); ?>
		<?php 
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'autocomplete',
				'source'=>$this->createUrl('obat/Autocomplete'),
				'options'=>array(
					'minLength'=>'2',
					'select'=>"js:function(event, ui) {
						console.log(ui.item.id);
						$('#DetilResep_obat_id').val(ui.item.id);
						$('#DetilResep_harga').val(ui.item.harga);
					}"
				),
				'htmlOptions'=>array(
					'style'=>'width: 200px;',
					'placeholder' => 'OBAT'
				),
			));
		?>
		<?php echo $form->error($model,'obat_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'resep_id',array('value'=>$modelResep->id,'readonly'=>'true')); ?>
		<?php echo $form->error($model,'resep_id'); ?>
	</div>

	<div class="column">
		<?php echo $form->labelEx($model,'harga'); ?>
		<?php echo $form->textField($model,'harga',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'harga'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jumlah'); ?>
		<?php echo $form->textField($model,'jumlah'); ?>
		<?php echo $form->error($model,'jumlah'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->