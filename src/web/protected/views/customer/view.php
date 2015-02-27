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
<div class='especific-view'>
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
</div>
<div class='forany-view'>
    <?php
//     var_dump($model2);
    ?>
    <table class='table table-hover'>
        <tr>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Color</th>
            <th>Placa</th>
            <th>Año</th>
            <th>Acciones</th>
        </tr>
    <?php 
        if($bikeCustomer!=NULL)
        {
            foreach ($bikeCustomer as $key => $bike) 
            {
                $statusBikeImg="newAccount";
                $title="Comenzar cuenta a ".$model->name." ".$model->last_name." con esta moto";
                $deallocate="<img src='/images/deallocate.png' id='deallocate' class='/bikeCustomer' title='Desasignar moto a ".$model->name." ".$model->last_name."'>";
                $activeProduct=ProductInvoice::checkAOpenAccount($bike->id)["id"];
                $activeService=ServiceInvoice::checkAOpenAccount($bike->id)["id"];
                
                if( $activeProduct!=NULL || $activeProduct!=NULL ){
                    $statusBikeImg="playNow";
                    $title="Hay una cuenta abierta para ".$model->name." ".$model->last_name." con esta moto";
                    $deallocate=NULL;
                }
                $id=$bike->id_bike_description;
                $controller=$bike->controller;
                echo "<tr id='{$bike->id}' >
                        <td>{$bike->brand}</td>
                        <td>{$bike->model}</td>
                        <td>{$bike->colour}</td>
                        <td>{$bike->plate}</td>
                        <td>{$bike->year_bike}</td>
                        <td>
                            <a href='/BikeCustomer/view/{$bike->id}' title='{$title}'>
                                <img src='/images/{$statusBikeImg}.png'>
                            </a>
                            <a href='/{$controller}/view/{$id}' title='Mostrar'>
                                <img src='/images/view.png' >
                            </a>
                            <a href='/{$controller}/update/{$id}' title='Actualizar'>
                                <img src='/images/update.png' >
                            </a>
                            {$deallocate}
                        </td>
                     </tr>";
            }
        }else{
            echo "<tr><td colspan='6'> No hay motos registradas para ".$model->name." ".$model->last_name."</td></tr>";
        } 
    ?>
    </table>

    <a href='addBike/<?php echo $model->id?>'>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>'Agregar Moto')); ?>
    </a>
            
</div>


<?php 
//            $bikeCustomer=BikeCustomer::model()->findAllBySql("select * from bike_customer where id_customer=".$model->id);
    
 ?>

