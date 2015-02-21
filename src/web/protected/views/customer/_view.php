<?php
/* @var $this CustomerController */
/* @var $data Customer */
?>

<div class="view">

	<?php echo CHtml::link(CHtml::encode($data->id_doc), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addres')); ?>:</b>
	<?php echo CHtml::encode($data->addres); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_movil')); ?>:</b>
	<?php echo CHtml::encode($data->phone_movil); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_local')); ?>:</b>
	<?php echo CHtml::encode($data->phone_local); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

        

</div>