<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        if(!Yii::app()->user->isGuest)
        {
            if(Customer::openAccounts()!=NULL)
                 $this->redirect('/Customer/index/');
            else
                $this->render('index');
           
        }
        else
        {
            $model = new LoginForm;
            // if it is ajax validation request
            if(isset($_POST['ajax']) && $_POST['ajax'] === 'login-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
            // collect user input data
            if(isset($_POST['LoginForm']))
            {
                $model->attributes = $_POST['LoginForm'];
                // validate user input and redirect to the previous page if valid
                if($model->validate() && $model->login())
                    $this->redirect(Yii::app()->user->returnUrl);
            }
            // display the login form
            $this->render('login', array('model' => $model));
        }
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
        public static function accessControl() 
        {
            $return=array();
            if(!Yii::app()->user->isGuest)
            {
                $userType = Users::getUserType(Yii::app()->user->name);
                switch ($userType) {
                    //ADMINISTRADOR...
                    case 1:
                    array_push($return, array('label' => 'Admin. Sistema',  'url' => '/gii/',  ));
                    array_push($return, array('label' => 'Usuarios',  'url' => '/Users/admin',  ));
                        break;
                    //GERENTE...
                    case 2:
                    array_push($return, array('label' => 'Usuarios',  'url' => '/Users/admin',  ));
                        break;
                }
                /*ITEMS COMUNES PARA TODOS LOS USUARIOS*/
                
//                array_push($return, array('label' => 'Inventario', 
//                                      'url' => '#', 
//                                      'items' =>array(
//                                                    array('label' => 'Productos', 'url' => '/product/admin'), //'visible'=>$admin),
//                                                    array('label' => 'Proveedores', 'url' => '/supplier/admin'),
//                                                )
//                                ));
                array_push($return, array('label' => 'Productos',  'url' => '/product/admin',  ));
                array_push($return, array('label' => 'Proveedores',  'url' => '/supplier/admin',  ));
                
//                array_push($return, array('label' => 'Servicios', 'url' => '/service/admin'));
                array_push($return, array('label' => 'Clientes', 'url' => '/customer/admin'));
                array_push($return, array('label' => 'Cuentas', 'url' => '/Customer/index'));
                array_push($return, array('label' => 'Reporte Diario', 'url' => '/dayReport/create'));
                
//                array_push($return, array('label' => 'Servicios', 
//                                      'url' => '#', 
//                                      'items' =>array(
//                                                    array('label' => 'Productos', 'url' => '/product/admin'), //'visible'=>$admin),
//                                                    array('label' => 'Proveedores', 'url' => '/supplier/admin'),
//                                                )
//                                )); 
            }
            
            array_push($return,array('label'=>'Login','url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest ));
            array_push($return,array('label'=>'Salir ('.Yii::app()->user->name.')','url'=>array('/site/logout'),'visible'=>!Yii::app()->user->isGuest ));
            
            return $return;
        }
}