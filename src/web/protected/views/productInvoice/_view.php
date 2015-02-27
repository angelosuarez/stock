<?php
/* @var $this ProductInvoiceController */
/* @var $data ProductInvoice */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bike_customer')); ?>:</b>
	<?php echo CHtml::encode($data->id_bike_customer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product')); ?>:</b>
	<?php echo CHtml::encode($data->id_product); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quanity')); ?>:</b>
	<?php echo CHtml::encode($data->quanity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_invoice')); ?>:</b>
	<?php echo CHtml::encode($data->id_invoice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
	<?php echo CHtml::encode($data->end_date); ?>
	<br />


</div>