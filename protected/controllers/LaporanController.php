<?php

class LaporanController extends Controller
{
	public function actionIndex()
	{
		//$pasien = Pasien::model()->findAll();
		$dbCommand = Yii::app()->db->createCommand("
               SELECT COUNT(*) as jml,jenis_kelamin
			   FROM `pasien`
			   GROUP BY `jenis_kelamin`
            ");
		$pasien = $dbCommand->queryAll();

		$dbCommand = Yii::app()->db->createCommand("
               SELECT COUNT(*) as jml,k.nama
			   FROM pasien p
			   JOIN kota k on k.id = p.kota_id
			   GROUP BY p.kota_id
            ");
		$pasienKota = $dbCommand->queryAll();

		$dbCommand = Yii::app()->db->createCommand("
               SELECT SUM(d.jumlah) as jml,o.nama FROM detil_resep d JOIN obat o on o.id = d.obat_id GROUP BY d.obat_id; 
            ");
		$obat = $dbCommand->queryAll();

		$this->render('index',
			array('pasien'=>$pasien, 'pasienKota'=>$pasienKota,'obat'=>$obat),
		);
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}