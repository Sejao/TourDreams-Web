//Inicia a biblioteca WOW (js/wow.min.js)
new WOW().init();

//Realiza as funções após o carregamento da página
$("document").ready(function(){
    carregarRedesSociais();
    $("#perguntasbox").accordion();
    $("#filtros").accordion({heightStyle: "content" });
    carregarPickers();
    busca();
    buscaConheca();
    mascaras();
    validarLogin();
    buscaAvancada();
});

//Função cria os datepickers do JqueryUI (página reserva.php)
function carregarPickers() {
    var hoje = new Date();
    $( ".datepicker" ).datepicker({                                             //datepicker com formato brasileiro
    dateFormat: 'dd/mm/yy',
    minDate: hoje,
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
    });

    $(".monthPicker").datepicker({                                              //monthpicker com formato brasileiro
        dateFormat: 'MM yy',
        minDate: hoje,
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
        nextText: 'Próximo',
        prevText: 'Anterior',

        //Coleta os dados do mês selecionado e preenche o input
        onClose: function(dateText, inst) {
            var month = Number($("#ui-datepicker-div .ui-datepicker-month :selected").val())+1;
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            month = '' + month;
            if(month.length == 1)
            {
                month = '0'+month;
            }
            $(this).val(month+'/'+year);
        }
    });

    //Desabilita a exibição das datas
    $(".monthPicker").focus(function () {
        $(".ui-datepicker-calendar").hide();
        $("#ui-datepicker-div").position({
            my: "center top",
            at: "center bottom",
            of: $(this)
        });
    });
}

//Carrega as animações das redes sociais no rodapé
function carregarRedesSociais() {
    $("#face").mouseover(function(){
         $("#face").attr("src","imagens/faceAzul.svg");
    });
    $("#face").mouseout(function(){
         $("#face").attr("src","imagens/faceBranco.svg");
    });

    $("#twitter").mouseover(function(){
         $("#twitter").attr("src","imagens/twitterAzul.svg");
    });

    $("#twitter").mouseout(function(){
         $("#twitter").attr("src","imagens/twitterBranco.svg");
    });

     $("#youtube").mouseover(function(){
         $("#youtube").attr("src","imagens/youtubeVermelho.svg");
    });

    $("#youtube").mouseout(function(){
         $("#youtube").attr("src","imagens/youtubeBranco.svg");
    });

    $("#insta").mouseover(function(){
         $("#insta").attr("src","imagens/instaColorido.svg");
    });

    $("#insta").mouseout(function(){
         $("#insta").attr("src","imagens/instaBranco.svg");
    });

    $("#gmail").mouseover(function(){
         $("#gmail").attr("src","imagens/gmailVermelho.svg");
    });

    $("#gmail").mouseout(function(){
         $("#gmail").attr("src","imagens/gmailBranco.svg");
    });
}

//Função abre e fecha o menu de login do cabeçalho
function headerLogin() {
    $("#headerMoeda:visible").toggle();
    $('#headerLogin').animate({
          height: "toggle",
          opacity: "toggle"
      }, 250);
}

//Função abre e fecha o menu de moeda do cabeçalho
function headerMoeda() {
    $("#headerLogin:visible").toggle();
    $('#headerMoeda').animate({
          height: "toggle",
          opacity: "toggle"
      }, 250);
}

//Função abre e fecha o modal de busca
function abrirBusca() {
    var destino = $("#txtDestino").val();
    $("#txtDestinoAvancado").val(destino);                                      //Coleta os dados do input de busca simples do cabeçalho
    $("#buscaAvancadaBackground").toggle();
}

