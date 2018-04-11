var cont = 1;

    $('#tableEsquerda img').click(function(){
        var altura = $('#sectionConteudo').css('height');
        if(cont < 10){
            var x = cont - 1;

            $("input[name='fileFoto"+x+"']").after("<p><input required id='inputFile' type='file' name='fileFoto"+cont+"'></p>");

            var qtdImagens = parseInt($("#txtQtdImg").val());
            $("#txtQtdImg").val(qtdImagens+1);


            $('#sectionConteudo').css('height', '+=60');
            $('#containerEsquerda').css('height', '+=60');
            cont++;
        }else{
            alert("No máximo 10 imagens!!!");
        }
    });



$('#tableEsquerda input[name="txtCheckin"]').mask("00:00");
$('#tableEsquerda input[name="txtCheckout"]').mask("00:00");
