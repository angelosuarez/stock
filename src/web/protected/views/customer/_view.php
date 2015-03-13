<?php
/* @var $this CustomerController */
/* @var $data Customer */
?>

<div class="view">
        <b><?php echo CHtml::encode($data->getAttributeLabel('Cliente')); ?>:</b>
        <br>
        <?php echo CHtml::link(CHtml::encode($data->idCustomer->name." ".$data->idCustomer->last_name), array('view', 'id'=>$data->id_customer)); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('Cedula')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCustomer->id_doc), array('view', 'id'=>$data->id_customer)); ?>
	<br />    
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('Abierta desde')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('Monto a Cargo')); ?>:</b>
        <div class='to-payment'><b> <?php echo CHtml::link(CHtml::encode($data->total_price), array('view', 'id'=>$data->id_customer)); ?> Bs</b></div>
	<br />
</div>