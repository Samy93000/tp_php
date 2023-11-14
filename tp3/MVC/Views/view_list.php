<?php 

require "Views/view_begin.php";

?>

<?php

echo "<table>";

echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Category</th>";
        echo "<th>Year</th>";
        echo "<th class='sansBordure '></th>";
        echo "<th class='sansBordure '></th>";
        
    echo "</tr>";
        foreach($last as $val){
         echo "<tr>";
            echo "<td><a href='?controller=list&action=informations&id=".$val['id']."'>".$val["name"]."</a>"."</td>";
            echo "<td>".$val["category"]."</td>";
            echo "<td>".$val["year"]."</td>";
            echo "<td class='sansBordure'><a href='?controller=set&action=remove&id=".$val['id']."'><img src='Content/img/remove-icon.png' alt='Croix' class='icone'></a></td>";
         echo "<tr>";

        }


echo "</table>";

?>


<?php 

require "Views/view_end.php";

?>