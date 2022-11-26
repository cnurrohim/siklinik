<?php
/* @var $this RekamMedikController */
/* @var $model RekamMedik */

$this->breadcrumbs=array(
	'Rekam Mediks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RekamMedik', 'url'=>array('index')),
	array('label'=>'Manage RekamMedik', 'url'=>array('admin')),
);
?>

<h1>Create RekamMedik</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>