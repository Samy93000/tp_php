<?php
require "Views/view_begin.php";
?>
<form action="?controller=set&action=update" method="post">
   
        <p>
            <label>
                 Name: 
                <input type="text" name="Name" value = "<?php echo $tab['name'] ?>">
            </label>
        </p>

        <p>
            <label>
                 Year: 
                <input type="text" name="Year" value = "<?php echo $tab['year'] ?>" spellcheck="false" data-ms-editor="true">
            </label>
        </p>
        
        <p>
            <label>
                 Birth Date: 
                <input type="text" name="BirthDate" value ="<?php echo $tab['birthdate'] ?>" spellcheck="false" data-ms-editor="true">
            </label>
        </p>

        <p>
            <label>
                 Birth Place: 
                <input type="text" name="BirthPlace" value = "<?php echo $tab['birthplace'] ?>"  spellcheck="false" data-ms-editor="true">
            </label>
        </p>
        
        <p>
            <label>
                 County: 
                <input type="text" name="County" value = "<?php echo $tab['county'] ?>"  spellcheck="false" data-ms-editor="true">
            </label>
        </p>

        <p>
        <?php foreach(Model::getModel()->getCategories() as $categories) :?>
            <label>
                <?php if($categories == $tab['category']): ?>
                    <input type = "radio" name = "Category" value = "<?php echo $categories ?>" checked> <?php echo $categories ?>
                <?php else: ?>
                    <input type = "radio" name = "Category" value = "<?php echo $categories ?>"> <?php echo $categories ?>
                <?php endif; ?>
            </label>
        <?php endforeach; ?>

        </p>
        
        <textarea name="Motivation" cols="70" rows="10" spellcheck="false" data-ms-editor="true"><?php echo $tab['motivation'] ?></textarea>

         <p>
         <input type='hidden' name='Id' value= "<?php echo $_GET['id'] ?>">
         </p>
        
        <p>
            <input type="submit" name ="Add in database" value="Add in database">
        </p>

</form>

<?php
require "Views/view_end.php";
?>