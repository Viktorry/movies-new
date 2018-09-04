<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/test-project/movies_new3/Controller/Controller.php';


            $novi = new Controller();
            $n=$novi->showActorMoviegenreTable();
                var_dump($n);

?>