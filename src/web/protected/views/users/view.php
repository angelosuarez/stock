<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->username,
);

$this->menu=array(
	array('label'=>'Lista de Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Actualizar Usuario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Usuario', 'url'=>array('delete', 'id'=>$model->id)),
	array('label'=>'Admin. Usuarios', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
        'htmlOptions'=>array('class'=>'table table-hover'),
	'attributes'=>array(
//		'id',
//		'username',
		'name',
		'lastname',
		'phone',
//		'password',
		'email',
//		'activkey',
//		'superuser',
		'status',
//		'create_at',
//		'lastvisit_at',
		'idTypeOfUser.name',
	),
)); ?>
