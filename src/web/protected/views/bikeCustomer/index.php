<?php
/* @var $this BikeCustomerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cuentas',
);

$this->menu=array(
	array('label'=>'Nueva Cuenta', 'url'=>array('/customer/admin/')),
);
?>

<h1>Cuentas Abiertas</h1>
<div class='forany-view open-accounts'>
    <?php 
    //      $this->widget('zii.widgets.CListView', array(
    //	'dataProvider'=>$dataProvider,
    //	'itemView'=>'_view',
    //      )); 
    if($dataProvider!=NULL)
    {
        foreach ($dataProvider as $key => $accounts) 
        {
            echo $this->renderPartial('_view',array(
                                'data'=>$accounts,
                        ));
        //    echo $accounts->id_customer->name;
        //    echo "<br>";
        }
    }else{
        echo "<h1 class='account-null-note'>No hay Cuentas Abiertas...</h1>";
    }
    
    ?>
</div>
