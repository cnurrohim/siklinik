<?php
/* @var $this RekamMedikController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rekam Mediks',
);

$this->menu=array(
	array('label'=>'Create RekamMedik', 'url'=>array('create')),
	array('label'=>'Manage RekamMedik', 'url'=>array('admin')),
);
?>

<h1>Rekam Mediks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
