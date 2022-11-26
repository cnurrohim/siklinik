<?php
/* @var $this BayarController */
/* @var $model Bayar */

$this->breadcrumbs=array(
	'Bayars'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Bayar', 'url'=>array('index')),
	array('label'=>'Create Bayar', 'url'=>array('create')),
	array('label'=>'Update Bayar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Bayar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bayar', 'url'=>array('admin')),
);
?>

<h1>View Bayar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'resep_id',
		'biaya_obat',
		'biaya_jasa',
		'bayar',
		'tanggal',
		'user_id',
	),
)); ?>
