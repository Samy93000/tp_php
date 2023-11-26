<?php
 class Controller_list extends Controller
 {
   
     public function action_last(){
 
         $db = Model::getModel();
         $datas = ['datas' => $db->getNobelPrizesWithLimit()];
         $this->render("list",$datas);
 
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
     
    public function action_pagination(){

        if(isset($_GET['start']) and preg_match('/^[1-9][0-9]*$/', $_GET['start'])){
            $datas = ['datas' => Model::getModel()->getNobelPrizesWithLimit(($_GET['start'] - 1) * 25, 25)];
            $this->render("pagination", $datas);
        }
        else{
            $this->action_error("Fail");
        }


    }
    
    
    
    
    public function action_default(){
 
         $this->action_last();
 
     }
 
 
 }
 
 



