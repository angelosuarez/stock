<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Lista de Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
	array('label'=>'Vista de Proveedores', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Admin. de Proveedores', 'url'=>array('admin')),
);
?>

<h1>Actualizar Proveedor <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>