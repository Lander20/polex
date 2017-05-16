$(document).ready(function(){
    materialId = $("#material option:selected").attr("id");
    arrX=[];
    arrY=[];

    arrX[materialId]=[];
    arrY[materialId]=[];

    $(".img-cubicacion").click(function (e) {
        position = $(this).offset();
        posX = (e.pageX - position.left+10);
        posY = (e.pageY - position.top-10);

        //Obtengo el Id del material seleccionado
        materialId = $("#material option:selected").attr("id");
        //Obtengo la cantidad del material seleccionado
        cantidadMaterial = parseInt($("#material option:selected").attr("class"))+1;
        //Actualizo el valor del material y en el input
        $("#material option:selected").attr("class",cantidadMaterial);
        $("#cantidad").val(cantidadMaterial);

        arrX[materialId][cantidadMaterial]=posX;
        arrY[materialId][cantidadMaterial]=posY;

        console.log(arrX);
        console.log(arrY);

        $("#img-cubicacion-master").append(
            $("<i id='"+materialId+"'>x</i>")
                .css('position','absolute')
                .css('top',posY)
                .css('left',posX)
                .css('width','1px')
                .css('height','1px')
                .css('background-color','#000000')
        );

    });

    $("#material").change(function() {
        materialId = $("#material option:selected").attr("id");
        cantidadMaterial= parseInt($("#material option:selected").attr("class"));
        $("#cantidad").val(cantidadMaterial);

        if($.isEmptyObject(arrX[materialId]) && $.isEmptyObject(arrY[materialId])){
            arrX[materialId]=[];
            arrY[materialId]=[];
        }

    });
});