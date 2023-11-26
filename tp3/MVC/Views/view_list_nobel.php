<?php
require "Views/view_begin.php";
?>
<table>
    
    <tr>
        <th>Name</th>
        <th>Category</th>
        <th>Year</th>
        <th class='sansBordure '></th>
        <th class='sansBordure '></th>        
    </tr>

    <?php foreach($datas as $data): ?>
        <tr>
             <td><a href='?controller=list&action=informations&id=<?php echo $data['id']; ?>'><?php echo $data['name'] ?></a></td>
             <td><?php echo $data["category"]; ?></td>
             <td><?php echo $data['year']; ?></td>";
             <td class='sansBordure'><a href='?controller=set&action=remove&id="<?php echo $data['id']; ?>"'><img src='Content/img/remove-icon.png' alt='Croix' class='icone'></a></td>";
             <td class='sansBordure'><a href='?controller=set&action=form_update&id="<?php echo $data['id']; ?>"'><img src='Content/img/edit-icon.png' alt='Edit' class='icone'></a></td>";
        </tr>

    <?php endforeach;?>


    





</table>

<?php
require "Views/view_end.php";
?>


