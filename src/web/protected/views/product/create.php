<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista de Productos', 'url'=>array('index')),
	array('label'=>'Admin. Productos', 'url'=>array('admin')),
	array('label'=>'Crear Proveedor', 'url'=>array('/supplier/create')),
);
?>

<h1>Crear Producto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>