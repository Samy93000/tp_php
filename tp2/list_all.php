<!DOCTYPE html>
<html>
<head>
    <title>Exemple de table HTML</title>
    <link rel="stylesheet" type="text/css" href="Content/css/nobel.css">
</head>
<body>

<h1>Ma Table HTML</h1>


<?php
echo "<table border='1'>";
require "Model.php";
if (isset($_GET['page'])){

    if (!(preg_match('/^[1-9]\d*$/', $_GET['page']))){

        $_GET['page'] = 1;
        $page = $_GET['page'];
        $limit = 25;
        $offset_lower = ($page - 1) * $limit;
        $offset_upper = ($page * $limit) - 1;
        $nobel_data = $Model->get_nobel_prizes_with_limit($offset_lower, $limit);
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Category</th>";
        echo "<th>Year</th>";
        echo "<th class='sansBordure '>Icone</th>";
        echo "<th class='sansBordure '>Modification</th>";
        
    echo "</tr>";
        foreach($nobel_data as $cle => $val){
         echo "<tr>";
            echo "<td><a href='informations.php?id=".$val['id']."'>".$val["name"]."</a>"."</td>";
            echo "<td>".$val["category"]."</td>";
            echo "<td>".$val["year"]."</td>";
            echo "<td class='sansBordure'><a href='remove.php?id=".$val['id']."'><img src='Content/img/remove-icon.png' alt='Croix' class='icone'></a></td>";
            echo "<td class='sansBordure'><a href='form_update.php?id=".$val['id']."'><img src='Content/img/edit-icon.png' alt='Edit' class='icone'></a></td>";
         echo "<tr>";

        }

    }
    else {

        $page = $_GET['page'];
        $limit = 25;
        $offset_lower = ($page - 1) * $limit;
        $offset_upper = ($page * $limit) - 1;
        $nobel_data = $Model->get_nobel_prizes_with_limit($offset_lower, $limit);
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Category</th>";
        echo "<th>Year</th>";
        echo "<th class='sansBordure '>Icone</th>";
        echo "<th class='sansBordure '>Modification</th>";
        
    echo "</tr>";
        foreach($nobel_data as $cle => $val){
         echo "<tr>";
            echo "<td><a href='informations.php?id=".$val['id']."'>".$val["name"]."</a>"."</td>";
            echo "<td>".$val["category"]."</td>";
            echo "<td>".$val["year"]."</td>";
            echo "<td class='sansBordure'><a href='remove.php?id=".$val['id']."'><img src='Content/img/remove-icon.png' alt='Croix' class='icone'></a></td>";
            echo "<td class='sansBordure'><a href='form_update.php?id=".$val['id']."'><img src='Content/img/edit-icon.png' alt='Edit' class='icone'></a></td>";
         echo "<tr>";

        }
    }
    /*
    echo "<div>";
    for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $_GET['page']) {
                echo "<span>$i</span>"; 
            } 
            else {
                echo "<a href='?page=$i'>$i</a>"; 
            }
}
}   
    echo "</div>";
    */
}
echo "</table>";
?> 

</body>
</html>
