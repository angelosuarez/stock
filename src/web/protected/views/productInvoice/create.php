<?php
/* @var $this ProductInvoiceController */
/* @var $model ProductInvoice */

$this->breadcrumbs=array(
	'Product Invoices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductInvoice', 'url'=>array('index')),
	array('label'=>'Manage ProductInvoice', 'url'=>array('admin')),
);
?>

<h1>Create ProductInvoice</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>