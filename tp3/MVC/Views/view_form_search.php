<?php
require "Views/view_begin.php";
?>
 
 
 <form action="?controller=search&action=pagination" method="post">
        <p>
            <label>
                 Name: 
                <input type="text" name="name">
            </label>
        </p>

        <p>
            <label>
                 Year: 
                
            </label>
        </p>
       <select id="sign"
            name="sign">
            <option name="inf_egal" value="<="><=</opion> 
            <option name ="sup_egal"value=">=">>=</opion> 
            <option name="egal" value="==">=</opion> 
    </select>
        <input type="text" name="test">
    
        
        <br><input type="submit" name ="Search" value="Search">
</form>

<?php
require "Views/view_end.php";
?>
