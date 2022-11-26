<?php
/* @var $this AuthitemController */
/* @var $model Authitem */

$this->breadcrumbs=array(
	'Authitems'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Auth item', 'url'=>array('index')),
	array('label'=>'Create Auth item', 'url'=>array('create')),
	array('label'=>'Update Auth item', 'url'=>array('update', 'id'=>$model->name)),
	array('label'=>'Delete Auth item', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->name),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Auth item', 'url'=>array('admin')),
);
?>

<h1>View Authitem #<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'type',
		'description',
		'bizrule',
		'data',
	),
)); ?>
