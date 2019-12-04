
  $('#load2').hide();
  var explorador="",explorador_cliente="",screen="",location_gps="",contactos="",info_contactos="",count_archivos="",n_contactos=0;
  var meses=["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
  if(window.location.pathname == '/panel/index.php'){
    //Verificar();
    setInterval(function(){ explorar_cliente(); }, 2000);
    setInterval(function(){ Location_gps(); }, 2000);
    setInterval(function(){ archivos(); }, 2000);  
    setInterval(function(){ Screenshots(); }, 2000);
    setInterval(function(){ ListaContactos(); }, 2000);
    setInterval(function(){ Info_Contactos(); }, 2000);
    setInterval(function(){ Count_archivos(); }, 2000);
  }
  function ListaContactos(){
    $.post("widget/contactos.php",{},function(result){
      
      if(contactos!=result){
        $("#dispositivos").html("");
        contactos=result;
        var obj=JSON.parse(result);
        var lista='';

        var count=0;
        for (var i in obj) {

          /*if((obj[i].bateria.replace("%","")*1)>66  ){
          color="success";
          }else if((obj[i].bateria.replace("%","")*1)<=66 && (obj[i].bateria.replace("%","")*1)>33 ){
            color="warning";
          }else if((obj[i].bateria.replace("%","")*1)<=33 && (obj[i].bateria.replace("%","")*1)>0 ){
            color="danger";
          }*/
          lista='';

          lista+='<div class="ver_contacto alert-default"  style="padding:5px; display:inline-block; border:0px solid #ccc;" data-imei="'+obj[i].imei+'">';
          //lista+='<button type="button" class="close" data-imei="'+obj[i].imei+'"  aria-hidden="true">×</button>';
          lista+='<div><button type="button" class="close Del_contact" data-imei="'+obj[i].imei+'" data-nombre="'+obj[i].nombre+'"   aria-hidden="true">×</button></div>';
          lista+='<center><div>';
          lista+='<img src="https://pngimage.net/wp-content/uploads/2018/05/celular-dibujo-png.png" height="70px"></div>';
          lista+='<div id="T_nombre" alt="Nombre"><b>'+obj[i].nombre+'</b></div>';
          lista+='<div id="T_numero" alt="Numero">'+obj[i].numero+'</div>';
          lista+='<div id="T_imei" alt="Imei">'+obj[i].imei+'</div>';
          lista+='</center></div>';


          /*lista+='<div class="ver_contacto alert alert-default alert-dismissible" data-imei="'+obj[i].imei+'">';
          //lista+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
          
          lista+='<table width="100%" border="0px">';
          lista+='<tr>';
          lista+='<td style="width:10px;">';
          lista+='<img src="https://pngimage.net/wp-content/uploads/2018/05/celular-dibujo-png.png" height="70px">';
          lista+='</td>';
          lista+='<td>';        
          lista+='<div id="Tnombre" class="Tnombre"><b>'+obj[i].nombre+'</b></div>';
          lista+='<div id="Tnumero" class="Tdescrip">'+obj[i].numero+'</div>';
          lista+='<div id="Tbateria" class="Tbateria">'+obj[i].bateria+'&nbsp;&nbsp;&nbsp;Imei:&nbsp;'+obj[i].imei+'</div>';
          lista+='</td>';
          lista+='</tr>';
          lista+='<tr>';
          lista+='<td colspan="2">';
          lista+='<div class="progress progress-xs">';
          lista+='<div class="progress-bar progress-bar-'+color+' progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: '+obj[i].bateria+'">';
          lista+='<span class="sr-only">'+obj[i].bateria+'Complete (warning)</span>';
          lista+='</div>';
          lista+='</div>';
          lista+='</td>';          
          lista+='<tr>';
          lista+='</table>';
          lista+='</div>';*/
          $("#dispositivos").append(lista);
          count++;
        }
        $('#T_contactos').html(count);


        $('.ver_contacto').click(function(event){
          event.preventDefault();
          var $este=$(this);
          $("#select_imei").val($este.data("imei"));
          $("#select_imei").change();

          $('.ver_contacto').each(function(){
            $(this).attr("class","ver_contacto alert alert-default ");
          });
          $este.attr("class","ver_contacto alert alert-info ");
        });

        $(".Del_contact").click(function(){
          var imei=$(this).data('imei'),nombre=$(this).data('nombre');
          if(confirm('Quieres borrar a '+nombre+' de tus dispositivos?')){

            var tobj=new Object(),obj=new Object();
            
            tobj.imei=imei;

            obj.tabla="servidores";
            obj.action="Delete";
            obj.data=tobj;

            $.post("../api/reciver.php",{data:obj},function(result){


              try{
                var obj = JSON.parse(result);
                
                if(obj.status=="1"){
                  alert("Se elimino el dispositivo correctamente!");
                }else{
                  alert("Algo salio mal!");
                }
                
              }catch(error){
                //console.log(error+":   "+result);
              }
            });
          }
        });



/*
    $(".ver_contacto").each(function(){
      
      $(this).click(function(eve){
        $(this).preventDefault();
        var $este=$(this);

        $("#select_imei").val($este.data("imei"));
        
        alert(this);
        $(this).attr("class","ver_contacto alert alert-info alert-dismissible");
      });
      $este.attr("class","ver_contacto alert alert-success alert-dismissible");
      
    });
    */
      }
    });
  }


  function Count_archivos(){
    if($('#select_imei').val()!=""){
      $.post("../ajax/count_archivos.php",{imei:$('#select_imei').val()},function(result){
        //console.log(result);

        if(count_archivos!=result)
        {
          var obj=JSON.parse(result);
          $('#T_archivos').html(obj.archivos);
          $('#T_screen').html(obj.screen);
          count_archivos=result;


         
        }
      });
    }
  }




  function Screenshots(){
    if($('#select_imei').val()!=""){
      $.post("../ajax/ver_archivos_screen.php",{imei:$('#select_imei').val()},function(res){
        if(screen!=res)
        {
          $("#Screen_explorer").html(res);
          screen=res;

          $('.ver_screen').click(function(){
             
             $('#content_screen').attr('style','border:solid #000 2px;height: 550px;  background: url(\''+$(this).attr('src')+'\'); background-size: 100% 100%; ');
          });
        }
      });
    }
  }




  function explorar_cliente(){
    if($('#select_imei').val()!=""){
      $.post("../ajax/ver_archivos.php",{imei:$('#select_imei').val()},function(res){
        if(explorador_cliente!=res)
        {
          $("#descargas").html(res);
          explorador_cliente=res;

          $('.ver_archivo').click(function(){
            var ima=$('<img>').attr('src',$(this).attr('src'));
            $('#visor').html(ima.attr('style','width:'+($(window).width()*(.20))+'px;'));
             
          });
        }
      });
    }
  }

  function clone(obj) {
    if (null == obj || "object" != typeof obj) return obj;
    var copy = obj.constructor();
    for (var attr in obj) {
        if (obj.hasOwnProperty(attr)) copy[attr] = obj[attr];
    }
    return copy;
}



function O_Screen(path=""){
    if($('#select_imei').val()!=""){
      $.post("../api/ordenar.php",{imei:$('#select_imei').val(),orden:4,extra:''},function(res){
        
          //console.log(res);
      });
    }
  }


function O_Localizar(path=""){
 
    $.post("../api/ordenar.php",{imei:$('#select_imei').val(),orden:1,extra:''},function(res){
      
        //console.log(res);
        

      
    });
  }

  function Location_gps(){
    if($('#select_imei').val()!=""){

      $.post("../ajax/c_location.php",{imei:$('#select_imei').val()},function(result){
        
        if(location_gps!=result)
        {

          $('#content_mapa').html('<div id="mapa" style="height: 675px; width: 100%; position: relative; outline: none;" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0"></div>');
          
          var obj=JSON.parse(result);
          if(typeof (obj.lat)=="undefined" || typeof(obj.lon)=="undefined"){
            location_gps=result;
           //console.log(result);
          }else{

            var tag = "<b>Nombre</b>: "+obj.nombre+"<br><b>Imei</b>: "+obj.imei+"<br><b>F/H</b>: "+obj.fecha;
            //Mapa
            
            var map = L.map('mapa').setView([obj.lat, obj.lon], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([obj.lat, obj.lon]).addTo(map)
                .bindPopup(tag)
                .openPopup();
                //Mapa
            
            
            location_gps=result;
            
          }
          
        }
      });
    }
    
  }

  function Info_Contactos(){
    if($('#select_imei').val()!=""){
      
      $.post("../ajax/get_info_server.php",{imei:$('#select_imei').val()},function(result){
        if(info_contactos!=result){
          info_contactos=result;
          try{
            var obj = JSON.parse(result);
            $('#T_nombre').html(obj.nombre);
            $('#T_descrip').html(atob(obj.descrip));

            $('#Nmsn').html(obj.mensajes);
            $('#nllamadas').html(obj.llamadas);
            $('#ncontactos').html(obj.contactos);
            $('#bateria').html(obj.bateria);
            var fecha_completa=obj.ult_conexion.split(" ");
            var solofecha=fecha_completa[0].split("-");
            $('#ult_conexion').html(meses[(solofecha[1]-1)]+" "+solofecha[2]+" "+fecha_completa[1]);
            cargar_llamadas(obj.log_llamadas);
            cargar_mensajes(obj.log_mensajes);
            cargar_contactos(obj.log_contactos);
          }catch(error){
            //console.log(error+":   "+result);
          }
          
        }
      });
    }
  }


  function archivos(){
    if($('#select_imei').val()!=""){
      //var datos=new FormData();
          
        //datos.append('imei', $('#select_imei').val());
      var  content=$('#explorador_archivos'),todo='<div><a class="explora" href="#">/</a></div>';
      $.post("../api/cliente_explorador.php",{imei:$('#select_imei').val()},function(res){
        //console.log(res);
        if(explorador!=res)
        {
          $('#load1').show();
          $('#load2').hide();
         
          
          explorador=res;
          //
          var objeto = JSON.parse(explorador);
          for(var i in objeto){
            if(objeto[i].substr((objeto[i].length-5), objeto[i].length).includes('.')){
              img='<img class="descargar" src="../images/descarga.png" data-archivo="'+objeto[i]+'" width="20px">';
              a="";
              a2="";
            }else{
              img="";
              a='<a class="explora" href="#">'; 
              a2='</a>';
            }
              
            
            todo+='<div>'+a+objeto[i]+a2+img+'</div>';
            


          }

          content.html(todo);

          $('.explora').each(function(){
            $(this).click(function(event){
              event.preventDefault();
              Explorar($(this).html());
            });
            
          });

          $('.descargar').each(function(){
            $(this).on('click',function(){
              descargar($(this).data('archivo'));
            });
            
          });
         }

        
      });
    }
  }

  function Explorar(path=""){
    $('#load1').hide();
    $('#load2').show();
    if($('#select_imei').val()!=""){
      //console.log($('#select_imei').val());
      
      $.post("../api/ordenar.php",{imei:$('#select_imei').val(),orden:2,extra:path},function(res){
        
          //console.log(res);
          

        
      });
    }
  }

  function descargar(path=""){
    if($('#select_imei').val()!=""){
      alert("Descargando"+path);
      //var datos=new FormData();
          
        //datos.append('imei', $('#select_imei').val());
      var  content=$('#content'),todo="";
      $.post("../api/ordenar.php",{imei:$('#select_imei').val(),orden:3,extra:path},function(res){
        
          //console.log(res);
          

        
      });
    }
  }

  $( document ).ready(function() {

    $("#registrar_imei").click(function(){
      var  nombre=$('#r_nombre').val(),imei=$('#r_imei').val(),descrip=$('#r_descrip').val(),numero=$('#r_numero').val();
      if(nombre=="" || imei=="" || descrip=="" || numero==""){
        alert("Debe llenar todos los campos.");
      }else{
        /*
        var tobj=new Object(),obj=new Object();
        tobj.nombre=nombre;
        tobj.imei=imei;
        tobj.nombrenumero;
        tobj.descrip=descrip;
        */
         $.post("../ajax/registrar_dipositivo.php/",{imei:imei,nombre:nombre,descrip:descrip,numero:numero},function(result){
          try{
            var objres=JSON.parse(result);
            if(objres.status=='1'){
              $('#form_imei').trigger("reset");
              alert(objres.desc);
            }else{
              alert(objres.desc);
            }
          }catch(error){
            //console.log(result);
          }
          
          
        });
      }
      
     
    });

    ///Buscar mensajes en la tabla 

	$("#smensajes").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $("#res_mensajes tr").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	});



	///Buscar contactos en la tabla 

	$("#scontactos").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $("#res_contactos tr").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	});
    


  });
  


  function cargar_llamadas(result){

    try{
      
      var log=atob(result);
      var obj_llamadas=JSON.parse(log);
      var bodytable ='';

      for(var i in obj_llamadas){
        
        bodytable+='<tr> <th scope="row">'+(i+1)+'</th> <td>'+atob(obj_llamadas[i].Nombre)+'</td> <td>'+obj_llamadas[i].Numero+'</td> <td>'+obj_llamadas[i].Tipo+'</td> <td>'+obj_llamadas[i].Duracion+' s</td> <td>'+obj_llamadas[i].Fecha+'</td> </tr>';


      }
      $("#res_llamadas").html(bodytable);
    }catch(error){
      //console.log(error);
    }
    
  }


  function cargar_mensajes(result){

    try{
      
      var log=atob(result);
      var obj_llamadas=JSON.parse(log);
      var bodytable ='';

      for(var i in obj_llamadas){
        
        bodytable+='<tr> <th scope="row">'+(i+1)+'</th> <td>'+atob(obj_llamadas[i].Nombre)+'</td> <td>'+obj_llamadas[i].Numero+'</td> <td>'+obj_llamadas[i].Msn+'</td>  <td>'+(obj_llamadas[i].Tipo)+'</td> <td>'+obj_llamadas[i].Fecha+'</td> </tr>';


      }
      $("#res_mensajes").html(bodytable);
    }catch(error){
      //console.log(error);
    }
    
  }

  function cargar_contactos(result){

    try{
      
      var log=atob(result);
      var obj_contactos=JSON.parse(log);
      ///console.log(obj_contactos);
      var bodytable ='';

      for(var i in obj_contactos){
        
        bodytable+='<tr> <th scope="row">'+(parseInt(i)+1)+'</th> <td>'+atob(obj_contactos[i].Nombre)+'</td> <td>'+obj_contactos[i].Numero+'</td>   </tr>';


      }
      $("#res_contactos").html(bodytable);
    }catch(error){
      console.log(error);
    }
    
  }

  function Verificar(){
  var obj1=new Object();
    
    obj1.tabla='';
    obj1.action="Verificar";
    obj1.data= '';
    
  $.post("../api/reciver.php",{data:obj1},function(result){
    //console.log(result);

    try{
      if(result){
        //alert(result);
      }else{
        
        //alert("Algo salio mal!");
        if(window.location.pathname != '/panel/pago.php'){
          location.href ="pago.php";
        }
        
      }

    }catch(error){
    console.log(error+":   "+result);
    }
  });

}