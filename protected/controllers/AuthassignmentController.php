<?php

class AuthassignmentController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete'),
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
	public function actionView($itemname, $userid)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($itemname, $userid),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Authassignment;
		$authItemModel = CHtml::listData(Authitem::model()->findAll(), 'name', 'name');
		$userModel = CHtml::listData(Users::model()->findAll(), 'id', 'username');

		if(isset($_POST['ajax']) && $_POST['ajax']==='client-account-create-form')
	    {
	        echo CActiveForm::validate($model);
	        Yii::app()->end();
	    }

		if(isset($_POST['Authassignment']))
		{
			$model->attributes=$_POST['Authassignment'];
			if($model->validate())
	        {
				$this->saveModel($model);
				$this->redirect(array('view','itemname'=>$model->itemname, 'userid'=>$model->userid));
	        }
		}

		$this->render('create',array(
			'model'=>$model,
			'userModel'=>$userModel,
			'authItemModel'=>$authItemModel
		));
	}

	public function saveModel($model)
	{
		try
		{
			$model->save();
		}
		catch(Exception $e)
		{
			$this->showError($e);
		}		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($itemname, $userid)
	{
		
		$model=$this->loadModel($itemname, $userid);

		if(isset($_POST['Authassignment']))
		{
		
			$model->attributes=$_POST['Authassignment'];
			$this->saveModel($model);
			$this->redirect(array('view','itemname'=>$model->itemname,'userid'=>$model->userid));
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
	public function actionDelete($itemname, $userid)
	{
		if(Yii::app()->request->isPostRequest)
		{
			try
			{
				// we only allow deletion via POST request
				$this->loadModel($itemname, $userid)->delete();
			}
			catch(Exception $e) 
			{
				$this->showError($e);
			}

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria=new CDbCriteria;
		$criteria->with=array('users');
		$dataProvider=new CActiveDataProvider('Authassignment',array('criteria'=>$criteria));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Authassignment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Authassignment']))
		$model->attributes=$_GET['Authassignment'];
		
		$this->render('admin',array(
			'model'=>$model,
		));
		
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Authassignment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($itemname, $userid)
	{
		$model=Authassignment::model()->findByPk(array('itemname'=>$itemname, 'userid'=>$userid));
		if($model==null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Authassignment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='authassignment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
