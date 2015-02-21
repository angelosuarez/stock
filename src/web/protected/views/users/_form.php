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
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20,'required'=>'required')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>20,'maxlength'=>20,'required'=>'required')); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20,'required'=>'required')); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>        
        
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'required'=>'required')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20,'required'=>'required')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'id_type_of_user'); ?>
		<?php echo $form->dropDownList($model,'id_type_of_user', TypeOfUser::getList(),array('prompt'=>'Seleccione'),array('required'=>'required')); ?>
		<?php echo $form->error($model,'id_type_of_user'); ?>
	</div>
        
            <?php 
                if($model->isNewRecord)
                {
                    echo '<div class="row">';
                        echo $form->labelEx($model,'password'); 
                        echo $form->passwordField($model,'password',array('required'=>'required','size'=>60,'maxlength'=>128, 'type'=>'password')); 
                        echo $form->error($model,'password'); 
                    echo '</div>';
                }
            ?>
        
            <?php 
                if(!$model->isNewRecord)
                {
                    echo '<br><a id="change_password">Cambiar Contraseña</a><br>';
                    echo '<div class="row newPassword close" id="close">';
                        echo $form->labelEx($model,'new_password');
                        echo $form->passwordField($model,'new_password',array('size'=>60,'maxlength'=>128, 'type'=>'password'));
                        echo $form->error($model,'new_password'); 
                    echo '</div> &nbsp; ';
                    echo '<div class="row newPassword close" id="close">';
                        echo $form->labelEx($model,'confirm_new_password');
                        echo $form->passwordField($model,'confirm_new_password',array('size'=>60,'maxlength'=>128, 'type'=>'password'));
                        echo $form->error($model,'confirm_new_password');
                    echo '</div>';
                    echo '<div class="row newPassword close" id="close">';
                        echo '<h3><a title="Confirmar Contraseñas"> &nbsp; &#9658; </a></h3>';
                    echo '</div><br>';
                   
                    
                }
            ?>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->checkBox($model,'status',array('required'=>'required')); ?>
		<?php echo $form->error($model,'status'); ?>
        </div><br>

	<div class="row buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->