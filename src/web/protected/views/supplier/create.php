<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista de Proveedores', 'url'=>array('index')),
	array('label'=>'Admin. Proveedores', 'url'=>array('admin')),
);
?>

<h1>Crear Proveedor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>