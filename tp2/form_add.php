<!DOCTYPE html>
<html>
<head>
    <title>Exemple de table HTML</title>
</head>
<body>

    <form action="add.php" method="post">
        <p>
            <label>
                " Name: "
                <input type="text" name="Name">
            </label>
        </p>

        <p>
            <label>
                " Year: "
                <input type="text" name="Year" spellcheck="false" data-ms-editor="true">
            </label>
        </p>
        
        <p>
            <label>
                " Birth Date: "
                <input type="text" name="BirthDate" spellcheck="false" data-ms-editor="true">
            </label>
        </p>

        <p>
            <label>
                " Birth Place: "
                <input type="text" name="BirthPlace" spellcheck="false" data-ms-editor="true">
            </label>
        </p>
        
        <p>
            <label>
                " County: "
                <input type="text" name="County" spellcheck="false" data-ms-editor="true">
            </label>
        </p>

        <p>
        <?php
        require "Model.php";
        $tab = $Model->get_categories();
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
            <input type="submit" value="Add in database">
        </p>

    </form>




</body>
</html>
