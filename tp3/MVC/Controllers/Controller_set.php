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




    }






?>