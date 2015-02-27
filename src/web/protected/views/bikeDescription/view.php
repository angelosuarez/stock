<?php
/* @var $this BikeDescriptionController */
/* @var $model BikeDescription */

$this->breadcrumbs=array(
	'Motos'=>array('index'),
	"Detalle",
);

$this->menu=array(
	array('label'=>'Lista de Motos', 'url'=>array('index')),
	array('label'=>'Nueva Moto', 'url'=>array('create')),
	array('label'=>'Actualizar Moto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Moto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Admin. Motos', 'url'=>array('admin')),
);
?>

<h1><?php echo BrandBike::getData($model->id_brand_bike)->name." ".ModelBike::getData($model->id_model_bike)->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-hover'),
	'attributes'=>array(
		'idBrandBike.name',
		'idModelBike.name',
		'idColour.name',
		'plate',
		'year_bike',
	),
)); ?>
