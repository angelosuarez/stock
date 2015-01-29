<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
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
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50, 'required'=>'required')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand'); ?>
		<?php echo $form->textField($model,'brand',array('size'=>50,'maxlength'=>50,'required'=>'required')); ?>
		<?php echo $form->error($model,'brand'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'model'); ?>
		<?php echo $form->textField($model,'model',array('size'=>50,'maxlength'=>50,'required'=>'required')); ?>
		<?php echo $form->error($model,'model'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'serial'); ?>
		<?php echo $form->textField($model,'serial',array('required'=>'required')); ?>
		<?php echo $form->error($model,'serial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cost'); ?>
		<?php echo $form->textField($model,'cost',array('required'=>'required')); ?>
		<?php echo $form->error($model,'cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('required'=>'required')); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tax'); ?>
		<?php echo $form->dropDownList($model,'tax',array('12'=>'12','08'=>'08')); ?>
		<?php echo $form->error($model,'tax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_price'); ?>
		<?php echo $form->textField($model,'total_price',array('required'=>'required')); ?>
		<?php echo $form->error($model,'total_price'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity',array('required'=>'required')); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'id_supplier'); ?>
		<?php echo $form->dropDownList($model,'id_supplier',Supplier::getList(),array('prompt'=>'Seleccione')); ?>
		<?php echo $form->error($model,'id_supplier'); ?>
	</div>

	<div class="row buttons">
		<?php // echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->