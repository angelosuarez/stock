<?php
/* @var $this ProductInvoiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Invoices',
);

$this->menu=array(
	array('label'=>'Create ProductInvoice', 'url'=>array('create')),
	array('label'=>'Manage ProductInvoice', 'url'=>array('admin')),
);
?>

<h1>Product Invoices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
