<?php

    class ControllerHotel
    {

            public function BuscaHotel(){
                require_once('models/hotelquarto_class.php');

                $idHotel = $_GET['idHotel'];

                $hotel_class = new HotelQuarto();
                $hotel_class->idHotel = $idHotel;
                return $hotel_class->SelectHotel();

            }

            public function BuscaImagemHotel(){
                require_once('models/hotelquarto_class.php');

                $idHotel = $_GET['idHotel'];

                $listImagem = new HotelQuarto();
                $listImagem->idHotel = $idHotel;
                return $listImagem->SelectImagem();
            }

            public function BuscaPrimeiraImagem(){
                require_once('models/hotelquarto_class.php');

                $idHotel = $_GET['idHotel'];

                $listFirstImagem = new HotelQuarto();
                $listFirstImagem->idHotel = $idHotel;
                return $listFirstImagem->SelectFirstImagem();
            }

            public function BuscaComodidadesHotel(){

                require_once('models/hotelquarto_class.php');

                $idHotel = $_GET['idHotel'];

                $listComodidadesHotel= new HotelQuarto();
                $listComodidadesHotel->idHotel = $idHotel;
                return $listComodidadesHotel->SelectComodidadesHotel();

            }

            public function BuscaComodidadesQuarto($idQuarto){

                require_once('models/hotelquarto_class.php');



                $listComodidadesQuarto= new HotelQuarto();
                $listComodidadesQuarto->idQuarto = $idQuarto;
                return $listComodidadesQuarto->SelectComodidadesQuarto();

            }

            public function BuscaQuarto(){
                require_once('models/hotelquarto_class.php');

                $idHotel = $_GET['idHotel'];

                $listQuarto= new HotelQuarto();
                $listQuarto->idHotel = $idHotel;
                return $listQuarto->SelectQuarto();
            }

            public function BuscaAvaliacao()
            {
                require_once('models/hotelquarto_class.php');

                $idHotel = $_GET['idHotel'];

                $hotel= new HotelQuarto();
                $hotel->idHotel = $idHotel;
                return $hotel->SelectAvaliacao($hotel);
            }

    }


?>
