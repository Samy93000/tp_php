<!DOCTYPE html>
<html>
<head>
    <title>Exemple de table HTML</title>
</head>
<body>

<h1>Ma Table HTML</h1>

<table border="1">
    <?php 
        require "Model.php";
        
        if(isset($_GET['id']) and preg_match('/^[1-9]\d*$/', $_GET['id'])){

            if (!($Model->get_nobel_prize_informations($_GET['id']) == False)){
                $tab = $Model->get_nobel_prize_informations($_GET['id']);

                echo "<pre>";
        
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>YEAR</th>";
                echo "<th>CATEGORY</th>";
                echo "<th>NAME</th>";
                echo "<th>BIRTHDATE</th>";
                echo "<th>BIRTHPLACE</th>";
                echo "<th>COUNTRY</th>";
                echo "<th>MOTIVATION</th>";
                echo "</tr>";
                
                echo "<tr>";
                    echo "<td>".$tab[0]["id"]."</td>";
                    echo "<td>".$tab[0]["year"]."</td>";
                    echo "<td>".$tab[0]["category"]."</td>";
                    echo "<td>".$tab[0]["name"]."</td>";
                    echo "<td>".$tab[0]["birthdate"]."</td>";
                    echo "<td>".$tab[0]["birthplace"]."</td>";
                    echo "<td>".$tab[0]["county"]."</td>";
                    echo "<td>".$tab[0]["motivation"]."</td>";
                echo "<tr>";

                echo "</pre>";

            }
            else{

                
                echo "<p>Il n'existe aucun prix nobel avec l'id "."<strong>".$_GET['id']."<strong></p>";

            }
        }  

   
    ?>
</table>

</body>
</html>



