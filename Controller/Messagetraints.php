<?php

    trait Message {

    public static function insrtallmsg(){
        $msg = "You must insert all input fields!!!";
        echo $msg;
    }
        public static function insrtsuccsses(){
            $msg = "Insert successfull";
            echo $msg;
        }
        public static function insrtltrsandnumbrs(){
            $msg='Only letters and white space allowed!!!';
            echo $msg;
        }
        public static function insrtmethodwrong(){
            $msg = "Method is wrong!!!";
            echo $msg;
        }
        public static function insrtheaderHomePage(){
            header("Location: /test-project/movies_new3/Views/HomePage.php");
        }
    }