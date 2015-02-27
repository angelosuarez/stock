<?php
/* @var $this ProductInvoiceController */
/* @var $model ProductInvoice */

$this->breadcrumbs=array(
	'Product Invoices'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProductInvoice', 'url'=>array('index')),
	array('label'=>'Create ProductInvoice', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-invoice-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Product Invoices</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-invoice-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_bike_customer',
		'start_date',
		'id_product',
		'quanity',
		'id_invoice',
		/*
		'end_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
