<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/test-project/movies_new3/Controller/Controller.php';


                $vik='Vik';
                $pas='123';
            $novi = new Controller();
            $n=$novi->showMovieTable();
         var_dump($n);

?>