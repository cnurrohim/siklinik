<?php
/* @var $this ResepController */
/* @var $model Resep */

$this->breadcrumbs=array(
	'Reseps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Resep', 'url'=>array('index')),
	array('label'=>'Manage Resep', 'url'=>array('admin')),
);
?>

<h1>Create Resep</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>