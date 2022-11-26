<?php
/* @var $this DetilResepController */
/* @var $model DetilResep */

$this->breadcrumbs=array(
	'Detil Reseps'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DetilResep', 'url'=>array('index')),
	array('label'=>'Create DetilResep', 'url'=>array('create')),
	array('label'=>'View DetilResep', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DetilResep', 'url'=>array('admin')),
);
?>

<h1>Update DetilResep <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>