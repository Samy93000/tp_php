<!DOCTYPE html>
<html>
<head>
    <title>Formulaire pour to_do_list</title>
</head>
<body>

<h2>Saisir des to_do</h2>

<form method="get" action="tp1.php">
    <label>Saisir un to do </label>
    <input type="text"  name="task"><br><br>
    <input type="submit" value="Envoyer">
</form>



</body>
</html>

<?php
require_once "TODOList.php"; // avant session_start car on stocke un objet TODOList dans la session
session_start();

if(isset($_COOKIE["td1"])){
    $_SESSION["td1"]->set_representaion($COOKIE["liste"]);

}




if(isset($_SESSION["td1"])){

    

       if(isset($_GET["task"])){

            $_SESSION["td1"]->add_to_do($_GET["task"]);
            $_SESSION["td1"]->get_html(); 
            
        }   

      

   
        
    }
    else{

    $_SESSION["td1"] = new TODOList();

}


if(isset($_GET["rm"])){

    $_SESSION["td1"]->remove_to_do($_GET["rm"]);
    setcookie('liste', $_SESSION["td1"]->get_representation(), time()+3600);
    $_SESSION["td1"]->get_html();

    
}



?>