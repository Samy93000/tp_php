<?php
 $title = "Exercice 3";
 $personnes = [
    'mdupond' => ['Prénom' => 'Martin', 'Nom' => 'Dupond', 'Age' => 25, 'Ville' => 'Paris'       ],
    'jm'      => ['Prénom' => 'Jean'  , 'Nom' => 'Martin', 'Age' => 20, 'Ville' => 'Villetaneuse'],
    'toto'    => ['Prénom' => 'Tom'   , 'Nom' => 'Tonge' , 'Age' => 18, 'Ville' => 'Epinay'      ],
    'arn'     => ['Prénom' => 'Arnaud', 'Nom' => 'Dupond', 'Age' => 33, 'Ville' => 'Paris'       ],
    'email'   => ['Prénom' => 'Emilie', 'Nom' => 'Ailta' , 'Age' => 46, 'Ville' => 'Villetaneuse'],
    'dask'    => ['Prénom' => 'Damien', 'Nom' => 'Askier', 'Age' => 7 , 'Ville' => 'Villetaneuse']
  ];
$chats = 3;
$chiens = 2;
 require "debut_code_html.php";
 

 $scores = [
    ['Joueur' => 'Camille'  , 'score' => 156 ],
    ['Joueur' => 'Guillaume', 'score' => 254 ],
    ['Joueur' => 'Julien'   , 'score' => 192 ],
    ['Joueur' => 'Nabila'   , 'score' => 317 ],
    ['Joueur' => 'Lorianne' , 'score' => 235 ],
    ['Joueur' => 'Tom'      , 'score' => 83  ],
    ['Joueur' => 'Michael'  , 'score' => 325 ],
    ['Joueur' => 'Eddy'     , 'score' => 299 ]
  ];

 
// TO DO : afficher le paragraphe en fonction des variables $chats et $chiens

echo "<h1></h1>";

function tableau($tab){
    echo '<table>';
    $premier_element = reset($tab);

    foreach($premier_element as $clee => $vall){

        echo '<th>'. $clee;
    }

    foreach($tab as $c => $v){
        
        echo '<tr>';

        
     
        foreach($v as $cle => $val){
            
           

            echo '<td>' . $val . '</td>';
            
        } 
        echo '</tr>';

        

    }
    echo '</table>';

}



tableau($personnes);








//echo'<p>';for($i = 0; $i < 10; $i++) {echo'itération numéro ' . $i . '<br />';}$i = 0;

    


echo "<p> J’ai " . $chats  . " chats et " .  $chiens  . " chiens ce qui me fait " .   ($chats + $chiens)  . " animaux";

tableau($scores);

//Exercice 6


$tabMagazines = [
  'le monde'              => ['frequence' => 'quotidien', 'type' => 'actualité', 'prix' => 220],
  'le point'              => ['frequence' => 'hebdo'    , 'type' => 'actualité', 'prix' => 80 ],
  'causette'              => ['frequence' => 'mensuel'  , 'type' => 'féminin'  , 'prix' => 180],
  'politis'               => ['frequence' => 'hebdo'    , 'type' => 'opinion'  , 'prix' => 100],
  'le monde diplomatique' => ['frequence' => 'mensuel'  , 'type' => 'analyse'  , 'prix' => 60 ],
  'libération'            => ['frequence' => 'quotidien', 'type' => 'actualité', 'prix' => 190],
];


$tabMagazinesAbonne = ['le monde', 'le monde diplomatique'];

//$tab_cle = array_keys($tabMagazines);

//sort($tab_cle);

//echo implode(' , ', $tab_cle);


function affichage_quotidien($tab){
  $tab_f=[];

  foreach($tab as $cle => $val) {
      
    if ($val['frequence'] == 'quotidien'){

      $tab_f[] = $cle;
    }

  }


  sort($tab_f);

  echo implode(' , ', $tab_f);
}
//affichage_quotidien($tabMagazines);


function affichage_journaux($tab){
  
  
  

  foreach($tab as $cle => $val){

    
    echo "<p>".$cle.' ('.implode(' , ', $val).' )'." \n ";
    
  }



}
affichage_journaux($tabMagazines);

function calc($tab, $tab_2){
  $price = 0;
  
  
  $tab_cle [] = array_keys($tab);

  foreach($tab as $cle => $val){

    
    
    foreach($tab_2 as $valeur){
      
      if($valeur == $cle){
          $price = $price + $val['prix'];
          
          



      }

    }


  }
  echo "<p>".$price;


}
calc($tabMagazines, $tabMagazinesAbonne);







require 'fin_code_html.php';







?>
