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
<h1> <?php echo $model->idCustomer->name."".$model->idCustomer->last_name; ?> 
</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>