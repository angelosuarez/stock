<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

//$this->pageTitle=Yii::app()->name . ' - Login';
//$this->breadcrumbs=array(
//	'Login',
//);
?>
<div class="row">
    
<!--    <div class="col-xs-4">
    </div>
    -->
    <div class="col-sm-">
        <h1>Login</h1>
        <p>Por favor, para ingresar, introduzca sus credenciales:</p>
        <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                ),
        )); ?>
            <p class="note">campos con <span class="required">*</span> son obligatorios.</p>
            <div class="row">
                    <?php echo $form->labelEx($model,'username'); ?>
                    <?php echo $form->textField($model,'username'); ?>
                    <?php echo $form->error($model,'username'); ?>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($model,'password'); ?>
                    <?php echo $form->passwordField($model,'password'); ?>
                    <?php echo $form->error($model,'password'); ?>
            </div>

            <div class="row rememberMe">
                    <?php echo $form->checkBox($model,'rememberMe'); ?>
                    <?php echo $form->label($model,'rememberMe'); ?>
                    <?php echo $form->error($model,'rememberMe'); ?>
            </div>

            <div class="row buttons ">
                    <?php // echo CHtml::submitButton('Login'); ?>
                    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'success', 'label'=>'Ingresar ')); ?>
            </div>

        <?php $this->endWidget(); ?>
        </div><!-- form -->
    </div>
    
<!--    <div class="col-xs-4">
    </div>-->
</div>
