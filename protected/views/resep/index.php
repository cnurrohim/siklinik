<?php
/* @var $this ResepController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reseps',
);

$this->menu=array(
	array('label'=>'Create Resep', 'url'=>array('create')),
	array('label'=>'Manage Resep', 'url'=>array('admin')),
);
?>

<h1>Reseps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
