<?php 
require "Model.php";
if ((isset($_POST['Name']) and preg_match('/\S/', $_POST['Name'])) and 
(isset($_POST['Category']) and preg_match('/\S/', $_POST['Category'])) and 
(isset($_POST['Year']) and preg_match('/^[1-9]\d*$/', $_POST['Year'])) and
(isset($_POST['Id']) and preg_match('/^[1-9]\d*$/', $_POST['Year'])))
{

    $tab=[];

    $tab = array(
        'Name' => $_POST['Name'],
        'Category' => $_POST['Category'],
        'Year' => $_POST['Year'],
        'Id' => $_POST['Id']
    );
    
    if (preg_match('/^\d{4}$/', $_POST['BirthDate'])){
     
        $tab['BirthDate'] = $_POST['BirthDate'];
    } else {
        $tab['BirthDate'] = null;
    }
    
    if (preg_match('/^.*\S.*$/', $_POST['BirthPlace'])){
    
        $tab['BirthPlace'] = $_POST['BirthPlace'];
    }else {
        $tab['BirthPlace'] = null;
    }
    
    if (preg_match('/^.*\S.*$/', $_POST['County'])){
        $tab['County'] = $_POST['County'];
    } else {
        $tab['County'] = null;
    }
    
    if (preg_match('/^.*\S.*$/', $_POST['Motivation'])){
        $tab['Motivation'] = $_POST['Motivation'];
    } else {
        $tab['Motivation'] = null;
    }

    try {
        $Model->updateNobePrize($tab);
        echo "Sucess";
    }
    catch(Exception $e){
        echo "<pre>";
        echo $e;
        echo "</pre>";
    }
   

}else{

    Echo "<i>Invalid input data</i>";

}

