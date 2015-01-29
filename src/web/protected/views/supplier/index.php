<?php
/* @var $this SupplierController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Proveedores',
);

$this->menu=array(
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
	array('label'=>'Admin. Proveedores', 'url'=>array('admin')),
);
?>

<h1>Proveedores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
