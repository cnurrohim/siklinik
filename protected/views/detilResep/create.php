<?php
/* @var $this DetilResepController */
/* @var $model DetilResep */

$this->breadcrumbs=array(
	'Detil Reseps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DetilResep', 'url'=>array('index')),
	array('label'=>'Manage DetilResep', 'url'=>array('admin')),
);
?>

<h1>Create DetilResep</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>