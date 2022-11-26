<?php
/* @var $this RekamMedikController */
/* @var $model RekamMedik */

$this->breadcrumbs=array(
	'Rekam Mediks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RekamMedik', 'url'=>array('index')),
	array('label'=>'Create RekamMedik', 'url'=>array('create')),
	array('label'=>'Update RekamMedik', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RekamMedik', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RekamMedik', 'url'=>array('admin')),
);
?>

<h1>View RekamMedik #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'keluhan',
		'diagnosis',
		'dokter_id',
		'pasien_id',
		'user_id',
		'tanggal_periksa',
		'terapi',
	),
)); ?>

<br/>

<h2>Resep Obat</h2>

<?php $this->renderPartial('_formResepObat', array('model'=>$modelDetilResep,'modelResep'=>$modelResep)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detil-resep-grid',
	'dataProvider'=>new CArrayDataProvider($daftarObat,array(
			'sort'=>array('attributes'=>array('obat_id','jumlah','harga'),),
			'pagination'=>array('pageSize'=>10)
		)),
	'columns'=>array(
		array(
			'name'=>'obat',
			'value'=>'$data->obat->nama',
		),
		'jumlah',
		array(
			'name'=>'harga',
			'value'=>'$data->harga',
			'footer'=>'<b>total</b>'
		),
		array(
			'name' => 'total',
			'header'    => 'Total',
            'class'     => 'TotalRow',
            'jumlah' => 'jumlah',
            'harga'  => 'harga',
			'footer' => DetilResep::model()->getTotal($daftarObat),
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}',
			'buttons'=>array(
				'delete'=> array(
                    'url'=>
                    'Yii::app()->createUrl("detilresep/delete/", 
                                            array("id"=>$data->id
											))',
                ),
			),
		),
	),
)); ?>

<?php
	if(count($isLunas) > 0){
		$this->renderPartial('_detilBayar', array('model'=>$isLunas, 'modelResep'=>$modelResep, 'totalBiayaObat'=>DetilResep::model()->getTotal($daftarObat)));	
	}
?>

<?php
	if(count($isLunas) == 0){
		$this->renderPartial('_formBayar', array('model'=>$bayarModel, 'modelResep'=>$modelResep, 'totalBiayaObat'=>DetilResep::model()->getTotal($daftarObat)));	
	}
?>