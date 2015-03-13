<?php

/*////////////////////////////////////////////// VISTA ///////////////////////////////////////////////***/
/********************* en la vista yii normalmente usa el  *****************************/
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'events-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id_registro_persona',
		'nombre',
		'apellido',
		'empresa',
		'telefono',
		'correo',
		),
));

/*********************** tu usaras  ***************************/

 $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id'=>'events-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,


	'fixedHeader' => true,
    'headerOffset' => 0,
    'type'=>'striped bordered condensed',
	'cssFile'=>Yii::app()->request->baseUrl.'/css/gridview/styles.css',
	'pager'=>array('cssFile'=>Yii::app()->request->baseUrl.'/css/paginador.css'),
    'ajaxUrl'=>Yii::app()->createUrl("/events/admin"),	
	'afterAjaxUpdate'=>"function(id,data){ $('a.fancybox').fancybox({'scrolling':'auto','transitionIn':'elastic','transitionOut':'elastic','speedIn':600,'speedOut':200,'overlayColor':'#FFFFFF','titlePosition':'outside','centerOnScroll':true}); }",

	'columns'=>array(
		//'id_registro_persona',
		'nombre',
		'apellido',
		'empresa',
		'telefono',
		'correo',
        /**por defecto los botones
        view upate y delete aparecen solo, para agregarles el fance box a esa accion defines los botones
        de esta form: 'template => '{bottom 1} {botton2}' */
		array(
					'header'=>"Acción",	 /*nombre de la columna de los botones*/
					'class'=>'CButtonColumn',
					'template' => "{view} ", /**boton view*/ /**si quieres otro lo colocas ejempo {reparacion}*/
					'buttons'=>array(	
								'view' => array(
									'label'=>'Ver detalles',
									'options'=>array('class'=>'fancybox'),
				 					'url'=>'Yii::app()->createUrl("events/view", array("id"=>$data->id_registro_persona))', /**accion que ejecutara y parametros que le envio*/
				 					'imageUrl'=>Yii::app()->request->baseUrl.'/images/lupa2.png'),  /***imagen para el botono personalzado*/
		//		                 'reparacion' => array(
		//							'label'=>'Reparar Hora',
		//							'options'=>array('class'=>'fancybox'),
		//		 					'url'=>'Yii::app()->createUrl("asistencia/VRecord/reparacion", array("id"=>$data->Logid))',
		//		 					'imageUrl'=>Yii::app()->request->baseUrl.'/images/clock2.png', 
		//		)
				)



		),
	),
)); 

/*******AL FINAL DE LA VISTA********/

$this->widget('application.extensions.fancybox.EFancyBox', array(
                'target'=>'a.fancybox',
                'mouseEnabled'=>false,
                'config'=>array(
                        'scrolling'=> 'auto',
						'transitionIn'=>'elastic',
						'transitionOut'=>'elastic',
						'speedIn'=>	600, 
						'speedOut'=>200, 
						'overlayColor'=>'#022033',
						'titlePosition'=>'outside',
						'centerOnScroll'=>true,
						'overlayColor'=>'#FFFFFF',
					),
                )
        );

/*////////////////////////////////////////////// extensiones ///////////////////////////////////////////////***/

//en el correo te mande las carpetas de extension





/*////////////////////////////////////////////// VISTA ///////////////////////////////////////////////***/








?>