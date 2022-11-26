<?php
/* @var $this DokterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dokters',
);

$this->menu=array(
	array('label'=>'Create Dokter', 'url'=>array('create')),
	array('label'=>'Manage Dokter', 'url'=>array('admin')),
);
?>

<h1>Dokters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
