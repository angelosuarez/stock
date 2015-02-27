<?php
/* @var $this BikeCustomerController */
/* @var $model BikeCustomer */

$this->breadcrumbs=array(
	'Bike Customers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BikeCustomer', 'url'=>array('index')),
	array('label'=>'Create BikeCustomer', 'url'=>array('create')),
	array('label'=>'View BikeCustomer', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BikeCustomer', 'url'=>array('admin')),
);
?>

<h1>Update BikeCustomer <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>