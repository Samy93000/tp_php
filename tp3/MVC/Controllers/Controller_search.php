<?php 
class Controller_search extends Controller{

    public function action_form(){
        $this->render("form_search");

        

    }

    public function action_default()
    {
        $this->action_form();
    }



    public function action_pagination(){
        
        $tab = array(
            'name' =>$_POST['name'],
            'sign' => $_POST['sign'],
            'year' => $_POST['test'],
        );

        $db = Model::getModel();
        

        $datas = ['datas' => $db->findNobelPrizes($tab)];
        $this->render("list_nobel",$datas);
        
        //$this->action_error("Tet");



    }

}