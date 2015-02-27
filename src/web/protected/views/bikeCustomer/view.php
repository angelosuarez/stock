<?php
/* @var $this BikeCustomerController */
/* @var $model BikeCustomer */
$userType=Users::getData(Yii::app()->user->id)->id_type_of_user;
$this->breadcrumbs=array(
	'Cuenta'=>array('index'),
	$model->idBikeDescription->idModelBike->name." ".$model->idBikeDescription->idColour->name,
);

$this->menu=array(
	array('label'=>'Lista de Cuentas', 'url'=>array('index')),
//	array('label'=>'Create BikeCustomer', 'url'=>array('create')),
//	array('label'=>'Update BikeCustomer', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete BikeCustomer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage BikeCustomer', 'url'=>array('admin')),
);
?>

<h1>Cuenta </h1><h3><?php echo $model->idCustomer->name." ".$model->idCustomer->last_name; ?></h3>
<div class='especific-view'>
    <?php $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model->idBikeDescription,
            'htmlOptions'=>array('class'=>'table table-hover'),
            'attributes'=>array(
                    'idBrandBike.name',
                    'idModelBike.name',
                    'idColour.name',
                    'plate',
                    'year_bike',
            ),
    )); ?>
    
    <a href='/BikeCustomer/newService/<?php echo $model->id?>'>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>'Agregar Servicio')); ?>
    </a>
    <a href='/BikeCustomer/newProduct/<?php echo $model->id?>'>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>'Agregar Producto')); ?>
    </a>
    <a href='/BikeCustomer/createInvoice/<?php echo $model->id?>' >
        <?php $this->widget('bootstrap.widgets.TbButton', array('htmlOptions'=>array("id"=>"createInvoice"), 'buttonType'=>'submit', 'type'=>'success', 'label'=>'Cobrar Cuenta')); ?>
    </a>
</div>

<div class='forany-view-account'>
    
    <b>Servicios</b>
    <table class='table table-hover'>
        <tr>
            <th colspan='2'>Servicio</th>
            <th>Precio Base</th>
            <th>Cantidad</th>
            <th>IVA</th>
            <th>Precio Total</th>
            <th>Acciones</th>
        </tr>
    <?php 
        $serviceQuantity=$servicePrice=$serviceTax=$totalServicePrice=
        $serviceQuantityTotal=$servicePriceTotal=$totalServiceTax=$totalServiceTotalPrice=0;
        if($serviceCustomer!=NULL)
        {
            foreach ($serviceCustomer as $key => $service) 
            {   
                $serviceQuantityTotal+=$serviceQuantity=$service->quantity;
                $servicePriceTotal+=$servicePrice=$service->idService->price;
                $totalServiceTax+=$serviceTax=(($service->idService->tax/100) * $service->idService->price) * $service->quantity;
                $totalServiceTotalPrice+=$totalServicePrice=$service->idService->total_price * $service->quantity;
                
                echo "<tr id='{$service->id}' >
                        <td colspan='2'>{$service->idService->name}</td>
                        <td>{$servicePrice}Bs</td>
                        <td>{$serviceQuantity}</td>
                        <td>{$serviceTax}Bs</td>
                        <td>{$totalServicePrice}Bs</td>
                        <td>";
                     if($userType==1||$userType==2)       
                     echo " <a class='update' title='Actualizar' href='/serviceInvoice/update/{$service->id}''>
                            <img src='/images/update.png' alt='Actualiza'>
                            </a>  <a class='delete' title='Borrar' href='/serviceInvoice/delete/{$service->id}''>
                            <img src='/images/delete.png' alt='Borrar'>
                            </a>";
                echo "            
                        </td>
                     </tr>";
            }
            echo "<tr class='success'>
                        <td colspan='2'></td>                        
                        <td>{$servicePriceTotal}Bs</td>
                        <td>{$serviceQuantityTotal}</td>
                        <td>{$totalServiceTax}Bs</td>
                        <td colspan='2' class='sub-totals'> Total: {$totalServiceTotalPrice} Bs</td>
                     </tr>";
        }else{
            echo "<tr><td colspan='6'> No hay productos registradas para ".$model->idBikeDescription->idModelBike->name."</td></tr>";
        } 
    ?>
    </table>

    <b>Productos</b>
    <table class='table table-hover'>
        <tr>
            <th>Producto</th>
            <th>Marca</th>
            <th>Cant</th>
            <th>Precio c/u</th>
            <th>Sub total</th>
            <th>IVA</th>
            <th>Precio Total</th>
            <th>Acciones</th>
        </tr>
    <?php 
        $quantity=$productPrice=$subTotal=$tax=$totalPrice=
        $totalQuanity=$totalProductPrice=$totalSubTotal=$totalTax=$totalTotalPrice=0;
        
        if($productCustomer!=NULL)
        {
            foreach ($productCustomer as $key => $products) 
            {   
                $totalQuanity+=$quantity=$products->quantity;
                $totalProductPrice+=$productPrice=$products->idProduct->price;
                $totalSubTotal+=$subTotal=$products->idProduct->price * $products->quantity;
                $totalTax+=$tax=(($products->idProduct->tax/100) * $products->idProduct->price) * $products->quantity;
                $totalTotalPrice+=$totalPrice=$products->idProduct->total_price * $products->quantity;
                
                echo "<tr id='{$products->id}' >
                        <td>{$products->idProduct->name}</td>
                        <td>{$products->idProduct->brand}</td>
                        <td>{$quantity}</td>
                        <td>{$productPrice}Bs</td>
                        <td>{$subTotal}Bs</td>
                        <td>{$tax}Bs</td>
                        <td>{$totalPrice}Bs</td>
                        <td>";
                    if($userType==1||$userType==2)   
                       echo"<a class='update' title='Actualiza' href='/productInvoice/update/{$products->id}''>
                            <img src='/images/update.png' alt='Actualiza'>
                            </a>
                            <a class='delete' title='Borrar' href='/productInvoice/delete/{$products->id}''>
                            <img src='/images/delete.png' alt='Borrar'>
                            </a>";
                    echo " </td>
                     </tr>";
            }
            echo "<tr class='success'>
                        <td colspan='2'></td>
                        <td>{$totalQuanity}</td>
                        <td>{$totalProductPrice}Bs</td>
                        <td>{$totalSubTotal}Bs</td>
                        <td>{$totalTax}Bs</td>
                        <td colspan='2' class='sub-totals'> Total: {$totalTotalPrice} Bs</td>
                     </tr>";
        }else{
            echo "<tr><td colspan='6'> No hay productos registrados para ".$model->idBikeDescription->idModelBike->name."</td></tr>";
        } 
    ?>
    </table>
    <table  class='total-account table table-hover'>
        <tr>
            <td colspan='5'>Total a Cobrar: </td>
            <!--<td><?php // echo $totalProductPrice+$servicePriceTotal;?> </td>-->
            <!--<td><?php // echo $totalTax+$totalServiceTax;?> </td>-->
            <td><?php echo $totalTotalPrice+$totalServiceTotalPrice;     ?> Bs</td>
        </tr>
    </table>

</div>

