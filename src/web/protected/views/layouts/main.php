<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
        <!--MENU PRINCIPAL start-->
        <?php
            Yii::import('webroot.protected.controllers.SiteController');
            $menuItems=SiteController::accessControl();

            $this->widget('bootstrap.widgets.TbNavbar',array(
                'type'=>'inverse',
                'brand'=>CHtml::encode(Yii::app()->name),
                'brandUrl'=>'/site/index',
                'collapse'=>true,
                
                'items'=>array(
                            array(
                                'class'=>'bootstrap.widgets.TbMenu',
                                'htmlOptions'=>array(
                                    'class'=>'pull-right'
                                    ),
                                'items'=>$menuItems
                            ),
                        ),
                )
            );
        ?>
        <!--MENU PRINCIPAL end-->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
        <?php echo Yii::app()->bootstrap->init();?>
	<?php echo $content; ?>
                
	<div class="clear"></div>

<!--	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php // echo Yii::powered(); ?>
	</div> footer -->

</div><!-- page -->
        <script>
        var _root_ = "<?php echo Yii::app()->getBaseUrl(true) . '/'; ?>";
        </script>
        <!-- Javascript - jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        
        <script src="<?php echo Yii::app()->baseUrl; ?>/protected/extensions/bootstrap/assets/js/bootstrap-min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/protected/extensions/bootstrap/assets/js/bootstrap-dropdown.js"></script>
        
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/sales.js"></script>
        <script>
                var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
                (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
                        s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
        
</body>
</html>
