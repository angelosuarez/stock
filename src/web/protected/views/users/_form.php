<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20),array('required'=>'required')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('required'=>'required','size'=>60,'maxlength'=>128, 'type'=>'password')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
        
            <?php 
                if(!$model->isNewRecord)
                {
                    echo '<div class="row">';
                    echo $form->labelEx($model,'password_new');
                    echo $form->passwordField($model,'password_new',array('size'=>60,'maxlength'=>128, 'type'=>'password'));
                    echo $form->error($model,'password_new'); 
                    echo '</div>';
                }
            ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'required'=>'required')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_type_of_user'); ?>
		<?php echo $form->dropDownList($model,'id_type_of_user', TypeOfUser::getList(),array('prompt'=>'Seleccione'),array('required'=>'required')); ?>
		<?php echo $form->error($model,'id_type_of_user'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->checkBox($model,'status',array('required'=>'required')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->