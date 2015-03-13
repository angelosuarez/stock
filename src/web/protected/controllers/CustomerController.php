<?php

class CustomerController extends Controller
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
//			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','admin', 'error','AddBike','newProduct'),
				'users'=>array('*'),
			),
                        array('allow', // allow admin user to perform 'update' and 'delete' actions
				'actions'=>array('delete','update'),
				'users'=>Users::usersByType(1),
                                
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>Users::usersByType(2),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'users'=>Users::usersByType(3),
			),
			
			array('deny',  // deny all users
                                'actions'=>array('delete','update'),
				'users'=>Users::usersByType(3)
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),'productByCustomer'=>  Customer::productByCustomer($id), "typeUser"=>Users::getData(Yii::app()->user->id)->id_type_of_user,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Customer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Customer']))
		{
                        $exist=Customer::getCustomerExist($_POST['Customer']['id_doc']);
                        if($exist==NULL)
                        {
                                $model->attributes=array_map('strtoupper',$_POST['Customer']);
                                if($model->save())
                                        $this->redirect(array('view','id'=>$model->id));
                        }else{
                            $this->redirect("error");
                        }
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}
        
        public function actionError()
        {
            $this->render('error', array('link'=>'Volver a Crear Clientes','action'=>'create', 'message'=>"La cédula que inenta registrar pertenece a otro cliente"));
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

		if(isset($_POST['Customer']))
		{
			$model->attributes=array_map('strtoupper',$_POST['Customer']);
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
        
        public function actionNewProduct($id)
	{
		$model=$this->loadModel($id);
                
		if(isset($_POST['Customer']))
		{
                        $form=$_POST['Customer'];
                        $CustId=$form ["id"];
                        $productId=$form ["id_product"];
                        $quantity=$form ["quantity"];
                        
                        $productByCustomer= ProductInvoice::checkExist($productId, $CustId);
                        if($productByCustomer==NULL){
                            $productByCustomer= new ProductInvoice();
                            $productByCustomer->id_customer=$CustId;
                            $productByCustomer->id_product=$productId;
                            $productByCustomer->start_date=date("Y-m-d");
                            $productByCustomer->quantity=$quantity;
                        }else{
                            $productByCustomer->quantity=$productByCustomer->quantity + $quantity;
                        }
                        $products=Product::getData($productId);
                        $products->quantity=abs($products->quantity - $quantity);

			$productByCustomer->save(FALSE);
                        $products->save();
                        $this->redirect(array('view','id'=>$model->id));
		}
		$this->render('newProduct',array(
			'model'=>$model,
		));
	}
        
	public function actionAddBike($id)
	{
		$model=$this->loadModel($id);
                
		if(isset($_POST['Customer']))
		{
                        $form=$_POST['Customer'];
                        $bikeDescription=  BikeDescription::checkExistByPlate($form["plate"]);
                        if($bikeDescription==NULL){
                            $bikeDescription= new BikeDescription();
                            $this->registerBikeDescription($bikeDescription, $form);
                        }else{
                            $this->registerBikeDescription($bikeDescription, $form);
                            $bikeCustomer=  BikeCustomer::checkRelation($bikeDescription->id);
                            if($bikeCustomer!=NULL){
                                $bikeCustomer->end_date=date("Y-m-d");
                            }
                        }
                        $newBikeCustomer= new BikeCustomer();
                        $newBikeCustomer->id_customer=$model->id;
                        $newBikeCustomer->id_bike_description=$bikeDescription->id;
                        $newBikeCustomer->start_date=date("Y-m-d");

			if($newBikeCustomer->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('addBike',array(
			'model'=>$model,
		));
	}
        public function registerBikeDescription($bikeDescription, $form)
        {
            $bikeDescription->id_brand_bike=strtoupper($form["id_brand_bike"]);
            $bikeDescription->id_model_bike=strtoupper($form["id_model_bike"]);
            $bikeDescription->id_colour=strtoupper($form["id_colour"]);
            $bikeDescription->plate=strtoupper($form["plate"]);
            $bikeDescription->year_bike=$form["year_bike"];
            $bikeDescription->save();
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
//		$dataProvider=new CActiveDataProvider('Customer');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
                $dataProvider=Customer::openAccounts();
                $this->render('index',array(
                    'dataProvider'=>$dataProvider,
                ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Customer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Customer']))
			$model->attributes=$_GET['Customer'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Customer the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Customer::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Customer $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
