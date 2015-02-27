<?php
/* @var $this BikeDescriptionController */
/* @var $model BikeDescription */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_brand_bike'); ?>
		<?php echo $form->dropDownList($model,'id_brand_bike',  BrandBike::getList(),array('prompt'=>'Seleccione')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_model_bike'); ?>
		<?php echo $form->dropDownList($model,'id_model_bike',  ModelBike::getList(),array('prompt'=>'Seleccione')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_colour'); ?>
		<?php echo $form->dropDownList($model,'id_colour',Colour::getList(),array('prompt'=>'Seleccione')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plate'); ?>
		<?php echo $form->textField($model,'plate',array('size'=>8,'maxlength'=>8, 'style'=>'text-transform:uppercase;')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year_bike'); ?>
		<?php echo $form->textField($model,'year_bike'); ?>
	</div>

	<div class="row buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>'Buscar ')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->