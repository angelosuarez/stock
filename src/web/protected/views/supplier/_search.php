<?php
/* @var $this SupplierController */
/* @var $model Supplier */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'addres'); ?>
		<?php echo $form->textField($model,'addres',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rif'); ?>
		<?php echo $form->textField($model,'rif'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vendor_name'); ?>
		<?php echo $form->textField($model,'vendor_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vendor_last_name'); ?>
		<?php echo $form->textField($model,'vendor_last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vendor_phone'); ?>
		<?php echo $form->textField($model,'vendor_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vendor_email'); ?>
		<?php echo $form->textField($model,'vendor_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contrat_date'); ?>
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
	</div>

	<div class="row buttons">
                <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->