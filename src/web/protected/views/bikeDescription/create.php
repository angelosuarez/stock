<?php
/* @var $this BikeDescriptionController */
/* @var $model BikeDescription */

$this->breadcrumbs=array(
	'Motos'=>array('index'),
	'Nueva Moto',
);

$this->menu=array(
	array('label'=>'Lista de Motoos', 'url'=>array('index')),
	array('label'=>'Admin. Motos', 'url'=>array('admin')),
);
?>

<h1>Nueva Moto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>