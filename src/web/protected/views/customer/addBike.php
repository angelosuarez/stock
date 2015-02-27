<?php
/* @var $this CustomerController */
/* @var $model Customer */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->name." ".$model->last_name=>array('view','id'=>$model->id),
	'Nueva Moto',
);

$this->menu=array(
	array('label'=>'Volver a '.$model->name, 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Admin. Clientes', 'url'=>array('admin')),
        array('label'=>'Ver todas las motos', 'url'=>array('bikeDescription/admin')),
);
?>

<h1>Nueva Moto </h1><h3> para <?php echo $model->name; ?></h3>

<?php echo $this->renderPartial('_formBikeCustomer', array('model'=>$model)); ?>