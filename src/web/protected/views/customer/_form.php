<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
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
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50,'required'=>'required')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>50,'maxlength'=>50,'required'=>'required')); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_doc'); ?>
		<?php echo $form->textField($model,'id_doc',array('required'=>'required')); ?>
		<?php echo $form->error($model,'id_doc'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'addres'); ?>
		<?php echo $form->textField($model,'addres',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'addres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_movil'); ?>
		<?php echo $form->textField($model,'phone_movil'); ?>
		<?php echo $form->error($model,'phone_movil'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'phone_local'); ?>
		<?php echo $form->textField($model,'phone_local',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'phone_local'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>


	<div class="row buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->