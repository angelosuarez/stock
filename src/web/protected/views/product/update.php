<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista de Productos', 'url'=>array('index')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Vista de Producto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Admin. Productos', 'url'=>array('admin')),
);
?>

<h1>Update Product <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>