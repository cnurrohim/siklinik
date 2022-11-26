<?php
/* @var $this DetilResepController */
/* @var $model DetilResep */

$this->breadcrumbs=array(
	'Detil Reseps'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DetilResep', 'url'=>array('index')),
	array('label'=>'Create DetilResep', 'url'=>array('create')),
	array('label'=>'Update DetilResep', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DetilResep', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DetilResep', 'url'=>array('admin')),
);
?>

<h1>View DetilResep #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'obat_id',
		'resep_id',
		'jumlah',
		'harga',
	),
)); ?>
