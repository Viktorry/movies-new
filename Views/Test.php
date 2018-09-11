<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/test-project/movies_new3/Controller/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/test-project/movies_new3/Model/Model.php';



            $novi = new Model();
            $n=$novi->getactorsinmoviesbyid(19);
                var_dump($n);

?>