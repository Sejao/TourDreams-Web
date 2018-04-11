<?php
    require_once('controllers/paginahome_controller.php');
    $home_controller = new ControllerHome();
    $rows = $home_controller->ListarHome();

    $cont = 0;

        $imagem = explode("*", $rows);


?>
<div class="conteudo">

    <div class="tituloPg">
        Administração da Homepage
    </div>
    <div class="content">

        <div class="divForm">
            <form class="" action="router.php?controller=home" enctype="multipart/form-data" method="post">
                <div class="form">
                    <table>
                        <tr>
                            <td><label>Imagem de fundo</label></td>
                        </tr>
                        <tr>
                            <td class="input"><input type="file" name="fileBg" onchange="readURL(this,1)" value=""> <div class="imgPreview1"><img class="img" alt="" src="../<?php echo($imagem[0]); ?>"></div></td>
                        </tr>
                        <tr>
                            <td><label>Milhas Travel</label></td>
                        </tr>
                        <tr>
                            <td class="input"><input onchange="readURL(this,2)" type="file" name="fileMilhas" value=""><div class="imgPreview2"><img class="img" alt="" src="../<?php echo($imagem[1]); ?>"></div></td>
                        </tr>
                        <tr>
                            <td><label>Melhores Destinos</label></td>
                        </tr>
                        <tr>
                            <td class="input"><input onchange="readURL(this,3)" type="file" name="fileMelhoresDestinos" value=""><div class="imgPreview3"><img class="img" alt="" src="../<?php echo($imagem[2]); ?>"></div></td>
                        </tr>
                        <tr>
                            <td><label>Norte</label></td>
                        </tr>
                        <tr>
                            <td style="border-bottom:0px;" class="input"><input  onchange="readURL(this,4)" type="file" name="fileNorte" value=""><div class="imgPreview4"><img class="img" alt="" src="../<?php echo($imagem[3]); ?>"></div></td>
                        </tr>
                    </table>
                </div>
                <div class="form">
                    <table>
                        <tr>
                            <td><label>Nordeste</label></td>
                        </tr>
                        <tr>
                            <td class="input"><input type="file" onchange="readURL(this,5)" name="fileNordeste" value=""><div class="imgPreview5"><img class="img" alt="" src="../<?php echo($imagem[4]); ?>"></div></td>
                        </tr>
                        <tr>
                            <td><label>Centro-Oeste</label></td>
                        </tr>
                        <tr>
                            <td class="input"><input onchange="readURL(this,6)" type="file" name="fileCentroOeste" value=""><div class="imgPreview6"><img class="img" alt="" src="../<?php echo($imagem[5]); ?>"></td>
                        </tr>
                        <tr>
                            <td><label>Sudeste</label></td>
                        </tr>
                        <tr>
                            <td class="input"><input onchange="readURL(this,7)" type="file" name="fileSudeste" value=""><div class="imgPreview7"><img class="img" alt="" src="../<?php echo($imagem[6]); ?>"></td>
                        </tr>
                        <tr>
                            <td><label>Sul</label></td>
                        </tr>
                        <tr>
                            <td style="border-bottom:0px;" class="input"><input onchange="readURL(this,8)" type="file" name="fileSul" value=""><div class="imgPreview8"><img class="img" alt="" src="../<?php echo($imagem[7]); ?>"></td>
                        </tr>
                    </table>

                </div>
                <div class="botao">
                    <input type="submit" name="" value="EDITAR">
                </div>
            </form>
        </div>

    </div>
</div>
