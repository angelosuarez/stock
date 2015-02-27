<?php
/* @var $this ServiceInvoiceController */
/* @var $model ServiceInvoice */

$this->breadcrumbs=array(
	'Service Invoices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ServiceInvoice', 'url'=>array('index')),
	array('label'=>'Manage ServiceInvoice', 'url'=>array('admin')),
);
?>

<h1>Create ServiceInvoice</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>