<?php
/* @var $this BikeCustomerController */
/* @var $model BikeCustomer */

$this->breadcrumbs=array(
	'Bike Customers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BikeCustomer', 'url'=>array('index')),
	array('label'=>'Manage BikeCustomer', 'url'=>array('admin')),
);
?>

<h1>Create BikeCustomer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>