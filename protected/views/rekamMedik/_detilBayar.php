<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bayar-grid',
    'dataProvider'=>new CArrayDataProvider($model,array(
			'sort'=>array('attributes'=>array('biaya_obat','biaya_jasa','bayar'),),
			'pagination'=>array('pageSize'=>10)
		)),
	'columns'=>array(
		'biaya_obat',
		'biaya_jasa',
		'bayar',
		'tanggal',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}{cetak}',
			'buttons'=>array(
				'delete'=> array(
                    'url'=>
                    'Yii::app()->createUrl("bayar/delete/", 
                                            array("id"=>$data->id
											))',
                ),
                'cetak'=> array(
                    'url'=>
                    'Yii::app()->createUrl("bayar/cetak/", 
                                            array("id"=>$data->id
											))',
                ),
			),
		),
	),
)); ?>
