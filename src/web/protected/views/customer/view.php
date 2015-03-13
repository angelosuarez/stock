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
    )); 
?>
    
    
<?php $this->widget('application.extensions.fancybox.EFancyBox', array(
                'target'=>'a.fancybox',
                'mouseEnabled'=>false,
                'config'=>array(
                        'scrolling'=> 'auto',
						'transitionIn'=>'elastic',
						'transitionOut'=>'elastic',
						'speedIn'=>	600, 
						'speedOut'=>200, 
						'overlayColor'=>'#022033',
						'titlePosition'=>'outside',
						'centerOnScroll'=>true,
						'overlayColor'=>'#FFFFFF',
					),
                )
        );
?>
    

        <a href='/Customer/newProduct/<?php echo $model->id?>'>
            <?php $this->widget('bootstrap.widgets.TbButton', array('htmlOptions'=>array("id"=>"addProduct"), 'buttonType'=>'submit', 'type'=>'info', 'label'=>'Agregar Producto')); ?>
        </a>
        <a href='/BikeCustomer/createInvoice/<?php  echo $model->id?>' >
            <?php
//                echo  CHtml::link(CHtml::encode( "probando" ), array('/Customer/newProduct/', 'id'=>$model->id), array("class"=>"fancybox"), "#data");
//                echo  CHtml::link('link text goes here',"/Customer/newProduct/".$model->id, array("class"=>"fancybox")); 

            
            $this->widget('bootstrap.widgets.TbButton', array('htmlOptions'=>array("id"=>"createInvoice"), 'buttonType'=>'submit', 'type'=>'success', 'label'=>'Cobrar Cuenta')); ?>
        </a>
</div>


<div class='forany-view'>
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
        
        if($productByCustomer!=NULL)
        {
            foreach ($productByCustomer as $key => $products) 
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
                    if($typeUser==1||$typeUser==2)   
                       echo"<a class='update' title='Actualiza' href='/productInvoice/update/{$products->id}''>
                            <img src='/images/update.png' alt='Actualiza'>
                            </a>
                            <a class='delete' title='Borrar' href='/productInvoice/delete/{$products->id}''>
                            <img src='/images/delete.png' alt='Borrar'>
                            </a>";
                    echo " </td>
                     </tr>";
            }
            echo "<tr class='success '>
                        <td colspan='2'></td>
                        <td>{$totalQuanity}</td>
                        <td>{$totalProductPrice}Bs</td>
                        <td>{$totalSubTotal}Bs</td>
                        <td>{$totalTax}Bs</td>
                        <td colspan='2' class='sub-totals'> Total: {$totalTotalPrice} Bs</td>
                     </tr>";
        }else{
            echo "<tr><td colspan='6'> No hay productos registrados para ".$model->name." ".$model->last_name."</td></tr>";
        } 
    ?>
    </table>          
</div>

<div style="display:none">
    <div id="data">
    <p>Contents of this div appear in fancybox</p>
    </div>
</div>