//Função leva o slider de conteúdo ao conteúdo das informações de contato
//(página faleconosco.php)
function irContato() {
    if (!$("#slider").is(':animated'))                                          //Verifica se uma animação está em progresso
    {
        var left = $("#contato").offset().left;
        if (left == -1920)
        {
            $("#contato").animate(
                {marginLeft: "+=1920px", queue: false}, 500
            );
            $("#faq").animate(
                {marginLeft: "+=1920px", queue: false}, 500
            );
            $("#form").animate(
                {marginLeft: "+=1920px", queue: false}, 500
            );
            $("#formcat").animate(
                {marginLeft: "+=1920px", queue: false}, 500
            );
        }
        if (left == -3840)
        {
            $("#contato").animate(
                {marginLeft: "+=3840px", queue: false}, 1000
            );
            $("#faq").animate(
                {marginLeft: "+=3840px", queue: false}, 1000
            );
            $("#form").animate(
                {marginLeft: "+=3840px", queue: false}, 1000
            );
            $("#formcat").animate(
                {marginLeft: "+=3840px", queue: false}, 1000
            );
        }
        if (left == -5760)
        {
            $("#contato").animate(
                {marginLeft: "+=5760px", queue: false}, 1500
            );
            $("#faq").animate(
                {marginLeft: "+=5760px", queue: false}, 1500
            );
            $("#form").animate(
                {marginLeft: "+=5760px", queue: false}, 1500
            );
            $("#formcat").animate(
                {marginLeft: "+=5760px", queue: false}, 1500
            );
        }
    }
}

//Função leva o slider de conteúdo ao conteúdo da FAQ (página faleconosco.php)
function irFAQ() {
    if (!$("#slider").is(':animated'))                                          //Verifica se uma animação está em progresso
    {
        var left = $("#faq").offset().left;
        if (left == 1920)
        {
            $("#contato").animate(
                {marginLeft: "-=1920px", queue: false}, 500
            );
            $("#faq").animate(
                {marginLeft: "-=1920px", queue: false}, 500
            );
            $("#form").animate(
                {marginLeft: "-=1920px", queue: false}, 500
            );
            $("#formcat").animate(
                {marginLeft: "-=1920px", queue: false}, 500
            );
        }
        if (left == -1920)
        {
            $("#contato").animate(
                {marginLeft: "+=1920px", queue: false}, 500
            );
            $("#faq").animate(
                {marginLeft: "+=1920px", queue: false}, 500
            );
            $("#form").animate(
                {marginLeft: "+=1920px", queue: false}, 500
            );
            $("#formcat").animate(
                {marginLeft: "+=1920px", queue: false}, 500
            );
        }
        if (left == -3840)
        {
            $("#contato").animate(
                {marginLeft: "+=3840", queue: false}, 1000
            );
            $("#faq").animate(
                {marginLeft: "+=3840px", queue: false}, 1000
            );
            $("#form").animate(
                {marginLeft: "+=3840px", queue: false}, 1000
            );
            $("#formcat").animate(
                {marginLeft: "+=3840px", queue: false}, 1000
            );
        }

    }
}

//Função leva o slider de conteúdo ao conteúdo de seleção de categoria de
//formulário(página faleconosco.php)
function irForm() {
    if (!$("#slider").is(':animated'))                                          //Verifica se uma animação está em progresso
    {
        var left = $("#form").offset().left;
        if (left == 1920)
        {
            $("#contato").animate(
                {marginLeft: "-=1920px", queue: false}, 500
            );
            $("#faq").animate(
                {marginLeft: "-=1920px", queue: false}, 500
            );
            $("#form").animate(
                {marginLeft: "-=1920px", queue: false}, 500
            );
            $("#formcat").animate(
                {marginLeft: "-=1920px", queue: false}, 500
            );
        }
        if (left == 3840)
        {
            $("#contato").animate(
                {marginLeft: "-=3840px", queue: false}, 1000
            );
            $("#faq").animate(
                {marginLeft: "-=3840px", queue: false}, 1000
            );
            $("#form").animate(
                {marginLeft: "-=3840px", queue: false}, 1000
            );
            $("#formcat").animate(
                {marginLeft: "-=3840px", queue: false}, 1000
            );
        }
        if(left == -1920)
        {
            $("#contato").animate(
                {marginLeft: "+=1920px", queue: false}, 500
            );
            $("#faq").animate(
                {marginLeft: "+=1920px", queue: false}, 500
            );
            $("#form").animate(
                {marginLeft: "+=1920px", queue: false}, 500
            );
            $("#formcat").animate(
                {marginLeft: "+=1920px", queue: false}, 500
            );
        }
    }
}

//Função leva o slider de conteúdo ao conteúdo de formulário (página
//faleconosco.php)
function abrirFormulario(categoria)
{
    if (!$("#slider").is(':animated'))                                          //Verifica se uma animação está em progresso
    {
        $("#contato").animate(
            {marginLeft: "-=1920px", queue: false}, 500
        );
        $("#faq").animate(
            {marginLeft: "-=1920px", queue: false}, 500
        );
        $("#form").animate(
            {marginLeft: "-=1920px", queue: false}, 500
        );
        $("#formcat").animate(
            {marginLeft: "-=1920px", queue: false}, 500
        );

        $("#slcCategoria").val(categoria);
    }
}

