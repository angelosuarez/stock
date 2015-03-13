<?php
/* @var $this BikeCustomerController */
/* @var $model BikeCustomer */

$this->breadcrumbs=array(
	'Nuevo',
);

$this->menu=array(
	array('label'=>'No hay Opciones', 'url'=>''),
);

?>

<h3>Nuevo producto para:</h3>
<h1> <?php echo $model->name." ".$model->last_name; ?> 
</h1>

<?php echo $this->renderPartial('_formProductInvoice', array('model'=>$model)); ?>