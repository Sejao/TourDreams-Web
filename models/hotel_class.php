
<?php


    class Hotel
    {

        public $idImagem;
        public $caminhoImagem;
        public $idHotel;


        public function __construct()
        {
            //Inclui o arquivo de conexão com o banco de dados.
            require_once('models/db_class.php');
            //Instancia a classe Mysql_db.
            $conexao_db = new Mysql_db;
            //Chama o método conectar para estabelecer a conexão com o BD.
            $conexao_db->conectar();
        }


        public function InsertHotel($hotel){
            $sql= "insert into tbl_bairro(bairro,idCidade) values('".$hotel->bairro."',".$hotel->cidade.")";
            mysql_query($sql);
            $sql = "select LAST_INSERT_ID() as idBairro";
            $select = mysql_query($sql);
            if($rs = mysql_fetch_array($select)){
                $idBairro = $rs['idBairro'];
                $sql = "insert into tbl_logradouro(logradouro,numero,idBairro) values('".$hotel->logradouro."',".$hotel->numero.",".$idBairro.")";
                mysql_query($sql);
                $sql = "select LAST_INSERT_ID() as idLogradouro";
                $select = mysql_query($sql);
                if($rs = mysql_fetch_array($select)){
                    $idLogradouro = $rs['idLogradouro'];
                    $sql = "insert into tbl_hotel(avaliacao,hotel,checkin,checkout,descricao,qtdEstrelas,idParceiro,idTipoEstadia,idLogradouro) values";
                    $sql = $sql."('50','".$hotel->nomeHotel."','".$hotel->checkIn."','".$hotel->checkOut."','".$hotel->descricaoHotel."',".$hotel->qtdEstrelas.",".$hotel->idParceiro.",".$hotel->tipoEstadia.",".$idLogradouro.")";
                    mysql_query($sql);
                    $sql = "select LAST_INSERT_ID() as idHotel";
                    $select = mysql_query($sql);
                    if($rs = mysql_fetch_array($select)){
                        $idHotel = $rs['idHotel'];


                        $sql="insert into tbl_avaliacao(limpeza,conforto,lazer,atendimento,localizacao,preco,idHotel)";
                        $sql = $sql." values('50','50','50','50','50','50',".$idHotel.");";
                        mysql_query($sql) or die(mysql_error());
                        return $idHotel;

                    }
                }
            }
        }

        public function InsertImagem($imagem){
            $sql = "insert into tbl_imagem(caminhoImagem) values('".$imagem->caminhoImagem."');";
            mysql_query($sql);
            $sql="select LAST_INSERT_ID() as idImagem";
            $select = mysql_query($sql);
            if($rs = mysql_fetch_array($select)){
                $idImagem = $rs['idImagem'];
                $sql = "insert into tbl_hotelimagem(idHotel,idImagem) values(".$imagem->idHotel.",'".$idImagem."');";
                mysql_query($sql);
            }
        }

        public function InsertComodidade($comodidade){
            $sql = "insert into tbl_hotelcomodidadeshotel(idHotel,idComodidadeHotel,status) values(".$comodidade->idHotel.",".$comodidade->comodidade.",1)";

            mysql_query($sql);
        }


        public function SelectComodidades(){

            $sql = "select * from tbl_comodidadeshotel";
            $select = mysql_query($sql);

            $cont = 0;

            while($rs = mysql_fetch_array($select)){

                $comodidades[] = new Hotel();

                $comodidades[$cont]->idComodidadeHotel = $rs['idComodidadeHotel'];
                $comodidades[$cont]->nomeComodidade = $rs['nomeComodidade'];

                $cont++;

            }

            return $comodidades;

        }

        public function SelectEstadias(){
            $sql = "select * from tbl_tipodeestadia";
            $select = mysql_query($sql);

            $cont = 0;

            while($rs = mysql_fetch_array($select)){

                $estadia[] = new Hotel();

                $estadia[$cont]->idEstadia = $rs['idTipoEstadia'];
                $estadia[$cont]->estadia = $rs['estadia'];

                $cont++;

            }

            return $estadia;
        }

        public function SelectCidades(){
            $sql = "select c.idCidade, c.cidade, e.uf from tbl_cidade as c inner join tbl_estado as e on c.idEstado = e.idEstado;";
            $select = mysql_query($sql);

            $cont = 0;

            while($rs = mysql_fetch_array($select)){

                $cidade[] = new Hotel();

                $cidade[$cont]->idCidade = $rs['idCidade'];
                $cidade[$cont]->cidade = $rs['cidade'];
                $cidade[$cont]->uf = $rs['uf'];

                $cont++;

            }

            return $cidade;
        }

        public function SelectEstados(){
            $sql = "select * from tbl_estado;";
            $select = mysql_query($sql);

            $cont = 0;

            while($rs = mysql_fetch_array($select)){

                $estado[] = new Hotel();

                $estado[$cont]->idEstado = $rs['idEstado'];
                $estado[$cont]->estado = $rs['estado'];
                $estado[$cont]->uf = $rs['uf'];

                $cont++;

            }

            return $estado;
        }


        public function ExcluirImagem(){
            $sql="select * from tbl_hotelimagem where idHotel=".$this->idHotel.";";
            $select = mysql_query($sql);
            while($rs = mysql_fetch_array($select)){
                $idImagem = $rs['idImagem'];
                $sql = "delete from tbl_hotelimagem where idHotel=".$this->idHotel." limit 1;";
                mysql_query($sql);
                $sql = "delete from tbl_imagem where idImagem=".$idImagem.";";
                mysql_query($sql);

            }
        }

        public function ExcluirHotel(){

            $sql = "select idQuarto from tbl_quarto where idHotel=".$this->idHotel.";";

            $select = mysql_query($sql);

            while($rs = mysql_fetch_array($select)){

                $this->DeleteQuarto($rs['idQuarto']);

            }

            $sql = "delete from tbl_hotelcomodidadeshotel where idHotel=".$this->idHotel.";";
            echo($sql);
            mysql_query($sql);
            $sql = "delete from tbl_avaliacao where idHotel=".$this->idHotel.";";
            echo($sql);
            mysql_query($sql);
            $sql = "delete from tbl_hotel where idHotel=".$this->idHotel.";";
            echo($sql);
            mysql_query($sql);

        }

        public function DeleteQuarto($idQuarto){
            $sql="delete from tbl_quartocomodidadesquarto where idQuarto=".$idQuarto.";";
            mysql_query($sql);
            $sql="delete from tbl_transacao where idQuarto=".$idQuarto.";";
            mysql_query($sql);
            $sql = "select * from tbl_quarto where idQuarto=".$idQuarto.";";
            $select = mysql_query($sql);
            if($rs=mysql_fetch_array($select)){
                $idImagem = $rs['idImagem'];
                $sql = "delete from tbl_quarto where idQuarto=".$idQuarto.";";
                mysql_query($sql);
                $sql = "delete from tbl_imagem where idImagem=".$idImagem.";";
                mysql_query($sql);

        }
        }





    }





 ?>
