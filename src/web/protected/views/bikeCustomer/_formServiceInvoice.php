<?php
/* @var $this BikeCustomerController */
/* @var $model BikeCustomer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bike-customer-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <div class="row">
		<?php echo $form->labelEx($model,'id_service'); ?>
		<?php echo $form->dropDownList($model,'id_service',Service::getList(),array('prompt'=>'Seleccione', 'required'=>'required')); ?>
		<?php echo $form->error($model,'id_service'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity', array('required'=>'required','value'=>'1')); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->hiddenField($model,'id'); ?>
	</div>

	<div class="row buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>'Guardar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->