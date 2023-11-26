<?php
require "Model.php";
$db = Model::getModel();


if(isset($_GET['family'])){
    print_r($_GET['family']);
    $familyName = urldecode($_GET['family']);
    $db->getFamily($familyName);

}
else{

    echo "Erreur";

}



