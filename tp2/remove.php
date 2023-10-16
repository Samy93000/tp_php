<?php
require "Model.php";

echo "<i><a href='last_25.php'>Liste</a></i><br>";


if (isset($_GET['id']) and preg_match('/^[1-9]\d*$/', $_GET['id'])){

    if($Model->get_nobel_prize_informations($_GET['id']) != false){

        $Model->remove_nobel_prize($_GET['id']);
   
        echo "<i>The nobel prize has been removed.</i>";
        

    }
    else{
        echo "<i>There is no nobel prize with such id.</i>";
    }


}
else{

    echo "<i>There is no id in the url.</i>";

}

