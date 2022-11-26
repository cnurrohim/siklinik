<?php

class myInitController extends Controller
{
    public function actionRun(){
        $auth = Yii::app()->authManager;
        $auth->createOperation('createUsers','create a user');
        $bizRule='return Yii::app()->user->id===$params("post"->authID);';
        $task=$auth->createTask("updateOwnPasswords","update a passowrd author himself",$bizRule);
        $role=$auth->createRole('superadmin');
        $role->addChild('createUsers');
        $auth->assign('superadmin','6');
        echo 'done';
    }

    public function actionCheckAccess(){
        if(Yii::app()->user->checkAccess('createUsers')){
            echo "authorixed";
        }else{
            echo "nope";
        }
    }
}
