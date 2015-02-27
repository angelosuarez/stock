<?php
/* @var $this ServiceInvoiceController */
/* @var $model ServiceInvoice */

$this->breadcrumbs=array(
	'Service Invoices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ServiceInvoice', 'url'=>array('index')),
	array('label'=>'Create ServiceInvoice', 'url'=>array('create')),
	array('label'=>'Update ServiceInvoice', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ServiceInvoice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ServiceInvoice', 'url'=>array('admin')),
);
?>

<h1>View ServiceInvoice #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_bike_customer',
		'start_date',
		'id_service',
		'quantity',
		'id_invoice',
		'end_date',
	),
)); ?>
