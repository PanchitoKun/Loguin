<?php
    function Conectar(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $bd = "AIEP";

        $cnn = mysqli_connect($host,$user,$pass);
        mysqli_select_db($cnn,$bd);
    
        return $cnn;
    }

?>