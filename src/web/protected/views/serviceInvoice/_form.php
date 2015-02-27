<?php
/* @var $this ServiceInvoiceController */
/* @var $model ServiceInvoice */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-invoice-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <div class="row">
		<?php echo $form->labelEx($model->idService,'name'); ?>
		<?php echo $form->textField($model->idService,'name',array('required'=>'required','disabled'=>'disabled')); ?>
		<?php echo $form->error($model->idService,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model->idService,'total_price'); ?>
		<?php echo $form->textField($model->idService,'total_price',array('required'=>'required', 'disabled'=>'disabled')); ?>
		<?php echo $form->error($model->idService,'total_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity'); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>

	<div class="row buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->