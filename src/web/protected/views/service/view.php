<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Lista de Servicios', 'url'=>array('index')),
	array('label'=>'Crear Servicio', 'url'=>array('create')),
	array('label'=>'Actualizar Servicio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Servicio', 'url'=>'delete/', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Seguro de eliminar este servicio?')),
	array('label'=>'Admin. Servicios', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-hover'),
	'attributes'=>array(
		'name',
		'total_price',
	),
)); ?>
