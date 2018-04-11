function mostrarQuartos(idHotel,nomeHotel,idParceiro){

        $('#mensagem').hide();
        $('.contHotelClicado').show();
        $('#contDireita h1').text("Quartos de " +nomeHotel);
        $('.divImgQuarto img').attr("src","");
        $('.mensagemFoto').show();
        $('.divNomeQuarto').text("");
        $('#idHotel').val(idHotel);
        $.post('api/busca_quarto.php', {'idHotel':idHotel,'idParceiro':idParceiro}, function(data) {
          $(".divTblQuarto").html(data);
        });

}


function abrirFotoQuarto(foto,nome){

    $('.mensagemFoto').hide();
    $('.divNomeQuarto').text(nome);
    $('.divImgQuarto img').attr('src',foto);
}
