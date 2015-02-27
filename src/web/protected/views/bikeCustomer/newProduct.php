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
<h1> <?php echo $model->idCustomer->name; ?> y su 
     <?php echo $model->idBikeDescription->idBrandBike->name; ?>
</h1>

<?php echo $this->renderPartial('_formProductInvoice', array('model'=>$model)); ?>