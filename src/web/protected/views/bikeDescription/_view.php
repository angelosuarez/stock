<?php
/* @var $this BikeDescriptionController */
/* @var $data BikeDescription */
$brand=BrandBike::getData($data->id_brand_bike)->name;
$model=ModelBike::getData($data->id_model_bike)->name;
$colour=ModelBike::getData($data->id_colour)->name;
?>

<div class="view">

	<?php echo CHtml::link(CHtml::encode($brand." ".$model), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_brand_bike')); ?>:</b>
	<?php echo CHtml::encode($brand); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_model_bike')); ?>:</b>
	<?php echo CHtml::encode($model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_colour')); ?>:</b>
	<?php echo CHtml::encode($colour); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plate')); ?>:</b>
	<?php echo CHtml::encode($data->plate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year_bike')); ?>:</b>
	<?php echo CHtml::encode($data->year_bike); ?>
	<br />


</div>