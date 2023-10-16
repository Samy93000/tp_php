<?php
require "code_db.php";
try {

    $PDO = new PDO($DB_DSN, $DB_USER, $DB_LOGIN);

    if(isset($_GET['id'])){

        try{
        $requete = $PDO->prepare('Select * from nobels WHERE id = :id');

        $requete->bindValue(':id',$_GET['id']);

        $requete->execute();

        $data = $requete->fetch(PDO::FETCH_NUM);

        if(count($data)==0){

            echo "<p>Identidiant invalide</p>";


        }
        else{
            echo "<pre>";

            /*for($i = 1; i < count($data); $i++){
    
                echo "<p>".$data[i]."</p>";
    
            }
            */
    
            print_r($data);
    
            echo "<p>".$data[1]."</p>";
            echo "<p>".$data[2]."</p>";
            echo "<p>".$data[3]."</p>";
            echo "<p>".$data[4]."</p>";
            echo "<p>".$data[5]."</p>";
            echo "<p>".$data[6]."</p>";
            echo "<p>".$data[7]."</p>";
    
            echo "<pre>";
    
        }

    }
        catch(PDOException $e){

            echo "<pre>";

            echo $e->getMessage();

            echo "</pre>";
        }

    
    }
    else{

        echo "<pre>";

        echo "Aucun identifiant";

        echo "</pre>";


    }







}
catch(PDOException $e){

    echo "<pre>";

    echo $e->getMessage();

    echo "</pre>";



}




?>