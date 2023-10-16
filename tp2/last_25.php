<!DOCTYPE html>
<html>
<head>
    <title>Exemple de table HTML</title>
    <link rel="stylesheet" type="text/css" href="Content/css/nobel.css">
</head>
<body>

<h1>Ma Table HTML</h1>

<table border="1">
    <?php 
        require "Model.php";

        $tab = $Model->get_last();

/*
echo "<pre>";

//print_r($tab);

echo "</pre>";
*/


    echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Category</th>";
        echo "<th>Year</th>";
        echo "<th class='sansBordure '>Icone</th>";
        echo "<th class='sansBordure '>Modification</th>";
        
    echo "</tr>";
        foreach($tab as $val){
         echo "<tr>";
            echo "<td><a href='informations.php?id=".$val['id']."'>".$val["name"]."</a>"."</td>";
            echo "<td>".$val["category"]."</td>";
            echo "<td>".$val["year"]."</td>";
            echo "<td class='sansBordure'><a href='remove.php?id=".$val['id']."'><img src='Content/img/remove-icon.png' alt='Croix' class='icone'></a></td>";
            echo "<td class='sansBordure'><a href='form_update.php?id=".$val['id']."'><img src='Content/img/edit-icon.png' alt='Edit' class='icone'></a></td>";
         echo "<tr>";

        }


    ?>
</table>

</body>
</html>

