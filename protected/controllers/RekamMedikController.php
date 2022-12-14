<?php

class RekamMedikController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','admin'),
				'roles'=>array('user'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('update','delete'),
				'roles'=>array('superadmin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$detilResepModel = new DetilResep;
		$resepModel = Resep::model()->findByAttributes(array('rekammedik_id'=>$id));
		
		$daftarObat = DetilResep::model()->with('obat')->findAllByAttributes(array('resep_id'=>$resepModel->id));
		$isLunas = Bayar::model()->findAllByAttributes(array('resep_id'=>$resepModel->id));
		$bayarModel = new Bayar;

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'modelResep'=>$resepModel,
			'modelDetilResep'=>$detilResepModel,
			'daftarObat'=>$daftarObat,
			'bayarModel'=>$bayarModel,
			'isLunas'=>$isLunas,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new RekamMedik;
		$resepModel = new Resep;

		if(isset($_POST['RekamMedik']))
		{
			$model->attributes=$_POST['RekamMedik'];
			$model->user_id = Yii::app()->user->id;
			if($model->save()){
				$resepModel->rekammedik_id = $model->id;
				$resepModel->tanggal = date('Y-m-d');
				$resepModel->save();

				$this->redirect(array('rekammedik/view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RekamMedik']))
		{
			$model->attributes=$_POST['RekamMedik'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria=new CDbCriteria;
		$criteria->with=array('dokter','pasien','user');
		$dataProvider = new CActiveDataProvider('RekamMedik',array('criteria'=>$criteria));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model= new RekamMedik('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RekamMedik']))
			$model->attributes=$_GET['RekamMedik'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RekamMedik the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RekamMedik::model()->with(array('dokter','pasien','user'))->findByPk($id);

		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RekamMedik $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='rekam-medik-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
