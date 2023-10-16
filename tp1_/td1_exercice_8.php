<?php

function check_er($string, $tab){

    foreach($tab as $cle => $val){

        if ((preg_match($string, $cle) && $val == FALSE) || (!(preg_match($string, $cle)) && $val == TRUE) ){

           
            echo "<p>"."ERREUR :".$cle; 




        }




    }

    


    

        
       


    }


    $tab_f =  [
        "J'adore le php !" => true,
        "Génial le php !!!" => false,
        "Javascript est mieux" => false,
        "J'adore le javascript" => true
    ];


    
    $tab_2= [
        "10" => true,
        "0" => true,
        "-34539" => true,
        "--44" => false,
        "" => false,
        "123a456" => false,
        "10.2" => false
    ];
   

    check_er("/php/", $tab_f);


    echo "<p>"."nouveau tableau";

    check_er("/^-?[0-9]+$/", $tab_2);

    $tab_3 =  [
        "10" => true,
        "0" => true,
        "-34539" => true,
        "--44" => false,
        "" => false,
        "123a456" => false,
        "10.2" => true,
        "0.001" => true,
        ".001" => true,
        "10." => false
    ];


    echo "<p>"."nouveau tableau";

    check_er("/^[-.]?[0-9]*\.?[0-9]+$/", $tab_3);


    $tab_4 = [
        "10/10/2021" => true,
        "9/9/1234" => true,
        "90/9/5476" => true,
        "8/23/0014" => true,
        "111/23/0423" => false,
        "12/12/123" => false,
        "1/11234" => false,
        "10/2" => false,
        "1a/2b/8790" => false
    ];
    

    echo "<p>"."nouveau tableau";

    check_er("/^[0-9]?[0-9]\/[0-9]?[0-9]\/[0-9]{4}$/", $tab_4);






     





?>
