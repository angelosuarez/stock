<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Lista de Servicios', 'url'=>array('index')),
	array('label'=>'Crear Servicio', 'url'=>array('create')),
	array('label'=>'Ver Servicio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Admin. Servicios', 'url'=>array('admin')),
);
?>

<h1>Actuaizar <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>