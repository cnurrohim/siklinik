<?php
/* @var $this RekamMedikController */
/* @var $model RekamMedik */

$this->breadcrumbs=array(
	'Rekam Mediks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RekamMedik', 'url'=>array('index')),
	array('label'=>'Create RekamMedik', 'url'=>array('create')),
	array('label'=>'View RekamMedik', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RekamMedik', 'url'=>array('admin')),
);
?>

<h1>Update RekamMedik <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>