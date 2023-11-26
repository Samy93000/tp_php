<?php
class Model {

    private $db;

    private static $instance = null;



    private function __construct()
    {
        require "credential.php";
        $this->db = new PDO($DBS, $USER, $PWD);
        $this->db->query("SET NAMES 'utf8'");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    }


    public static function getModel(){
        if(self::$instance == null){
            return self::$instance = new self(); 
        }
        else{
            return self::$instance;
        }

    }



    public function getFamily($nom){
        
        $request = $this->db->prepare("SELECT * FROM personnages WHERE nom = :nom");
        $request->bindValue(":nom", $nom);
        $request->execute();

        $data=$request->fetchALL(PDO::FETCH_ASSOC);
        print_r($data);
        echo "<ul>";  
        echo "<li>".$data[0]['nom']."</li>";
        echo "<li>".$data[0]['prenom']."</li>";
        if ($data[0]['age'] != NULL){
            echo "<li>".$data[0]['age']."</li>";
        }
        echo "</ul>";  
    }


/*
    public function getFamilyNames(){
        $request = $this->db->prepare("SELECT DISTINCT nom FROM personnages;");
        $request->execute();
        foreach($request->fetchALL(PDO::FETCH_ASSOC) as $element){
            
        
        }

    }
*/
    public function getFamilyNames(){
        $request = $this->db->prepare("SELECT DISTINCT nom FROM personnages;");
        $request->execute();
        return $request->fetchALL(PDO::FETCH_ASSOC);

    }



}