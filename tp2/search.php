<?php
session_start();

if ($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_GET['sign']) and (isset($_GET['sign']) and isset($_GET['test']))){
        $_SESSION['sign'] = $_GET['sign'];
        $_SESSION['name'] = $_GET['name'];
        $_SESSION['year'] = $_GET['test'];
    }

    if(isset($_GET['page'])){
        require "list_all.php";

    }
    else{

        require "last_25.php";
    }


}

?>