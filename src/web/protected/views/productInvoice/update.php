<?php
/* @var $this ProductInvoiceController */
/* @var $model ProductInvoice */

$this->breadcrumbs=array(
	'Actualizar',
);

$this->menu=array(
	array('label'=>'No hay Opciones', 'url'=>''),
);
?>

<h3>Actualizacion de producto para:</h3>
<h1> <?php echo $model->idBikeCustomer->idCustomer->name; ?> y su 
     <?php echo $model->idBikeCustomer->idBikeDescription->idBrandBike->name; ?>
</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>