<?php
/* @var $this DetilResepController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Detil Reseps',
);

$this->menu=array(
	array('label'=>'Create DetilResep', 'url'=>array('create')),
	array('label'=>'Manage DetilResep', 'url'=>array('admin')),
);
?>

<h1>Detil Reseps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
