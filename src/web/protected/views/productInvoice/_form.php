<?php
/* @var $this ProductInvoiceController */
/* @var $model ProductInvoice */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-invoice-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_product'); ?>
		<?php echo $form->dropDownList($model,'id_product',Product::getList(),array('prompt'=>'Seleccione', 'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'id_product'); ?>
	</div>
         
	<div class="row">
		<?php echo $form->labelEx($model->idProduct,'brand'); ?>
		<?php echo $form->textField($model->idProduct,'brand',array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model->idProduct,'brand'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model->idProduct,'model'); ?>
		<?php echo $form->textField($model->idProduct,'model',array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model->idProduct,'model'); ?>
	</div>
        
	<div class="row">
                <label>Existencia</label>
		<?php echo $form->textField($model->idProduct,'quantity',array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model->idProduct,'quantity'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model->idProduct,'total_price'); ?>
		<?php echo $form->textField($model->idProduct,'total_price',array('required'=>'required', 'disabled'=>'disabled')); ?>
		<?php echo $form->error($model->idProduct,'total_price'); ?>
	</div>
        <br>
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