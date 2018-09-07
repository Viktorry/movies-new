<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/test-project/movies_new3/Controller/Controller.php';


            $novi = new UploadPicture();
            $n=$novi->UplPic();
                print_r($n);

?>