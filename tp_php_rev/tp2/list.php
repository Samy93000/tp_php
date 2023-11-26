<?php
require "credential.php";

try{
    $db = new PDO($DBS, $USER, $PWD);

    function liste($PDO){
        $request = $PDO->prepare("SELECT * FROM personnages");

        $request->execute();


              
        while($data = $request->fetch(PDO::FETCH_ASSOC)){
            echo "<ul>";  
            echo "<li>".$data['nom']."</li>";
            echo "<li>".$data['prenom']."</li>";
            if ($data['age'] != NULL){
                echo "<li>".$data['age']."</li>";
            }
            echo "</ul>";  
            

        }
        
    }


    function liste_famile($PDO, $nom){
        $request = $PDO->prepare("SELECT * FROM personnages WHERE nom = :nom");
        $request->bindValue(":nom", $nom);
        $request->execute();

        $data=$request->fetchALL(PDO::FETCH_ASSOC);
        echo "<ul>";  
        echo "<li>".$data[0]['nom']."</li>";
        echo "<li>".$data[0]['prenom']."</li>";
        if ($data[0]['age'] != NULL){
            echo "<li>".$data[0]['age']."</li>";
        }
        echo "</ul>";  
        

        



    }



    //liste($db);
    //liste_famile($db, "Burns");

}
catch(PDOException $e){

    echo $e->getMessage();

}
?>