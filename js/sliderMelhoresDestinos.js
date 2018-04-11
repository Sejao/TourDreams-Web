//Slider para página de melhoresDestinos.php

//Slider superior

    var larguraSegura1 = $('#segura').width();
    var larguraSegura2 = $('#segura2').width();
    var larguraUltimas = $('.divUltimas').width();



    if(larguraSegura1 < larguraUltimas){
        $('#btn-prev').hide();
        $('#btn-next').hide();
    }else{
        $('#btn-prev').show();
        $('#btn-next').show();

        if($('#segura').css('margin-left') == '0px'){
            $('#btn-prev').hide();
        }


        function moverDireita(e){
            $('#segura').animate({marginLeft:"-="+200+'px'},200, function(){
            });
            $('#btn-prev').show(200,function(){
                //completo
            });

            e.disabled = true;

            //Habilita novamente após dois segundos (2000) ms
            setTimeout(function(){
              toggleDisabled(e)
          },200);

            function toggleDisabled(elem){
                elem.disabled = !elem.disabled;
            }
        }

        function moverEsquerda(e){
            $('#segura').animate({marginLeft:"+="+200+"px"},200, function(){
            });
            if($('#segura').css('margin-left') == '-200px'){
                $('#btn-prev').hide();
            }

            e.disabled = true;

            //Habilita novamente após dois segundos (2000) ms
            setTimeout(function(){
              toggleDisabled(e)
          },200);

            function toggleDisabled(elem){
                elem.disabled = !elem.disabled;
            }

        }



    }


    if(larguraSegura2 < larguraUltimas){
        $('#btn-ant').hide();
        $('#btn-prox').hide();
    }else{
        $('#btn-ant').show();
        $('#btn-prox').show();

        if($('#segura2').css('margin-left') == '0px'){
            $('#btn-ant').hide();
        }

        function moverDireita2(e){
            $('#segura2').animate({marginLeft:"-="+200+'px'},200, function(){
            });
            $('#btn-ant').show(200,function(){
                //completo
            });
            e.disabled = true;

            //Habilita novamente após dois segundos (2000) ms
            setTimeout(function(){
              toggleDisabled(e)
          },200);

            function toggleDisabled(elem){
                elem.disabled = !elem.disabled;
            }
        }

        function moverEsquerda2(e){
            $('#segura2').animate({marginLeft:"+="+200+"px"},200, function(){
            });
            if($('#segura2').css('margin-left') == '-200px'){
                $('#btn-ant').hide();
            }
            e.disabled = true;

            //Habilita novamente após dois segundos (2000) ms
            setTimeout(function(){
              toggleDisabled(e)
          },200);

            function toggleDisabled(elem){
                elem.disabled = !elem.disabled;
            }
        }




    }
