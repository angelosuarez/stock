<?php
/* @var $this DayReportController */
/* @var $model DayReport */

$this->breadcrumbs=array(
	'Reporte Diario'=>array('create')
);

$this->menu=array(
	array('label'=>'Sin Opciones', 'url'=>array('create')),
);
?>

<h1>Reporte Diario</h1>

<?php
    if($success==1 || $success==TRUE)
    {
        echo "<h1>Reporte Enviado!!!</h1>";
    }else{
        echo $this->renderPartial('_form', array('model'=>$model)); 
    }
?>