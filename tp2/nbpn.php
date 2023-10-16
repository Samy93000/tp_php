<?php
require "code_db.php";

try {

    $PDO = new PDO($DB_DSN, $DB_USER, $DB_LOGIN);

    $requete = $PDO->prepare('SELECT count(*) FROM nobels');

    $requete->execute();


    $obj = $requete->fetch(PDO::FETCH_OBJ);

    echo "<pre>";
    print_r($obj);
    echo "</pre>";

    echo "<br>";

    echo "<p> Le nombre de prix nobels est de ".$obj->count."</p>";


    
    






}

catch(PDOException $e){


    echo "<pre>";
    echo $e->getMessage();
    echo "</pre>";




}

?>