
<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);

$this->menu=array(
	array('label'=>$link, 'url'=>array($action)),
);
?>
<div  class="alert alert-warning in fade">
    <h2>Atención</h2>

    <div class="error">
   
        <h2>
             <?php echo $message; ?>
        </h2>
    </div>
</div>