<?php
/* @var $this BikeDescriptionController */
/* @var $model BikeDescription */

$this->breadcrumbs=array(
	'Motos'=>array('index'),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Lista de Motos', 'url'=>array('index')),
	array('label'=>'Nueva Moto', 'url'=>array('create')),
	array('label'=>'Vista de Motos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Admin. Motos', 'url'=>array('admin')),
);
?>

<h1><?php echo BrandBike::getData($model->id_brand_bike)->name." ".ModelBike::getData($model->id_model_bike)->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>