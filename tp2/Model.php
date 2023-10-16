<?php


class Model {

    private $db;
    
    //private static $instance = null;

    public function __construct(){
        require "db_config.php";
        
        try {
        
            $this->db = new PDO($DB_DSN, $DB_USER, $DB_PWD);
            $this->db->query("SET NAMES 'utf8'");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
        }
        catch(PDOException $e){

            echo "<pre>";

            echo $e->getMessage();

            echo "<pre>";

        }

    }
/*
    public static function getModel(){
        if(self::$instance === null) {
            self::$instance = new self();
            
        }return self::$istance;
    }
*/

    public function get_last(){

        $request = $this->db->query("SELECT * FROM nobels ORDER BY year DESC LIMIT 25 ");
        $tab = $request->fetchAll(PDO::FETCH_ASSOC);
        return $tab;
    }


    public function get_nb_nobel_prizes(){
        $request = $this->db->query("SELECT count(*) FROM nobels");
        $tab = $request->fetch(PDO::FETCH_NUM);
        return $tab[0];
        

    }


    public function get_nobel_prize_informations($id){

        try {
            $request = $this->db->prepare('SELECT * FROM nobels WHERE id= :id');
            $request->bindValue(':id', $id);
            $request->execute();
            $tab = $request->fetchAll(PDO::FETCH_ASSOC);
        
            if (count($tab) == 0){
                return;
            }
            else {

                return $tab;
            }    
        }
        catch(PDOException $e){
            echo "<pre>";
            echo $e->getMessage();
            echo "<pre>";

        }

    }


    public function get_categories(){

        $tab = [];
        $request = $this->db->query('SELECT * FROM categories');
        while($data = $request->fetch(PDO::FETCH_NUM)){
            $tab[] = $data[0];
        }
        return $tab;

    }

    public function add_nobel_prize($infos){

            $columns = implode(',', array_keys($infos));
            $values = ':' . implode(',:', array_keys($infos));
        
            $query = "INSERT INTO nobels ($columns) VALUES ($values)";
        
            $request = $this->db->prepare($query);
        
            
            foreach ($infos as $key => $value) {
                $request->bindValue(':' . $key, $value);
            }
      
            $request->execute();
        }
        
    public function check_data(){

            if ((isset($_POST['name']) and preg_match('/\S/', $_POST['name'])) and 
            (isset($_POST['category']) && preg_match('/\S/', $_POST['category'])) and 
            (isset($_POST['year']) && preg_match('/^[1-9]\d*$/', $_POST['year'])))
            {
                $tab=[];

                $tab = array(
                    'name' => $_POST['name'],
                    'category' => $_POST['category'],
                    'year' => $_POST['year']
                );
                
                if (preg_match('/^\d{4}$/', $_POST['birthdate'])){
                 
                    $tab['birthdate'] = $_POST['birthdate'];
                } else {
                    $tab['birthdate'] = null;
                }
                
                if (preg_match('/^.*\S.*$/', $_POST['birthplace'])){
                
                    $tab['birthplace'] = $_POST['birthplace'];
                }else {
                    $tab['birthplace'] = null;
                }
                
                if (preg_match('/^.*\S.*$/', $_POST['county'])){
                    $tab['county'] = $_POST['county'];
                } else {
                    $tab['county'] = null;
                }
                
                if (preg_match('/^.*\S.*$/', $_POST['motivation'])){
                    $tab['motivation'] = $_POST['motivation'];
                } else {
                    $tab['motivation'] = null;
                }
                return $tab;
            }
            else{

                return false;
            }
    }

    public function remove_nobel_prize($id){
        try{

            $request = $this->db->prepare('DELETE FROM nobels WHERE id= :id');
            $request->bindValue(':id', $id);
            $request->execute();

        }
        catch(PDOException $e){
            echo "<pre>";
            echo $e->getMessage();
            echo "</pre>";


        }


    }

    public function updateNobePrize($infos){

        $str_columns = "";
        $query = "UPDATE nobels SET ($str_columns) WHERE id = :id";
        $request = $this->db->prepare($query);

        foreach(array_keys($infos) as $columns){
            if($columns != 'id'){
                if (is_string($infos[$columns])){
                    $str_columns.=$columns." = ".":".".$columns.".",";
                }
                else {
                    $str_columns.=$columns." = ".":".$columns.",";
                }
            }
            
        }
        $str_columns = rtrim($str_columns, ',');
        foreach($infos as $columns => $value){
            $request->bindValue(':' . $columns, $value);

        }
        $request->bindValue(':id', $infos['id']);
        $request->execute();

    }


    public function get_nobel_prizes_with_limit($offset, $limit){

        $tab = [];
        $request = $this->db->prepare(" Select * from nobels ORDER BY year DESC LIMIT :limit OFFSET :offset");

        $request->bindValue(':limit', $limit, PDO::PARAM_INT);
        $request->bindValue(':offset', $offset, PDO::PARAM_INT);

        $request->execute();
        $data = $request->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function search_nobel_prizes($filters, $offest, $limit){
        if (count($filters) == 0){
            return $this->get_nobel_prizes_with_limit($offest, $limit);

        }
        
        
        
        if(isset($filters['Name'])){

            $like = "%".$filters['Name']."%";
            $request = $this->db->prepare(" Select * from nobels WHERE name LIKE :like ORDER BY year DESC LIMIT :limit OFFSET :offset");
            $request->bindValue(':limit', $limit, PDO::PARAM_INT);
            $request->bindValue(':offset', $offset, PDO::PARAM_INT);
            $request->bindValue(':like', $like);
            $request->execute();
            $data = $request->fetchAll(PDO::FETCH_ASSOC);
            return $data;


        }

        if(isset($filters['Year']) and isset($filters['SignYear'])){

            if(($filters['SignYear'] == ">=") or ($filters['SignYear'] == "<=") or ($filters['SignYear'] == "==")){

              $sign = $filters['SignYear'];
              $request = $this->db->prepare(" Select * from nobels WHERE year :sign :Year ORDER BY year DESC LIMIT :limit OFFSET :offset");
              $request->bindValue(':limit', $limit, PDO::PARAM_INT);
              $request->bindValue(':offset', $offset, PDO::PARAM_INT);
              $request->bindValue(':sign', $sign);
              $request->bindValue(':Year', $filters['Year']);
              $request->execute();
              $data = $request->fetchAll(PDO::FETCH_ASSOC);
              return $data; 
            }
            
           

        }


    }



}

//$Model = Model::getModel();
$Model = new Model();


//$Model->get_nobel_prize_informations(800);
//$Model->get_categories();
/*
$infos = [
    'year' => 25,
    'category' => 'L',
    'name' => 'Le M',
    'birthdate' => 2000,
    'birthplace' => 'Wonpy',
    'county' => 'France',
    'motivation' => 'test'

];
*/
//$Model->add_nobel_prize($infos);

//$Model->remove_nobel_prize(841);
//$Model->get_nobel_prizes_with_limit(50, 25);
?>