//Função coleta o nome do estado selecionado via seu parâmetro e exibe o texto
function abrirEstado(estado) {
    $('#descricaoEstado').css("visibility", "visible");
    $('#nomeEstado').text(estado);
}

//Função remove a exibição do nome do estado se nenhum estado estiver selecionado
function fecharEstado() {
    $('#descricaoEstado').css("visibility", "hidden");
}

//Função exibe o registro de usuário (página registroUsuario.php)
function abrirRegistroUsuario() {
    $('#btnRegistroBox').hide();
    $('#tblRegistroUsuario1').show();
}

//Função abre a segunda página de registro de usuário (página registroUsuario.php)
function abrirRegistroUsuario2() {
    var status = 0;
    if($('#txtLogin').val() != '' && $('#txtSenha').val() != '' && $('#txtNome').val() != '') //Verifica se os campos estão preenchidos
    {
        status = 1;
    }
    if($('#imgvalidacao').attr('src') == 'imagens/naook.svg')
    {
        status = 0;
    }

    if (status == 1)
    {
        $('#tblRegistroUsuario1').hide();
        $('#tblRegistroUsuario2').show();
    }
    else
    {
        $("#msgUsuario1").text("Preencha todos os campos obrigatórios corretamente.");
    }
}

//Função exibe o campo de CPF e oculta o campo de RG (página registroUsuario.php)
function abrirCPF() {
    $('.txtRg').hide();
    $('.txtCpf').show();
}

//Função exibe o campo de RG e oculta o campo de CPF (página registroUsuario.php)
function abrirRG() {
    $('.txtRg').show();
    $('.txtCpf').hide();
}

//Função abre a terceira página de registro de usuário (página registroUsuario.php)
function abrirRegistroUsuario3() {
    var status = 0;
    var statusRad = 0;
    if($('#txtEmail').val() != '' && $('#txtCelular').val() != ''  && $('#txtEmail').val().match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/))              //Verifica se os campos estão preenchidos
    {
        status = 1;
    }

    if($('#radCpf').is(':checked')) {
        if($('#txtCpf').val() != '')
        {
            statusRad = 1;
        }
     }
    if($('#radRg').is(':checked')) {
         if($('#txtRg').val() != '')
         {
             statusRad = 1;
         }
     }

    if (status == 1 && statusRad == 1)
    {
        $('#tblRegistroUsuario2').hide();
        $('#tblRegistroUsuario3').show();
    }
    else
    {
        $("#msgUsuario2").text("Preencha todos os campos obrigatórios corretamente.");
    }
}

//Função abre a página de registro de parceiro (página registroUsuario.php)
function abrirRegistroParceiro() {
    $('#btnRegistroBox').hide();
    $('#tblRegistroParceiro1').show();
}

//Função abre a segunda página de registro de parceiro (página registroUsuario.php)
function abrirRegistroParceiro2() {
    var status = 0;

    if($('#txtLoginParceiro').val() != '' && $('#txtSenhaParceiro').val() != '' && $('#txtNomeParceiro').val() != '')  //Verifica se os campos estão preenchidos
    {
        status = 1;
    }

    if($('#imgvalidacao').attr('src') == 'imagens/naook.svg')
    {
        status = 0;
    }

    if (status == 1)
    {
        $('#tblRegistroParceiro1').hide();
        $('#tblRegistroParceiro2').show();
    }
    else
    {
        $("#msgParceiro1").text("Preencha todos os campos obrigatórios corretamente.");
    }
}

//Função abre a terceira página de registro de parceiro (página registroUsuario.php)
function abrirRegistroParceiro3() {
    var status = 0;
    if($('#txtEmailParceiro').val() != '' && $('#txtCnpj').val() != '' && $('#txtTelefone').val() != '' && $('#txtEmailParceiro').val().match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/))    //Verifica se os campos estão preenchidos
    {
        status = 1;
    }

    if (status == 1)
    {
        $('#tblRegistroParceiro2').hide();
        $('#tblRegistroParceiro3').show();
    }
    else
    {
        $("#msgParceiro2").text("Preencha todos os campos obrigatórios corretamente.");
    }
}

