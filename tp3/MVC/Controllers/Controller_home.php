<?php 
 class Controller_home extends Controller
{
  
    public function action_home(){

        $db = Model::getModel();
        $nb_nobels = ['nb_nobels' => $db->getNbNobelPrizes()];
        $this->render("home",$nb_nobels);

    }
    
    public function action_default(){

        $this->action_home();

    }


}



?>