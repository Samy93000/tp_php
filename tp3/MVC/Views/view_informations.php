<?php
require "Views/view_begin.php";


$tab = $informations;

echo "<table>";
        
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
                    echo "<td>".$tab["id"]."</td>";
                    echo "<td>".$tab["year"]."</td>";
                    echo "<td>".$tab["category"]."</td>";
                    echo "<td>".$tab["name"]."</td>";
                    echo "<td>".$tab["birthdate"]."</td>";
                    echo "<td>".$tab["birthplace"]."</td>";
                    echo "<td>".$tab["county"]."</td>";
                    echo "<td>".$tab["motivation"]."</td>";
                echo "<tr>";

echo "</table>";







require "Views/view_end.php"
?>