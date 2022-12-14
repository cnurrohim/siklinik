<?php
/* @var $this AuthitemchildController */
/* @var $model Authitemchild */

$this->breadcrumbs=array(
	'Authitemchildren'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Authitemchild', 'url'=>array('index')),
	array('label'=>'Create Authitemchild', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#authitemchild-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Authitemchildren</h1>

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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'authitemchild-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'parent',
		'child',
		array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array
            (
                'view' => array
                (
                    'url'=>
                    'Yii::app()->createUrl("authitemchild/view/", 
                                            array("parent"=>$data->parent, "child"=>$data->child
											))',
                ),
                'update' => array
                (
                    'url'=>
                    'Yii::app()->createUrl("authitemchild/update/", 
                                            array("parent"=>$data->parent, "child"=>$data->child
											))',
                ),
                'delete'=> array
                (
                    'url'=>
                    'Yii::app()->createUrl("authitemchild/delete/", 
                                            array("parent"=>$data->parent, "child"=>$data->child
											))',
                ),
            ),
        ),
	),
)); ?>
