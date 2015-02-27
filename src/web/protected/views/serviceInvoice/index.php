<?php
/* @var $this ServiceInvoiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Service Invoices',
);

$this->menu=array(
	array('label'=>'Create ServiceInvoice', 'url'=>array('create')),
	array('label'=>'Manage ServiceInvoice', 'url'=>array('admin')),
);
?>

<h1>Service Invoices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
