<?php

class AuthitemchildController extends Controller
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
	public function actionView($parent,$child)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($parent,$child),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Authitemchild;
		$authItemModel = CHtml::listData(Authitem::model()->findAll(),'name','name');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Authitemchild']))
		{
			$model->attributes=$_POST['Authitemchild'];
			if($model->save()){
				$this->redirect(array('view','parent'=>$model->parent,'child'=>$model->child));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'authItemModel'=>$authItemModel,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($parent,$child)
	{
		$model=$this->loadModel($parent,$child);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Authitemchild']))
		{
			$model->attributes=$_POST['Authitemchild'];
			if($model->save())
				$this->redirect(array('view','parent'=>$model->parent,'child'=>$model->child));
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
	public function actionDelete($parent,$child)
	{
		$this->loadModel($parent,$child)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Authitemchild');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Authitemchild('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Authitemchild']))
			$model->attributes=$_GET['Authitemchild'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Authitemchild the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($parent,$child)
	{

		$model=Authitemchild::model()->findByPk(array('parent'=>$parent, 'child'=>$child));
		if($model==null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Authitemchild $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='authitemchild-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
