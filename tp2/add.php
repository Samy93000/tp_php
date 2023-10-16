<?php
require "Model.php";
if (isset($_POST['Add in database'])){

    try {
        $tab = $Model->check_data();
        $Model->add_nobel_prize($tab);
    }
    catch(Exception $e){
        echo "<pre>";
        echo $e;
        echo "</pre>";

    }
}
else{

    echo "<pre>";

    echo "Formulaire non soumis";

    echo "<pre>";

}
