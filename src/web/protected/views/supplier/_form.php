<?php
/* @var $this SupplierController */
/* @var $model Supplier */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'supplier-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('maxlength'=>50,'required'=>'required')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rif'); ?>
		<?php echo $form->textField($model,'rif',array('required'=>'required')); ?>
		<?php echo $form->error($model,'rif'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'addres'); ?>
		<?php echo $form->textField($model,'addres',array('maxlength'=>150,'required'=>'required')); ?>
		<?php echo $form->error($model,'addres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('maxlength'=>15,'required'=>'required')); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('maxlength'=>50,'required'=>'required')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'contrat_date'); ?>
		<?php 
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model'=>$model,
                        'attribute'=>'contrat_date',
                        'options'=>array(
                            'dateFormat'=>'yy-mm-dd',
                            'maxDate'=> "-0D", //fecha maxima
                            ),
                        'htmlOptions'=>array(
                            'size'=>'10', // textField size
                            'maxlength'=>'10', // textField maxlength
                            'required'=>'required',
                            'placeholder'=>'Año-Mes-Dia'
                           // 'readonly'=>'readonly'
                            )
                        )
                    ); 
                ?>
		<?php echo $form->error($model,'contrat_date'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'vendor_name'); ?>
		<?php echo $form->textField($model,'vendor_name',array('required'=>'required')); ?>
		<?php echo $form->error($model,'vendor_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vendor_last_name'); ?>
		<?php echo $form->textField($model,'vendor_last_name',array('required'=>'required')); ?>
		<?php echo $form->error($model,'vendor_last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vendor_phone'); ?>
		<?php echo $form->textField($model,'vendor_phone',array('required'=>'required')); ?>
		<?php echo $form->error($model,'vendor_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vendor_email'); ?>
		<?php echo $form->textField($model,'vendor_email',array('required'=>'required')); ?>
		<?php echo $form->error($model,'vendor_email'); ?>
	</div>

	
	<div class="row buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->