function preencher(destino) {
   $('#txtDestino').val(destino);
   $('#buscaTR').hide();
}

function busca() {
   $("#txtDestino").keyup(function() {
       var destino = $('#txtDestino').val();

       if (destino == "") {
           $("#buscaTR").html("");
       }
       else
       {
           $.ajax({
               type: "POST",
               url: "api/busca_destino.php",
               data: {
                   busca: destino
               },

               success: function(html) {
                   $("#buscaTR").html(html).show();

               }

           });

       }

   });
}

function validarLogin() {
    $(".txtLoginValidar").keyup(function () {
        var login = $(this).val();
        if(login != '' && login.length > 3)
        {
            $(".resultadovalidacao").html('<img src="imagens/loading.svg" />');
            $.post('api/validar_login.php', {'login':login}, function(data) {
              $(".resultadovalidacao").html(data);
            });
        }
        if(login.length < 3)
        {
            $(".resultadovalidacao").html('<img src="imagens/naook.svg" id="imgvalidacao"/> <span id="msgnaook">Login indisponível</span>');
        }
        else
        {
            $(".resultadovalidacao").html('<img src="imagens/naook.svg" id="imgvalidacao"/> <span id="msgnaook">Login indisponível</span>');
        }

    })
}


function abrirPerfilUsuario() {
    location.href='perfilUsuario.php';
}

function abrirPerfilParceiro(idParceiro) {
    location.href='perfilParceiro.php?idParceiro='+idParceiro;
}

function abrirModalExcluir() {
    $("#modalExcluir").show();
    $("#modalBg").show();
}

function fecharModalExcluir() {
    $("#modalExcluir").hide();
    $("#modalBg").hide();
}

function abrirModalEditar() {
    $("#modalEditar").show();
    $("#modalBg").show();
}

function fecharModalEditar() {
    $("#modalEditar").hide();
    $("#modalBg").hide();
}

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imgPreview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function mascaras() {
    $("[name='txtCpf']").mask("000.000.000-00");
    $("[name='txtTelefone']").mask("(00) 000000000");
    $("[name='txtRg']").mask("00.000.000-0");
    $("[name='txtCnpj']").mask("00.000.000-0/0000-00");
    $("[name='txtCelular']").mask("(00) 000000000");
    $("#formularioCartao input[name='txtNumero']").mask("0000 0000 0000 0000");
    $("#formularioCartao input[name='txtCodigo']").mask("000");
}



function selecionarParceiro() {
   $("#slcBuscaParceiro").change(function() {
       var idParceiro = $('#slcBuscaParceiro').val();
       if (!idParceiro == "") {
           $.post('api/selecao_parceiro.php', {'parceiro':idParceiro}, function(data) {
             $("#conteudoBuscaParceiro").html(data);
           });
       }

   });
}

function selecionarParceiroPadrao() {
   var idParceiro = $('#slcBuscaParceiro').val();
   if (!idParceiro == "") {
       $.post('api/selecao_parceiro.php', {'parceiro':idParceiro}, function(data) {
         $("#conteudoBuscaParceiro").html(data);
       });
   }
}




function abrirModalQuarto(){
    $('.bgCadastroQuarto').fadeIn(200, function(){
    });
}

function fecharModalQuarto(){
    $('.bgCadastroQuarto').fadeOut(200, function(){
    });
}
function abrirModalQuarto1(){
    $('.bgCadastroQuarto1').fadeIn(200, function(){
    });
}

function fecharModalQuarto1(){
    $('.bgCadastroQuarto1').fadeOut(200, function(){
    });
}

function abrirModalComentario(){
    $('.comentariosInsert').fadeIn(200, function(){
    });
}

function fecharModalComentario(){
    $('.comentariosInsert').fadeOut(200, function(){
    });
}

function abrirDetalhesParceiro(idParceiro) {
    $("#modalParceiro").show();
    $("#modalBg").show();
    $.post('api/detalhes_parceiro.php', {'parceiro':idParceiro}, function(data) {
      $("#modalParceiro").html(data);
    });
}

function fecharDetalhesParceiro() {
    $("#modalParceiro").hide();
    $("#modalBg").hide();
}

function abrirModalTOS() {
    $("#bgTOS").show();
    $("#modalBg").show();
}

