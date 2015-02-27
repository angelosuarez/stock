<?php
/* @var $this ServiceInvoiceController */
/* @var $model ServiceInvoice */

$this->breadcrumbs=array(
	'Actualizar',
);

$this->menu=array(
	array('label'=>'No hay Opciones', 'url'=>''),
);
?>

<h3>Actualizacion de servicio para:</h3>
<h1> <?php echo $model->idBikeCustomer->idCustomer->name; ?> y su 
     <?php echo $model->idBikeCustomer->idBikeDescription->idBrandBike->name; ?>
</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>