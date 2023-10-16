<!DOCTYPE html>
<html>
<head>
    <title>Formulaire pour tester les nombres</title>
</head>
<body>

<h2>Saisir des nombres</h2>

<form method="get" action="nombre.php">
    
    <input type="text" id="nombre" name="nombre"><br><br>
    <input type="submit" value="Envoyer">
</form>

<form method="get" action="nombre.php">
    <input type="submit" name="reset" value="Réinitialiser">
</form>

</body>
</html>

<?php
session_start();



/*
foreach($_GET as $cle => $val){

        if(preg_match("/^(nombre)$/",$cle)){

            if(preg_match("/^-?[0-9]+$/", $val)){
                
                echo "<p>"."Entier de valeur : ".$val;
                
            }
            
            else {

                echo "<p>"."Le nombre est de valeur : ".$val;

            }
            
            
        }
    }
*/


if(isset($_GET["nombre"])){

    $nombre = $_GET["nombre"];
 
  
        
        if(preg_match("/^[0-9]+$/", $_GET["nombre"])){

            if(isset($_SESSION["result"])){
               
                $_SESSION["result"] *=  $nombre;
                
            }
            else{

                $_SESSION["result"] = $nombre;

            }
            echo "<p>"."La valeur ".$_GET["nombre"]." est un nombre";
            echo "<p>"."La valeur de la session est égal :".$_SESSION["result"];

       
        
        }

    

    else{

        echo "<p>"."La valeur saisi n'est pas un nombre"."</p>";

    }

}
setcookie("result", $_SESSION["result"], time()+3600);


if(isset($_GET["reset"])){

    $_SESSION["result"] = 1;
    echo "Reset"."</br>";
    echo "<p>"."La valeur de la session est égal :".$_SESSION["result"];
    echo "<p>"."L'ancienne valeur est : ".$_COOKIE["result"]."</p>";
    
}




/*
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (issset($_GET["reset"])){

        unset($_SESSION["result"]);

        echo "<p>". "Reset"."</p>";
    
    }
    
    else if (isset($_GET["nombre"])) {
        $input = $_GET["nombre"];
        // Séparer les valeurs en utilisant des virgules, des espaces et autres délimiteurs
        $nombres = preg_split("/[\s,]+/", $input);
        $result = 1;

        foreach ($nombres as $val) {
            $val = trim($val);
            if (is_numeric($val)) {
                $result *= $val;
            }
        }

        if ($result !== 1) {
            $_SESSION["result"] = $result;
            echo "<p>Le produit des nombres saisis est : $result</p>";
        } else {
            echo "<p>Aucun nombre valide saisi pour effectuer la multiplication.</p>";
        }
    } else {
        echo "<p>Aucune valeur saisie.</p>";
    }
}


*/


/*
Test avec sans paramètre == http://localhost:3000/nombre.php?
Test avec nom différent de nombre == http://localhost:3000/nombre.php?var=5641
Test avec un paramètre nombre de valeur 25 == http://localhost:3000/nombre.php?nombre=25
Test avec un paramètre nombre de valeur 12a34 == http://localhost:3000/nombre.php?nombre=12a34
*/
?>






