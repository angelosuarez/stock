<?php

class ModelBikeController extends Controller
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
				'actions'=>array('index','view','getModelForBrand','new'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ModelBike;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ModelBike']))
		{
			$model->attributes=array_map('strtoupper',$_POST['ModelBike']);
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionNew()
	{
//            establezco variables
            $params=array();
            $newModelSave=NULL;
            $brandId=$_GET["Customer"]["id_brand_bike"];
            $newBrand=$_GET["Customer"]["new_brand_bike"];
            $newModel=$_GET["Customer"]["new_model_bike"];
            
            if($newBrand!="")  //revisa si newBrand esta vacio
            {
                $brandBike=  BrandBike::getDataByName(strtoupper($newBrand));//verifica existencia del
                if($brandBike==NULL)
                {
                    $brandBike= new BrandBike();
                    $brandBike->name=strtoupper($newBrand);
                    if($brandBike->save()){
                        $params["brand"]="<option value='".$brandBike->id."'>".$brandBike->name."</option>";
                        $params["brandId"]=$brandBike->id;
                    }
                }
                if($newModel!="")
                {
                    $modelBike=new ModelBike();
                    $modelBike->name=strtoupper($newModel);
                    $modelBike->id_brand_bike=$brandBike->id;
                    if($modelBike->save())
                        $newModelSave=TRUE;
                }
            }else{
                if($brandId!="" && $newModel!="")
                {
                    $modelBike=  ModelBike::getModelBrand(strtoupper($newModel), $brandId);
                    if($modelBike==NULL){
                        $modelBike=new ModelBike();
                        $modelBike->name=strtoupper($newModel);
                        $modelBike->id_brand_bike=$brandId;
                        if($modelBike->save())
                            $newModelSave=TRUE;
                    }
                }
                $params["brand"]=$params["brandId"]="";
            }
            $params["model"]=($newModelSave!=NULL)?"<option value='".$modelBike->id."'>".$modelBike->name."</option>":"";
            $params["modelId"]=($newModelSave!=NULL)?$modelBike->id:"";

            echo json_encode($params);
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

		if(isset($_POST['ModelBike']))
		{
			$model->attributes=array_map('strtoupper',$_POST['ModelBike']);
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
		$dataProvider=new CActiveDataProvider('ModelBike');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ModelBike('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ModelBike']))
			$model->attributes=$_GET['ModelBike'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ModelBike the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ModelBike::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ModelBike $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='model-bike-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionGetModelForBrand()
        {
            if(isset($_GET['Customer'])) $form=$_GET['Customer'];
            else $form=$_GET['BikeDescription'];
            $modelBike=NULL;
            $model=  ModelBike::getRelationBrand($form['id_brand_bike']);
            if($model!=NULL)
            {
                $modelBike.= "<option value=''>Seleccione</option>";
                foreach ($model as $key => $list) {
                    $modelBike.= "<option value=".$list->id.">".$list->name."</option>";
                }
            }else{
                $modelBike="<option>No hay modelos para la marca</option>";
            }
            echo $modelBike;
        }
}
