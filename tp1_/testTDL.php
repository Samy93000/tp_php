<?php 

require "TODOList.php";


$todo = new TODOList();

$todo->add_to_do("a");
$todo->add_to_do("b");
$todo->add_to_do("c");
$todo->add_to_do("d");

$todo->get_html();


$todo->remove_to_do(0);
$todo->remove_to_do(1);

$todo->get_html();

if($todo->is_empty()){

    echo "VIDE";


}

else{

    echo"Pas vide";

}

$todo->add_to_do("    d  ");


?>
