<?php

class TODOList {
    private $to_dos;

    public function __construct(){
        $this->to_dos = [];

    }


    public function add_to_do($string){
        if ($string == "" || preg_match("/^ *$/", $string)){
            echo "<p>"."Fail";

        }

        else{
            $this->to_dos [] = $string;
            echo "<p>"."Success";


        }



    }


    


    public function remove_to_do($index){

        unset($this->to_dos[$index]);



    }


    public function is_empty(){
        if (count($this->to_dos) > 0){
            echo "<p>"."false"; 
        }

        else{
            echo "<p>"."true";

        }

        


    }




    public function get_html(){
        if ($this->is_empty()){
            

            echo "Aucune tâche à faire !";
        }

        else{

            echo "<ul>";

            
        foreach($this->to_dos as $cle => $val){

                echo '<li><a href=tp1.php?rm='.$cle.'>'.$val.'</a></li>';    


            }



            echo "</ul>";

        }

    }


    public function get_representation(){
        return implode('///', $this->to_dos);


    }


    public function set_representation($representation){
        $this->to_dos = explode('///', $representation);




    }





    






}







?>
