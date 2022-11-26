<?php
/* @var $this BayarController */
/* @var $model Bayar */

$this->breadcrumbs=array(
	'Bayars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Bayar', 'url'=>array('index')),
	array('label'=>'Manage Bayar', 'url'=>array('admin')),
);
?>

<h1>Create Bayar</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>