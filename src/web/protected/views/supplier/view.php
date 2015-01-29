<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Lista de Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedores', 'url'=>array('create')),
	array('label'=>'Actualizar Proveedores', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Proveedor', 'url'=>'delete/', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro de eliminar el proveedor? pueden haber productos surtidos por este')),
	array('label'=>'Admin. Proveedor', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-hover'),
	'attributes'=>array(
//		'id',
		'name',
		'addres',
		'rif',
		'phone',
		'email',
		'vendor_name',
		'vendor_last_name',
		'vendor_phone',
		'vendor_email',
		'contrat_date',
	),
)); ?>
