<?php
/* @var $this BikeCustomerController */
/* @var $data BikeCustomer */
?>

<div class="view <?php  echo $data->idBikeDescription->idColour->name; ?>">
        <b>
	<?php echo CHtml::link(CHtml::encode(
                        $data->idBikeDescription->idBrandBike->name." ".$data->idBikeDescription->idModelBike->name
                  ),
                   array('view', 'id'=>$data->id)); ?>
        </b>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('Color')); ?>:</b>
	<?php echo CHtml::encode($data->idBikeDescription->idColour->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Placa')); ?>:</b>
	<b><?php echo CHtml::link(CHtml::encode( $data->idBikeDescription->plate), array('view', 'id'=>$data->id)); ?></b>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('Año')); ?>:</b>
	<?php echo CHtml::encode($data->idBikeDescription->year_bike); ?>
	<br />
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('Cliente')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode( $data->idCustomer->name." ".$data->idCustomer->last_name ), array('view', 'id'=>$data->id)); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('Cédula')); ?>:</b>
        <b><?php echo CHtml::link(CHtml::encode( $data->idCustomer->id_doc ), array('view', 'id'=>$data->id)); ?></b>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Monto a Cargo')); ?>:</b>
        <div class='to-payment'><b> <?php  echo CHtml::encode( $data->total_price ); ?> Bs</b></div>
        <!--<b><?php // echo CHtml::link(CHtml::encode( $data->total_price ), array('view', 'id'=>$data->id, 'htmlOptions'=>array("class"=>"to-payment"))); ?> Bs</b>-->
	<br />


</div>