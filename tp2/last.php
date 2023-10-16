<?php
require "code_db.php";

try{

    $PDO = new PDO($DB_DSN, $DB_USER, $DB_LOGIN);

    
    /*try{
        $requete = $PDO->prepare('SELECT * FROM nobels ORDER BY year DESC LIMIT 25');

        $requete->execute();
    
        while($data = $requete->fetch(PDO::FETCH_OBJ)){
            echo "<pre>";
    
            echo "<p> Le nom est ".$data->name." d'anne ".$data->year." et de catégorie ".$data->category."</p>";
    
            echo "</pre>";
        }
    
    }
    catch(PDOException $e){

        echo "<pre>";
    
        echo $e->getMessage();

        echo "</pre>";
    }
*/

    $requete = $PDO->query('SELECT * FROM nobels ORDER BY year DESC LIMIT 25');

    $data = $requete->fetchAll(PDO::FETCH_NUM);

/*
    echo "<pre>";

    print_r($data);

    echo "<pre>";

*/
    foreach($data as $val){

        echo "<pre>";

        

        echo "<p> Le nom est ".$val[3]." d'anne ".$val[1]." et de catégorie ".$val[2]."</p>";
            

   
    
        echo "<pre>";


    }


 
    




}



catch(PDOException $e){

    echo "<pre>";

    echo $e->getMessage();

    echo "<pre>";


}




?>