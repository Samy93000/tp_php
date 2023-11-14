<?php
 class Controller_list extends Controller
 {
   
     public function action_last(){
 
         $db = Model::getModel();
         $last = ['last' => $db->getNobelPrizesWithLimit()];
         $this->render("list",$last);
 
     }




     public function action_informations(){
 
        $db = Model::getModel();
        
        if(isset($_GET['id'])){
            $informations = ['informations' => $db->getNobelPrizeInformations($_GET['id'])];
            $this->render("informations",$informations);
    


        }
        else {

            $this->action_error();

        }

    }
     
     public function action_default(){
 
         $this->action_last();
 
     }
 
 
 }
 
 



