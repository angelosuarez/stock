<?php
/* @var $this BikeDescriptionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Motos',
);

$this->menu=array(
	array('label'=>'Nueva Moto', 'url'=>array('create')),
	array('label'=>'Admin. Motos', 'url'=>array('admin')),
);
?>

<h1>Descripción de Motos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
