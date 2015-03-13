<?php
/* @var $this CustomerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clientes',
);

$this->menu=array(
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Admin. Clientes', 'url'=>array('admin')),
);
?>

<h1>Cuentas Abiertas</h1>
<div class='forany-view open-accounts'>
    <?php 
    if($dataProvider!=NULL)
    {
        foreach ($dataProvider as $key => $accounts) 
        {
            echo $this->renderPartial('_view',array(
                                'data'=>$accounts,
                        ));
        }
    }else{
        echo "<h1 class='account-null-note'>No hay Cuentas Abiertas...</h1>";
    }
    
    ?>
</div>