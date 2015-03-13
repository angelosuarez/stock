<?php
/* @var $this DayReportController */
/* @var $model DayReport */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'day-report-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cash'); ?>
		<?php echo $form->textField($model,'cash',array('required'=>'required', 'placeholder'=>'0 Bs', 'value'=>'0')); ?>
		<?php echo $form->error($model,'cash'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cash_point'); ?>
		<?php echo $form->textField($model,'cash_point',array('required'=>'required', 'placeholder'=>'0 Bs', 'value'=>'0')); ?>
		<?php echo $form->error($model,'cash_point'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cash_voucher'); ?>
		<?php echo $form->textField($model,'cash_voucher',array('required'=>'required', 'placeholder'=>'0 Bs', 'value'=>'0')); ?>
		<?php echo $form->error($model,'cash_voucher'); ?>
	</div>
        
	<div class="row note">
		<?php echo $form->labelEx($model,'note'); ?>
                <?php echo $form->textArea($model,'note',array('rows'=>2, 'cols'=>50,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>
        
	<div class="row buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'success', 'label'=>$model->isNewRecord ? 'Enviar Reporte Diario' : 'Enviar Reporte Diario')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->