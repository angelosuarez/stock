<?php
/* @var $this ProductInvoiceController */
/* @var $model ProductInvoice */

$this->breadcrumbs=array(
	'Product Invoices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductInvoice', 'url'=>array('index')),
	array('label'=>'Create ProductInvoice', 'url'=>array('create')),
	array('label'=>'Update ProductInvoice', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductInvoice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductInvoice', 'url'=>array('admin')),
);
?>

<h1>View ProductInvoice #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_bike_customer',
		'start_date',
		'id_product',
		'quanity',
		'id_invoice',
		'end_date',
	),
)); ?>
