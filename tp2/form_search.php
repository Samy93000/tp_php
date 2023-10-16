<!DOCTYPE html>
<html>
<head>
    <title>Exemple de table HTML</title>
</head>
<body>

    <form action="search.php" method="GET">
        <p>
            <label>
                 Name: 
                <input type="text" name="name">
            </label>
        </p>


       <select id="sign"
            name="sign">
            <option name="inf_egal" value="<="><=</opion> 
            <option name ="sup_egal"value=">=">>=</opion> 
            <option name="egal" value="==">==</opion> 
    </select>
        <input type="text" name="test">
        <p>
            <label>
                 Page: 
                <input type="text" name="page">
            </label>
        </p>
        
        <br><input type="submit" name ="Search" value="Search">
</form>
</body>
</html>