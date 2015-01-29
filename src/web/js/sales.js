/**
 * Objeto Global
 */
 var $SALES={};
 
/**
 * Sobmodulo UI
 */
$SALES.UI=(function()
{
	/**
	 * @access public
	 */
	function init()
	{
            _ready();
            _clickElement();
            _changeElement();
            
	}
        /* @type type 
        * start app
        * */
        function _ready()
        {
           
        }
        
        function _clickElement() 
        {
            $('#startSesion, label#newBikeCustomer,label#newCustomer, div#customer_existence img#update').on('click',function(e)
            {
                e.preventDefault();
                switch ($(this).attr("id"))
                {
                    case "startSesion":
                        $('.contentBodyLogin').slideDown("slow");
                        break;
                    case "update":
                        if($("#Customer_id_doc").val()!="")
                            $SALES.AJAX.send("GET","/Customer/CheckCustomer",$("#Customer_id_doc").serialize(),"Customer_id_doc"); 
                        else
                            $SALES.UI.msj("","");$SALES.UI.msjChange("<h2>Faltan campos por llenar </h2>","stop.png","1000","38px");  
                        break;
                    case "newBikeCustomer":
                        $SALES.AJAX.send("GET","/BikeDescription/New",null,$(this).attr("id")); 
                        break;
                    case "newCustomer":
                        console.log("ajaaaa");
                        $SALES.AJAX.send("GET","/Customer/New",null,$(this).attr("id")); 
                        break;
                }   
            });
        }
        function _changeElement() 
        {
            $('input#Product_price,input#Product_total_price,input#Service_price,input#Service_total_price, div#customer_existence input#Customer_id_doc').change(function()
            {
                console.log($(this).val());
                switch ($(this).attr("id"))
                {
                    case "Product_price":case "Product_total_price":case "Service_price":case "Service_total_price":         
                        var tax=$("select#Product_tax,select#Service_tax").val()/100, total=$('input#Product_total_price,input#Service_total_price'), price=$("input#Product_price,input#Service_price");
                        if(/total/.test($(this).attr("id")))
                            price.val( ( parseFloat(total.val()) - parseFloat(total.val() * tax) ).toFixed(2) );
                        else
                            total.val( ( parseFloat(price.val() * tax) + parseFloat(price.val()) ).toFixed(2) );
                        break;
//                    case "Customer_id_doc":
//                        if($("#Customer_id_doc").val()!="")
//                            $SALES.AJAX.send("GET","/Customer/CheckCustomer",$("#Customer_id_doc").serialize(),$(this).attr("id")); 
//                        else
//                            console.log("el input esta vacio");
//                        break;
                }   
            });
        }
        /**
        * 
        * @param {type} tipe
        * @returns {unresolved}
        */
        function actionAdminAccording(type)
	{  
            console.log('paso por aca');
           switch (type){
            case "createCustomer"://formulario de crear nuevo cliente
                var reply=$SALES.UI.validInputs($('#customer-form input#Customer_name, #customer-form input#Customer_last_name, #customer-form input#Customer_id_doc, #customer-form input#Customer_addres').serializeArray());
                break;
           }
           return reply;
        }
          /**
	 * Valida los input y select del formulario- 1
	 * @access public
	 * @param  inputs
	 */
	function validInputs(inputs)
	{  
            for (var i=0, j=inputs.length - 1; i <= j; i++)
            {
                if(inputs[i].value==""){
                    console.dir(inputs[i]);
                    var reply=0;
                    break;
                 }else{reply=1;}
            };
            if(reply==0){$SALES.UI.msj("","");$SALES.UI.msjChange("<h2>Faltan campos por llenar </h2>","stop.png","1000","38px");  }
            return reply;
        }
        function runAction(option,data) 
        {
            switch (option)
                {
                    case "Customer_id_doc":   
                        $("div.contentUpdate, h2.error").html("").hide("fast");$("label#newBikeCustomer,label#newCustomer").hide("fast");
                        var obj=JSON.parse(data);
                        if(obj.basicData!=null){
                            $("div.contentUpdate").append(obj.basicData);
                            if(obj.dataBike!=null){
                                $("div.contentUpdate").append(obj.dataBike);
                            }else{
                                $("h2.error").html('No hay motos asociadas, seleccione el enlace "Agregar moto" para continuar');
                            }
                            $("div.contentUpdate, h2.error, label#newBikeCustomer").show("slow");
                        }else{
                            $("div.contentUpdate, label#newBikeCustomer").hide("fast");
                            $("h2.error").html('El cliente que intenta consultar no esta registrado en sistema, por favor seleccione el enlace "Agregar Cliente"');
                            $("h2.error, label#newCustomer").show("slow");
                        }
                        break;
                    case "newBikeCustomer":   
                        $SALES.UI.msj("","");$SALES.UI.emergenView(data,true); 
                        break;
                    case "newCustomer":           
                        console.log("si paso por nuevo customer");
                        $SALES.UI.msj("","");$SALES.UI.emergenView(data); 
                        $("form#customer-form div.buttons input").attr("id","createCustomer");
                        $SALES.UI.whenAjax();
                        break;
                    case "BikeDescription_id_brand_bike":       
                        console.log(data);
                        $("#BikeDescription_id_model_bike").html(data);
                        break;
                    case "createBikeCustomer": 
                        $SALES.AJAX.send("GET","/Customer/CheckCustomer",$("#Customer_id_doc").serialize(),"Customer_id_doc"); 
                        $(".emergenView,.backgroundBlack").fadeOut("fast");
                        $SALES.UI.msj("","");$SALES.UI.msjChange("<h2>Moto agregada al cliente</h2>","confirm.png","2000","120px");
                        break;
                    case "createCustomer":
                        var obj=JSON.parse(data);
                        console.log(obj.idDoc);
                        if(obj.confirm=="1"){
                            $SALES.AJAX.send("GET","/Customer/CheckCustomer",$("#Customer_id_doc").val(obj.idDoc).serialize(),"Customer_id_doc"); 
                            $(".emergenView,.backgroundBlack").fadeOut("fast");
                            $SALES.UI.msj("","");$SALES.UI.msjChange("<h2>Nuevo cliente guardado con Éxito!</h2>","confirm.png",3000,"120px");
                        }if(obj.confirm=="0"){
                            $SALES.UI.msj("","");$SALES.UI.msjChange("<h2> Ocurrio un problema al guardar el carrier, revise la información ingresada</h2>","stop.png",3000,"20px");
                        }if(obj.confirm=="2"){
                            $SALES.UI.msj("","");$SALES.UI.msjChange("<h2>Ya existe un cliente llamado: <b>"+obj.name+" "+obj.lastName+"</b> con la cedula: <b>"+obj.idDoc+"</b></h2>","stop.png",3000,"20px");
                        }
                        console.log(data);
                        break;
                    default:
                        console.log(data);
                        console.log(option);
                        break;
                }   
        }
        function msj(bodyMsj,img)
        {
            $(".msjBackgroundBlack, .msj").remove();
            var msj=$("<div class='msjBackgroundBlack'></div><div class='msj'>"+bodyMsj+"<p><br><img src='/images/"+img+"'></div>").hide(); 
            $("body").append(msj); 
            msj.slideDown('fast');
        }
        function msjChange(bodyMsj,img,time,imgWidth)
        {
            $(".msj").html(""+bodyMsj+"<p><img style='width:"+imgWidth+";' src='/images/"+img+"'>");
            setTimeout(function() { $(".msjBackgroundBlack, .msj").fadeOut('slow'); }, time);
        }
        function fancyBox(body)
        {
            $(".msj").addClass("fancybox").removeClass("msj");
            $(".fancybox").css("display", "none");
            $(".fancybox").slideDown("slow").html("<div class='print'><img src='/images/print.png'class='ver'></div><div class='toPrint'>"+body+"</div>");
            $('.print').on('click',function (){ SALES.UI.print(".toPrint"); });
            $('.backgroundBlack,.msjBackgroundBlack').on('click',function () { $(".msjBackgroundBlack,.backgroundBlack, .fancybox").fadeOut('slow');});
        }
        function emergenView(body,size)
        {
            $(".emergenView,.backgroundBlack,.emergenViewShort").remove();
            $(".msj").addClass("emergenView").removeClass("msj");
            $(".emergenView").css("display", "none").html(body).slideDown("fast");
            if(size===true)$(".emergenView").addClass("emergenViewShort");
            $('.msjBackgroundBlack').addClass("backgroundBlack").removeClass("msjBackgroundBlack");
            $('.backgroundBlack').on('click',function () { $(".backgroundBlack, .emergenView, .emergenViewShort").hide('fast');});
        }
        function print(toPrint)
        {
            var print,
            contenido=$(toPrint).clone().html();                   //selecciona el objeto
            print = window.open(" SALES ","Formato de Impresion"); // titulo
            print.document.open();                                 //abre la ventana
            //print.document.write('style: ...');                  //css
            print.document.write(contenido);                       //agrega el objeto
            print.document.close();
            print.print();                                         //Abre la opcion de imprimir
            print.close();                                         //cierra la ventana nueva
        };
        
        function whenAjax()
	{
            _clickElementAjax();
            _datepickerAjax();
            _changeElementAjax();
	}
        /**
         * 
         * @returns {undefined}
         */
        function _clickElementAjax() 
        {
            console.log("paso al click ajax");
            $('tr.bikeDescription, div.createBikeCustomer, input#createCustomer').on('click',function(e)
            {
                e.preventDefault();
                switch ($(this).attr("class"))
                {
                    case "bikeDescription":
                        console.log($(this).attr("class"));
                        break;
                    case "createBikeCustomer":
                        $("input#id_doc_customer").val($("input#Customer_id_doc").val());
                        console.log($("input#id_doc_customer").val());
                        $SALES.AJAX.send("GET","/BikeDescription/SaveBikeDescription",$("#bike-description-form").serialize(),$(this).attr("class")); 
                        break;
                }   
                switch ($(this).attr("id"))
                {
                    case "createCustomer":
                        console.log("si tomo el click");
                        if($SALES.UI.actionAdminAccording("createCustomer")==1)
                        {
                            console.log("siiiiiiiiiiiiiiiiii");
                            $SALES.AJAX.send("GET","/Customer/CreateCustomer",$("#customer-form").serialize(),$(this).attr("id")); 
                        }else{
                            console.log("nooooooooooooooooooo");
                        }
                        break;
                }   
            });
        }
        /**
         * 
         * @returns {undefined}
         */
        function _changeElementAjax() 
        {
            $('#BikeDescription_id_brand_bike').change(function()
            {
                $SALES.AJAX.send("GET","/ModelBike/GetModelForBrand",$(this).serialize(),$(this).attr("id"));
            });
        }
        /**
         * 
         * @returns {undefined}
         */
        function _datepickerAjax()
        {
            $("#test").datepicker({dateFormat: "yy mm dd", maxDate: "-0D" });
        }
	/**
	 * Retorna los mestodos publicos
	 */
	return{
		init:init,
		whenAjax:whenAjax,
                runAction:runAction,
                msj:msj,
                msjChange:msjChange,
                fancyBox:fancyBox,
                emergenView:emergenView,
                print:print,
                actionAdminAccording:actionAdminAccording,
                validInputs:validInputs
                
	};
})();

/**
 * Submodulo de llamadas AJAX
 */
$SALES.AJAX=(function()
{	
        /**
         * 
         * @param {type} type
         * @param {type} action
         * @param {type} formulario
         * @param {type} option
         * @returns {undefined}
         */
	function send(type,action,formulario,option)
        {
            $.ajax({
                 type: type,
                 url: action,
                 data: formulario,
                 success: function(data)
                 {   
                    $SALES.UI.runAction(option, data);
                 }
            });
        }
	/**
	 * retorna los metodos publicos*/
        return{
                send:send
	}
})();

/**
 * Submodulo de utilidades
 */
$SALES.UTILS=(function()
{
	
	/**
	 * retorna los metodos y variables publicos
	 */
	return{
//		updateMontoAprobadoDisp:updateMontoAprobadoDisp
	}
})();

$SALES.constructor=(function()
 {
    $SALES.UI.init();
 })();