<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Lista de Productos', 'url'=>array('index')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Actualizar Producto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Producto', 'url'=>'delete/', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro de eliminar el producto? recuerde que aqui se eliminaran todos los productos de este tipo, si desea disminuir la cantidad del mismo, solo modifique la cantidad')),
	array('label'=>'Admin. Productos', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-hover'),
	'attributes'=>array(
//		'id',
//		'name',
		'brand',
		'model',
		'serial',
		'cost',
		'price',
		'quantity',
		'tax',
		'total_price',
//		'register_date',
		'idSupplier.name',
	),
)); ?>
