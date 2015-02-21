<?php
/* @var $this CustomerController */
/* @var $model Customer */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Lista de Clientes', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Actualizar Cliente', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Seguro de querer eliminar este cliente?')),
	array('label'=>'Admin. Clientes', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->name." ".$model->last_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-hover'),
	'attributes'=>array(
                'id_doc',
		'name',
		'last_name',
		'addres',
		'email',
		'phone_movil',
                'phone_local',
        ),
)); ?>
