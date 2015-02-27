<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista de Servicios', 'url'=>array('index')),
	array('label'=>'Admin. Servicios', 'url'=>array('admin')),
);
?>

<h1>Crear Nuevo Servicio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>