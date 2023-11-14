<?php
require "Views/view_begin.php";
?>
 
 <form action="?controller=set&action=add" method="post">
        <p>
            <label>
                 Name: 
                <input type="text" name="Name">
            </label>
        </p>

        <p>
            <label>
                 Year: 
                <input type="text" name="Year" spellcheck="false" data-ms-editor="true">
            </label>
        </p>
        
        <p>
            <label>
                 Birth Date: 
                <input type="text" name="BirthDate" spellcheck="false" data-ms-editor="true">
            </label>
        </p>

        <p>
            <label>
                 Birth Place: 
                <input type="text" name="BirthPlace" spellcheck="false" data-ms-editor="true">
            </label>
        </p>
        
        <p>
            <label>
                 County: 
                <input type="text" name="County" spellcheck="false" data-ms-editor="true">
            </label>
        </p>

        <p>
        <?php
        $db = Model::getModel();
        $tab = $db->getCategories();
        for($i=0; $i<count($tab); $i++){

            echo "<label>";
            echo "<input type='radio' name='Category' value=".$tab[$i].">";
            echo $tab[$i]."\n";
            echo "</label>";

        }
        ?>
        </p>
        
        <textarea name="Motivation" cols="70" rows="10" spellcheck="false" data-ms-editor="true"></textarea>

        <p>
            <input type="submit" name ="Add in database" value="Add in database">
        </p>

    </form>
    <?php
require "Views/view_end.php";
?>