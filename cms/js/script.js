function abrirGeral() {
    $("#geral").show();
    $("#conta").hide();
    $("#reservas").hide();
    $("#feedback").hide();

    $('#btngeral').css("background-color", "#ccc");
    $('#btnconta').css("background-color", "#eee");
    $('#btnreservas').css("background-color", "#eee");
    $('#btnfeedback').css("background-color", "#eee");
}

function abrirConta() {
    $("#geral").hide();
    $("#conta").show();
    $("#reservas").hide();
    $("#feedback").hide();

    $('#btngeral').css("background-color", "#eee");
    $('#btnconta').css("background-color", "#ccc");
    $('#btnreservas').css("background-color", "#eee");
    $('#btnfeedback').css("background-color", "#eee");
}

function abrirReservas() {
    $("#geral").hide();
    $("#conta").hide();
    $("#reservas").show();
    $("#feedback").hide();

    $('#btngeral').css("background-color", "#eee");
    $('#btnconta').css("background-color", "#eee");
    $('#btnreservas').css("background-color", "#ccc");
    $('#btnfeedback').css("background-color", "#eee");
}

function abrirFeedback() {
    $("#geral").hide();
    $("#conta").hide();
    $("#reservas").hide();
    $("#feedback").show();

    $('#btngeral').css("background-color", "#eee");
    $('#btnconta').css("background-color", "#eee");
    $('#btnreservas').css("background-color", "#eee");
    $('#btnfeedback').css("background-color", "#ccc");
}

function fecharModalFaleConosco() {
    $("#modalVisualizar").hide();
    $("#shadowBg").hide();
}

function abrirModalFaleConosco() {
    $("#modalVisualizar").show();
    $("#shadowBg").show();
}

function abrirModalFuncionarios(){
    $('.bgModalFuncionario').fadeIn(200, function(){
    });
}

function fecharModalFuncionarios(){
    $('.bgModalFuncionario').fadeOut(200, function(){
    });
}

function buscarFuncionario() {
    $("#bscFuncionario").keyup(function() {
        var nome = $('#bscFuncionario').val();
        if (!bscFuncionario == "") {
            $.post('../api/busca_funcionario.php', {'funcionario':nome}, function(data) {
              $(".boxdetalhes").html(data);
            });
        }

    });
}

function readURL(input,nth) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.imgPreview'+nth+' img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
