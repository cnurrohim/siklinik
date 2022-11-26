<?php

class DashboardController extends Controller
{
    public $pageTitle = 'This is the page title';

    public function actionHome(){
        
        $this->layout = 'basic';
        $emails = ['test@gmail.com','johndoe@gmail.com'];
        $this->render('view',['emails'=>$emails]);
        
    }

    public function message( $msg ){
        return $msg;
    }

    public function actionEvents()
    {
        $events = Event::model()->findAll();
        $event = Event::model()->findByPk(1);
        
        $this->render("events",['events'=>$events,'model'=>$event]);

        
    }
}