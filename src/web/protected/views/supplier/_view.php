<?php
/* @var $this SupplierController */
/* @var $data Supplier */
?>

<div class="view">

	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rif')); ?>:</b>
	<?php echo CHtml::encode($data->rif); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vendor_name')); ?>:</b>
	<?php echo CHtml::encode($data->vendor_name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('vendor_last_name')); ?>:</b>
	<?php echo CHtml::encode($data->vendor_last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vendor_phone')); ?>:</b>
	<?php echo CHtml::encode($data->vendor_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vendor_email')); ?>:</b>
	<?php echo CHtml::encode($data->vendor_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contrat_date')); ?>:</b>
	<?php echo CHtml::encode($data->contrat_date); ?>
	<br />

	*/ ?>

</div>