<?php
require "Model.php";

if(isset($_GET['id'])){

    if ($Model->get_nobel_prize_informations($_GET['id']) != false){
        $tab = $Model->get_nobel_prize_informations($_GET['id']);
       
        
        echo "form action='update.php' method='post'>";
        echo "<p>";
           echo "<label>";
                echo" Name: ";
                echo "<input type='text' name='Name' value=".$tab[0]['name'].">";
            echo "</label>";
        echo "</p>";

        echo "<p>";
            echo "<label>";
                echo " Year: ";
                echo "<input type='text' name='Year' value=".$tab[0]['year']." spellcheck=".false." data-ms-editor=".true.">";
            echo "</label>";
       echo "</p>";
        
       echo "<p>";
            echo "<label>";
                echo " Birth Date: ";
                echo "<input type='text' name='BirthDate' value=".$tab[0]['birthdate']." spellcheck=".false." data-ms-editor=".true.">";
            echo "</label>";
        echo "</p>";

        echo "<p>";
            echo "<label>";
                echo " Birth Place: ";
                echo "<input type='text' name='BirthPlace' value=".$tab[0]['birthplace']." spellcheck=".false." data-ms-editor=".true.">";
            echo "</label>";
        echo "</p>";
        
        echo "<p>";
            echo "<label>";
                echo " County: ";
                echo "<input type='text' name='County' value=".$tab[0]['county']." spellcheck=".false." data-ms-editor=".true.">";
            echo "</label>";
        echo "</p>";

        $string = $tab[0]['motivation'];
        
        echo "<textarea name='Motivation' cols='70' rows='10' spellcheck=".false." data-ms-editor=".true.">$string</textarea>";
        
        echo "<p>";
        echo "<input type='hidden' name='Id' value='".$_GET['id']."'>";
        echo "</p>";
        
        echo "<p>";
            echo "<input type='submit' value='Update in database'>";
        echo "</p>";

    echo "</form>";


    }

}