function fecharModalTOS() {
    $("#bgTOS").hide();
    $("#modalBg").hide();
}


function buscaAvancada() {
       var destino = $('#txtDestinoAvancado').val();

       if (destino == "") {
           $("#buscaTRA").html("");
       }
       else
       {
           $.ajax({
               type: "POST",
               url: "api/buscaavancada_destino.php",
               data: {
                   busca: destino
               },

               success: function(html) {
                   $("#buscaTRA").html(html).show();

               }

           });

       }
}


function preencherAvancado(destino) {
   $('#txtDestinoAvancado').val(destino);
   $('#buscaTRA').hide();
}

function abrirResposta(idFaq,pergunta) {

    $('#respostasbox h3').text(pergunta);
    $.post('api/respostafaq.php', {'idFaq':idFaq}, function(data) {
      $("#respostasbox div").html(data);
    });
}

function preencherCidade(){
    var idEstado = $('#sltEstado').val();
    // alert(idEstado);
    $.post('api/preenchercidade.php', {'idEstado':idEstado}, function(data) {
      $("#Cidades").html(data);
    });
}

function abrirMenuResponsivo() {
    $("#modalBg").show();
    $("#menuResponsivoBox").show();
    $("#menuResponsivoBox").animate({
        marginLeft: "0%"
    }, 100);
}

function fecharMenuResponsivo() {
    $("#menuResponsivoBox").animate({
        marginLeft: "-35%"
    }, 100, function () {
        $("#menuResponsivoBox").hide();
        $("#modalBg").hide();
    });
}



function mudarTotal(valorDiario){
    var entrada = $("#dataEntrada").val();
    var saida = $("#dataSaida").val();

    var entradaFormatada = entrada.split("/");
    var saidaFormatada = saida.split("/");


    var umDia = 24*60*60*1000; // horas*minutos*segundos*milisegundos
    var dataEntrada = new Date(entradaFormatada[2],entradaFormatada[1],entradaFormatada[0]);
    var dataSaida = new Date(saidaFormatada[2],saidaFormatada[1],saidaFormatada[0]);

    var dias = Math.round(Math.abs((dataEntrada.getTime() - dataSaida.getTime())/(umDia)));

    var subTotal = valorDiario * dias;

    var taxa = (subTotal * 10)/100;
    var total = subTotal + taxa;
    //total = total.toFixed(2);

    //total = total.toLocaleString();

    total = total.toFixed(2);
    total = total.replace(".",",");

    $("#subTotal").text("Sub-total: R$ "+subTotal+",00");
    $("#taxa").text("Taxas: R$ "+taxa+",00 (10% do Sub-Total)");
    $("#total").text("Total: R$ "+total);
}

function buscaConheca() {
   $("#txtBuscarDestino").keyup(function() {
       var destino = $('#txtBuscarDestino').val();

       if (destino == "") {
           $("#buscaConheca").html("");
       }
       else
       {
           $.ajax({
               type: "POST",
               url: "api/busca_conheca.php",
               data: {
                   busca: destino
               },

               success: function(html) {
                   $("#buscaConheca").html(html).show();

               }

           });

       }

   });
}

function preencherConheca(destino) {
   $('#txtBuscarDestino').val(destino);
   $('#buscaConheca').hide();
}

function enviarAvaliacao()
{
    var avaliacao = $("#txtAtendimento").val()+','+$("#txtConforto").val()+','+$("#txtLazer").val()+','+$("#txtLimpeza").val()+','+$("#txtLocalizacao").val()+','+$("#txtPreco").val()+','+$("#txtIdHotel").val();
    $.ajax({
        type: "POST",
        url: "api/enviar_avaliacao.php",
        data: {
            busca: avaliacao
        },

        success: function(html) {
            $("#formAvaliacao").hide();
            $("#msgAvaliacao").show();
        }

    });
}

$(document).ready(function() {
    $('#dataEntrada').attr("required",true);
    $('#dataSaida').attr("required",true);
    $('#txtTitular').attr("required",true);
    $('#txtNumeroCartao').attr("required",true);
    $('#txtCodigoSeguranca').attr("required",true);
    $('#txtValidade').attr("required",true);
});

function buscarEstado(estado){
    window.location.href = "busca.php?estado="+estado;
}

function buscarRegiao(regiao){
    window.location.href = "busca.php?regiao="+regiao;
}
