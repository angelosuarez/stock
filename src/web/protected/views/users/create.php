<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista de Usuarios', 'url'=>array('index')),
	array('label'=>'Admin. Usuarios', 'url'=>array('admin')),
);
?>

<h1>Crear Usuario</h1>

<?php 
    echo $this->renderPartial('_form', array('model'=>$model)); 
?>