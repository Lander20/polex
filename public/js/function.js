$(document).ready(function(){
    if(window.location.pathname=="/login"){
        $.AdminBSB.input.activate();

        $.AdminBSB.dropdownMenu.activate();
    }
    else{
        $.AdminBSB.browser.activate();
        $.AdminBSB.leftSideBar.activate();
        $.AdminBSB.rightSideBar.activate();
        $.AdminBSB.navbar.activate();
        $.AdminBSB.dropdownMenu.activate();
        $.AdminBSB.input.activate();
        //$.AdminBSB.select.activate();
        $.AdminBSB.search.activate();
    }
    setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 50);

    if($("#value-activate").length){
        $("section.content").attr("style","margin: 100px 15px 0 15px");
        //$(".navbar").attr("style","display:none");
        $("#leftsidebar").attr("style","display:none");
    }

    materialId = materialSelect("id");
    arrX=[];
    arrY=[];

    arrX[materialId]=[];
    arrY[materialId]=[];


    $("#material option").each(function (i) {
        var idMat=$(this).attr("id");
        $("."+idMat).each(function (j) {
            var cantMat = parseInt($("#material #"+idMat).attr("class"))+1;
            $("#material #"+idMat).attr("class",cantMat);
            var stylesA= $(this).attr("style").split(";");
            for(var k=0;k<stylesA.length;k++){
                console.log(idMat);
                if(arrY[idMat]==undefined || arrY[idMat].length==0){
                    arrY[idMat]=[];
                    arrX[idMat]=[];
                }

                if(stylesA[k].indexOf("top") != -1){
                    var porc=stylesA[k].indexOf("%");
                    var val=stylesA[k].substr(4,(porc-4));
                    arrY[idMat][cantMat]=parseFloat(val);
                }
                if(stylesA[k].indexOf("left") != -1){
                    var porc=stylesA[k].indexOf("%");
                    var val=stylesA[k].substr(5,(porc-5));
                    arrX[idMat][cantMat]=parseFloat(val);
                }
            }
        });
    });

    $("#cantidad").text(parseInt(materialSelect("class")));
    $(".i-img").hide();
    $("."+materialSelect("id")).show();

    windowsSize = $(window).width();
    $(window).resize(function() {

        if($(".i-img").length > 0){
            size = $(".i-img").css("font-size");
            size = size.split("px")[0];
            perc= Math.round($(window).width()/windowsSize*100);
            fin = Math.round(perc*size/100);
            $(".i-img").css("font-size",fin+"px");
        }
        windowsSize = $(window).width();
    });

    $(".img-cubicacion").click(function (e) {
        position = $(this).offset();
        position1 = $(this).position();
        var wide = $('.img-cubicacion').width();
        var he = $('.img-cubicacion').height();

        /*var px = position.left;
        var py = position.top;

        var posX = ((px-100)/wide)*100;
        var posY = ((py-100)/wide)*100;*/


        var posX = (e.pageX-position1.left-14) ; //16   //35  57
        var posY = (e.pageY-position1.top-12); //21    //623  640  17

        var posX = (e.pageX-position1.left-10)/($(this).width()+position.left)*100 ; //16   //35  57
        var posY = (e.pageY-position1.top-55)/($(this).height()+position.top-55)*100;

/*

        var posX = ((e.pageX-position.left)/wide)*100 ;
        var posY = ((e.pageY-position.top)/he)*100;
*/

/*
        var posX = ((px/wide)/2)*100;
        var posY = ((py/wide)/2)*100;*/

        /* var relativeX = e.pageX - position.left;
         var relativeY = e.pageY - position.top;
         var wide = $('.img-cubicacion').width();

         var posX = (relativeX*100)/wide;
         var posY = (relativeY*170)/wide;*/

        //Obtengo el Id del material seleccionado
        materialId = materialSelect("id");
        //Obtengo la cantidad del material seleccionado
        cantidadMaterial = parseInt(materialSelect("class"))+1;
        //Actualizo el valor del material y en el input
        $("#material option:selected").attr("class",cantidadMaterial);
        $("#cantidad").text(cantidadMaterial);

        arrX[materialId][cantidadMaterial]=posX;
        arrY[materialId][cantidadMaterial]=posY;

        $("#img-cubicacion-master").append(
            $("<i class='i-img "+materialId+"' id='"+materialId+"'>x</i>")
                .css('top',posY+"%")
                .css('left',posX+"%")
        );
    });

    $("#material").change(function() {
        $(".i-img").hide();
        $("."+materialSelect("id")).show();

        materialId = materialSelect("id");
        cantidadMaterial= parseInt(materialSelect("class"));
        $("#cantidad").text(cantidadMaterial);

        if($.isEmptyObject(arrX[materialId]) && $.isEmptyObject(arrY[materialId])){
            arrX[materialId]=[];
            arrY[materialId]=[];
        }
    });

    $("#btn-guardar-cubicacion").click(function() {
        var materialArray=[];
        /*$("#material option").each(function (i) {
            if(parseInt($(this).attr("class"))>0){
                materialArray[$(this).attr("id").split("-")[1]]= [$(this).attr("class"),arrX[$(this).attr("id")],arrY[$(this).attr("id")]];
            }
        });*/

        var material = materialSelect();
        materialArray[material.attr("id").split("-")[1]]= [material.attr("class"),arrX[material.attr("id")],arrY[material.attr("id")]];

        $.post( "guardar", { '_token': $('meta[name=csrf-token]').attr('content'), material: materialArray })
            .error(function (error) {
                alert("Ha ocurrido un error");
            })
            .done(function(data) {
                alert("Se ha guardado con exito !");
            });

    });

    $("#btn-eliminar-cubicacion").click(function (i) {
        var eliminarMat = [];
        var material = materialSelect("id");

        if(parseInt(materialSelect("class"))==0){
            alert("No hay más elementos");
        }
        else{
            eliminarMat.push(material.split("-")[1]);
            eliminarMat.push($("."+material).length);

            $.post( "eliminar", { '_token': $('meta[name=csrf-token]').attr('content'), materialEliminar: eliminarMat })
                .error(function (error) {
                    alert("Ha ocurrido un error");
                })
                .done(function(data) {
                    var material = materialSelect();
                    var materialId = material.attr("id");

                    arrX[materialId].pop();
                    arrY[materialId].pop();

                    var cantidadMaterial = parseInt(material.attr("class"))-1;
                    $("#material option:selected").attr("class",cantidadMaterial);

                    $("#cantidad").text(parseInt(cantidadMaterial));

                    alert("Se ha eliminado el utlimo elemento(marcado con rojo) con exito !");
                    $("."+materialId).eq($("."+materialId).length-1).addClass("red");
                    $("."+materialId).eq($("."+materialId).length-1).fadeOut("slow");
                    $("."+materialId).eq($("."+materialId).length-1).removeClass(materialId);
                });
        }
    });

    $("#btn-reset-cubicacion").click(function (i) {
        var eliminarMat = [];

        if(parseInt(materialSelect("class"))==0){
            alert("No hay elementos para este material");
        }
        else{
            eliminarMat.push(materialSelect("id").split("-")[1]);

            $.post( "reset", { '_token': $('meta[name=csrf-token]').attr('content'), materialEliminar: eliminarMat })
                .error(function (error) {
                    alert("Ha ocurrido un error");
                })
                .done(function(data) {
                    var material = materialSelect();
                    var materialId = material.attr("id");

                    $("#material option:selected").attr("class",0);

                    arrX[materialId]=[];
                    arrY[materialId]=[];

                    alert("Se han eliminado todos los elementos(marcados con rojo)  del material con exito !");
                    $("."+materialId).addClass("red");
                    $("."+materialId).fadeOut("slow");

                    $("#cantidad").text(0);
                });


        }

    });

    $("#btn-resumen-cubicacion").click(function (i) {

        $.get( "detalle", { '_token': $('meta[name=csrf-token]').attr('content')})
            .error(function (error) {
                alert("Ha ocurrido un error");
            })
            .done(function(data) {
                var html= "<tbody>";
                var item=1;
                $("#material option").each(function (i) {
                    var mat = $(this);
                    var text="";
                    if(arrX[mat.attr("id")]==undefined && arrX[mat.attr("id")]==undefined){

                    }
                    else{
                        if(data[mat.attr("id")]==undefined && parseInt(arrX[mat.attr("id")].length)<2){
                            //text= " <strong style='font-size: 12px;'>&nbsp;&nbsp;[no guardado(s) ]</strong>";
                            //html+="<tr><td>"+mat.val()+"</td><td>"+mat.attr("class")+"/"+mat.attr("class")+"</td></tr>" ;
                        }
                        else/*(data[mat.attr("id")].length != (arrX[mat.attr("id")].length-1))*/{
                            if(data[mat.attr("id")]==undefined){
                                var dif=(arrX[mat.attr("id")].length-1);
                            }
                            else{
                                var dif = (arrX[mat.attr("id")].length-1) - data[mat.attr("id")].length;
                            }
                            //var dif = (arrX[mat.attr("id")].length-1) - data[mat.attr("id")].length;

                            html+="<tr><td>"+item+"</td><td>"+mat.val()+"</td><td>"+mat.attr("class")+"/"+dif+"</td></tr>";
                            /*if(dif!=0){
                                text= " <strong style='font-size: 12px;'>&nbsp;&nbsp;["+dif+" no guardado(s) ]</strong>";
                            }*/
                            item++;
                        }
                    }

                });

                /*$.each($("#material option"),function (i,array) {
                    var mat = $("#material #"+i);
                    var text="";
                    if(array.length != (arrX[mat.attr("id")].length-1)){
                        var dif = (arrX[mat.attr("id")].length-1) - array.length;
                        text= " <strong style='font-size: 12px;'>("+dif+" no guardado"+")</strong>";
                    }
                    html+="<tr><td>"+mat.val()+"</td><td>"+mat.attr("class")+text+"</td></tr>" ;
                });*/
                html+="</tbody>";
                $("#resumen-modal table tbody").replaceWith(html);
                $("#resumen-modal").modal();
            });

    });

    function materialSelect(attr) {
        if(attr==undefined){
            return $("#material option:selected");
        }
        else{
            return $("#material option:selected").attr(attr);
        }
    }


});




