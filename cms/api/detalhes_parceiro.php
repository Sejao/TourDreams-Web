
  <?php
  require_once('../models/db_class.php');
  //Instancia a classe Mysql_db.
  $conexao_db = new Mysql_db;
  //Chama o método conectar para estabelecer a conexão com o BD.
  $conexao_db->conectar();
  if (isset($_POST['parceiro'])) {
     $idParceiro = $_POST['parceiro'];

     $sql = "SELECT * FROM tbl_parceiro AS p INNER JOIN tbl_imagem AS i ON i.idImagem=p.idImagem WHERE idParceiro='".$idParceiro."';";
     $select = mysql_query($sql);
     $sqlHotel = "SELECT h.idHotel, h.hotel, estadia, min(q.valorDiario) AS valorDiario FROM tbl_hotel AS h INNER JOIN tbl_tipodeestadia AS t ON t.idTipoEstadia=h.idTipoEstadia INNER JOIN tbl_quarto AS q ON q.idHotel=h.idHotel WHERE idParceiro='".$idParceiro."' GROUP BY h.idHotel ORDER BY valorDiario;";
     $selectHotel = mysql_query($sqlHotel);
     $html = '<div id="tituloModalParceiro">';
     if($rows=mysql_fetch_array($select)) {
         if(mysql_num_Rows($selectHotel) == 0)
         {
             $html = $html.'<span>'.$rows['nomeParceiro'].'</span>
                         </div>
                         <div id="fecharModalParceiro">
                             <span onclick="fecharDetalhesParceiro()">X</span>
                         </div>
                         <div id="msgModalParceiro">Este parceiro não possui acomodações.</div>
                         </div>';
             die($html);
         }
         $html = $html.'<span>'.$rows['nomeParceiro'].'</span>
                     </div>
                     <div id="fecharModalParceiro">
                         <span onclick="fecharDetalhesParceiro()">X</span>
                     </div>
                     <div id="conteudoModalParceiro">
                         <table class="sortable">
                             <tr>
                                 <th>Acomodação</th>
                                 <th>Tipo</th>
                                 <th>A partir de</th>
                             </tr>';

        while($rows=mysql_fetch_array($selectHotel))
        {
            $html = $html.'<tr onclick="document.location=&#39;hotelQuarto.php?idHotel='.$rows['idHotel'].'&#39;">
                            <td>'.$rows['hotel'].'</td>
                            <td>'.$rows['estadia'].'</td>
                            <td>R$ '.$rows['valorDiario'].'</td>
                        </tr>';
        }
        $html = $html.'</table>
                    </div>';
         die($html);

     }
  }
  ?>
