<!--Generated using Gimme CRUD freeware from www.HandsOnCoding.net -->
<?php
$this->breadcrumbs=array(
	'Authassignments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Authassignments', 'url'=>array('index')),
	array('label'=>'Create Authassignment', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('authassignmentgrid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Authassignments</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'authassignmentgrid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'itemname',
        'userid',
        'bizrule',
        'data',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array
            (
                'view' => array
                (
                    'url'=>
                    'Yii::app()->createUrl("authassignment/view/", 
                                            array("itemname"=>$data->itemname, "userid"=>$data->userid
											))',
                ),
                'update' => array
                (
                    'url'=>
                    'Yii::app()->createUrl("authassignment/update/", 
                                            array("itemname"=>$data->itemname, "userid"=>$data->userid
											))',
                ),
                'delete'=> array
                (
                    'url'=>
                    'Yii::app()->createUrl("authassignment/delete/", 
                                            array("itemname"=>$data->itemname, "userid"=>$data->userid
											))',
                ),
            ),
        ),
    ),
)); ?>
