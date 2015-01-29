<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>
<div  class="alert alert-warning in fade">
    <h2>Error <?php echo $code; ?></h2>

    <div class="error">
    <?php echo CHtml::encode($message); ?>
        <h2>
            Comuniquese con el supervisor o administrador de sistema...
        </h2>
    </div>
</div>
