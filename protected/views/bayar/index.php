<?php
/* @var $this BayarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bayars',
);

$this->menu=array(
	array('label'=>'Create Bayar', 'url'=>array('create')),
	array('label'=>'Manage Bayar', 'url'=>array('admin')),
);
?>

<h1>Bayars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
