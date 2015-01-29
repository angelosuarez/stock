<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Administración de Productos',
);

$this->menu=array(
	array('label'=>'Lista de Productos', 'url'=>array('index')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').show('slow');
	return false;
});
$('.search-form form').submit(function(){
	$('#product-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administración de Productos</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'product-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        
	'columns'=>array(
//		'id',
		'name',
		'brand',
		'model',
		'serial',
//		'cost',
//		'price',
		'quantity',
//		'tax',
		'total_price',
//		'register_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
