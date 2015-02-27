<?php

class BikeCustomerController extends Controller
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
				'actions'=>array('index','view','admin', 'error', 'deallocate', 'newProduct', 'newService', 'createInvoice'),
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
			array('deny',  // deny all users
                                'actions'=>array('delete','update'),
				'users'=>Users::usersByType(4)
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
                $bikeCustomerId=$id;
		$this->render('view',array(
			'model'=>$this->loadModel($id),
                        'productCustomer'=>ProductInvoice::checkOpenAccount($bikeCustomerId),
                        'serviceCustomer'=>ServiceInvoice::checkOpenAccount($bikeCustomerId),
//                        'serviceCustomer'=>  BikeCustomer::bikeByCustomer($id)
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new BikeCustomer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BikeCustomer']))
		{
			$model->attributes=array_map('strtoupper',$_POST['BikeCustomer']);
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionNewProduct($id)
	{
		$model=$this->loadModel($id);
                
		if(isset($_POST['BikeCustomer']))
		{
                        $form=$_POST['BikeCustomer'];
                        $bikeCustId=$form ["id"];
                        $productId=$form ["id_product"];
                        $quantity=$form ["quantity"];
                        
                        $productByCustomer= ProductInvoice::checkExist($productId, $bikeCustId);
                        if($productByCustomer==NULL){
                            $productByCustomer= new ProductInvoice();
                            $productByCustomer->id_bike_customer=$bikeCustId;
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
	public function actionNewService($id)
	{
		$model=$this->loadModel($id);
                
		if(isset($_POST['BikeCustomer']))
		{
                        $form=$_POST['BikeCustomer'];
                        $bikeCustId=$form ["id"];
                        $serviceId=$form ["id_service"];
                        $quantity=$form ["quantity"];
                        
                        $serviceByCustomer= ServiceInvoice::checkExist($serviceId, $bikeCustId);
                        if($serviceByCustomer==NULL){
                            $serviceByCustomer= new ServiceInvoice();
                            $serviceByCustomer->id_bike_customer=$bikeCustId;
                            $serviceByCustomer->id_service=$serviceId;
                            $serviceByCustomer->start_date=date("Y-m-d");
                            $serviceByCustomer->quantity=$quantity;
                        }else{
                            $serviceByCustomer->quantity=$serviceByCustomer->quantity + $quantity;
                        }
			$serviceByCustomer->save(FALSE);
                        $this->redirect(array('view','id'=>$model->id));
		}
		$this->render('newService',array(
			'model'=>$model,
		));
	}
	public function actionCreateInvoice($id)
	{
		$model=$this->loadModel($id);
                $bikeCustId=$model->id;
                $lastInvoice= count( Invoice::model()->findAll() );
                $newInvoice=new Invoice();
                $newInvoice->id_bike_customer=$bikeCustId;
                $newInvoice->invoice_number=$lastInvoice + 1;
                $newInvoice->now_date=date("Y-m-d");
                if($newInvoice->save(FALSE))
                {
                    $serviceByCustomer= ServiceInvoice::checkOpenAccount($bikeCustId);
                    if($serviceByCustomer!=NULL){
                        foreach ($serviceByCustomer as $key => $service) 
                        {
                            $service->end_date=date("Y-m-d");
                            $service->id_invoice=$newInvoice->id;
                            $service->save(FALSE);
                        }
                    }
                    $productByCustomer= ProductInvoice::checkOpenAccount($bikeCustId);
                    if($productByCustomer!=NULL){
                        foreach ($productByCustomer as $key => $product) 
                        {
                            $product->end_date=date("Y-m-d");
                            $product->id_invoice=$newInvoice->id;
                            $product->save(FALSE);
                        }
                    }
                    $this->redirect(array('index'));
                }else
                {
//                    $this->redirect(array('view','id'=>$model->id));
                }
                
                
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

		if(isset($_POST['BikeCustomer']))
		{
			$model->attributes=array_map('strtoupper',$_POST['BikeCustomer']);
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
//		$dataProvider=new CActiveDataProvider('BikeCustomer');
                $dataProvider=BikeCustomer::openAccounts();
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BikeCustomer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BikeCustomer']))
			$model->attributes=$_GET['BikeCustomer'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BikeCustomer the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BikeCustomer::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BikeCustomer $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='bike-customer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionDeallocate()
	{
            $model=BikeCustomer::checkRelation($_GET["idBikeCustomer"]);
            if($model!=NULL)
            {
                $model->end_date=date("Y-m-d");
                if($model->save())
                    echo"Desasigno!";
            }
	}
}
