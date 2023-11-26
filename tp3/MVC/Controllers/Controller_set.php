<?php 
Class Controller_set extends Controller{

    public function action_form_add(){
        $this->render("form_add");
        $this->action_add();
        

        
        
    }
    

    public function action_default(){
 
        $this->action_form_add();

    }

    public function action_add(){
        if(((isset($_POST['Name'])) && (isset($_POST['Year'])))) {
            $tab=[];

            $tab = array(
                'name' => $_POST['Name'],
                'category' => $_POST['Category'],
                'year' => $_POST['Year']
            );
            
            if (preg_match('/^\d{4}$/', $_POST['BirthDate'])){
             
                $tab['birthdate'] = $_POST['BirthDate'];
            } else {
                $tab['birthdate'] = null;
            }
            
            if (preg_match('/^.*\S.*$/', $_POST['BirthPlace'])){
            
                $tab['birthplace'] = $_POST['BirthPlace'];
            }else {
                $tab['birthplace'] = null;
            }
            
            if (preg_match('/^.*\S.*$/', $_POST['County'])){
                $tab['county'] = $_POST['County'];
            } else {
                $tab['county'] = null;
            }
            
            if (preg_match('/^.*\S.*$/', $_POST['Motivation'])){
                $tab['motivation'] = $_POST['Motivation'];
            } else {
                $tab['motivation'] = null;
            }
            $db = Model::getModel();
            $db->addNobelPrize($tab);
            $this->action_error("OK");

        }
        else{
            $this->action_error("FAIL");   
        }
    }

    public function action_remove(){
        if(isset($_GET['id'])){
            $db = Model::getModel();
            $db->removeNobelPrize($_GET['id']);
            $this->action_error("OK");


        }
        else{

            $this->action_error("FAIL");


        }

    } 

    public function action_form_update(){
        if(isset($_GET['id'])){
            $db = Model::getModel();
            if($db->isInDataBase($_GET['id']) != false){
                $tab = ['tab' => $db->getNobelPrizeInformations($_GET['id'])];
                $this->render("form_update", $tab);
            }

        else{
            $this->action_error("The id not exits");
        }



        }

    }

    

    public function action_update(){
        if(
            (isset($_POST['id'] ) and preg_match('/^[1-9][0-9]*$/', $_POST['id']))
            &&
            (isset($_POST['Name']) and trim($_POST["name"]) !== '')
            &&
            (isset($_POST["category"]) && trim($_POST["category"]) !== '')
            &&
            (isset($_POST["year"]) && preg_match('/^[1-9][0-9]*$/', $_POST["year"]))
        ){
            
            $tab = array(
                'name' => $_POST['Name'],
                'category' => $_POST['Category'],
                'year' => $_POST['Year']
            );
            
            if (preg_match('/^\d{4}$/', $_POST['BirthDate'])){
             
                $tab['birthdate'] = $_POST['BirthDate'];
            } else {
                $tab['birthdate'] = null;
            }
            
            if (preg_match('/^.*\S.*$/', $_POST['BirthPlace'])){
            
                $tab['birthplace'] = $_POST['BirthPlace'];
            }else {
                $tab['birthplace'] = null;
            }
            
            if (preg_match('/^.*\S.*$/', $_POST['County'])){
                $tab['county'] = $_POST['County'];
            } else {
                $tab['county'] = null;
            }
            
            if (preg_match('/^.*\S.*$/', $_POST['Motivation'])){
                $tab['motivation'] = $_POST['Motivation'];
            } else {
                $tab['motivation'] = null;
            }

            try{
                Model::getModel()->updateNobelPrize($tab);
            }
            catch (Exception $e){
                $this->action_error($e);
            }

        
        
        
        }

        else{
            $this->action_error("Fail");
        }

    }
    


    


}

?>