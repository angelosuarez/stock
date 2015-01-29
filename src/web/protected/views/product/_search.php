<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'brand'); ?>
		<?php echo $form->textField($model,'brand',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'model'); ?>
		<?php echo $form->textField($model,'model',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial'); ?>
		<?php echo $form->textField($model,'serial'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_supplier'); ?>
		<?php echo $form->dropDownList($model,'id_supplier',Supplier::getList(),array('prompt'=>'Seleccione')); ?>
	</div>

	<div class="row buttons">
		<?php // echo CHtml::submitButton('Search'); ?>
                <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>'Buscar ')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->