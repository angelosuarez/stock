<?php
/* @var $this BikeCustomerController */
/* @var $model BikeCustomer */
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
        
        <div class="row table-descr">
                <table class="table table-hover">
                    <tr>
                        <th>Descripción</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Existencia</th>
                        <th>Precio</th>
                    </tr>
                    <tr>
                        <td><?php echo $form->dropDownList($model,'id_product',Product::getList(),array('prompt'=>'Seleccione', 'required'=>'required')); ?></td>
                        <td id="brand"></td>
                        <td id="model"></td>
                        <td id="stock"></td>
                        <td id="price"></td>
                    </tr>
                </table>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity', array('required'=>'required')); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->hiddenField($model,'id'); ?>
	</div>
        <div class="row">
		<?php echo $form->hiddenField($model,'stock'); ?>
	</div>

	<div class="row buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array('disabled'=>'disabled','buttonType'=>'submit', 'type'=>'info', 'label'=>'Guardar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->