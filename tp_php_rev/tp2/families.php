<?php
require "Model.php";

$db = Model::getModel();
?>

<ul>
    <?php foreach($db->getFamilyNames() as $element): ?>
        <p> <a href="familyMembers.php?family= <?php echo $element['nom']; ?>"> <?php echo $element['nom']; ?> </a> </p>
    <?php endforeach; ?>
</ul>


