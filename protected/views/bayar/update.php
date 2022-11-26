<?php
/* @var $this BayarController */
/* @var $model Bayar */

$this->breadcrumbs=array(
	'Bayars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bayar', 'url'=>array('index')),
	array('label'=>'Create Bayar', 'url'=>array('create')),
	array('label'=>'View Bayar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Bayar', 'url'=>array('admin')),
);
?>

<h1>Update Bayar <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>