<?php


$connection = new mysqli('localhost','root','','ajax-crudvs');

$data = $connection->query("SELECT * FROM students");

$i =1;
while($stu = $data->fetch_object()) : 

?>
            <tr>
              <td><?php echo $i; $i++;?></td>
              <td><?php echo $stu->name; ?></td>
              <td><?php echo $stu->email; ?></td>
              <td><?php echo $stu->cell; ?></td>
              <td><?php echo $stu->username; ?></td>
              <td><img src="photos/<?php echo $stu->photo; ?>" alt=""></td>
              <td>
                <a view_id="<?php echo $stu->id; ?>" id="profile" class="btn btn-sm btn-info" href="#">View</a>
                <a edit_id="<?php echo $stu->id; ?>" id="edit" class="btn btn-sm btn-warning" href="#">Edit</a>
                <a delete_id="<?php echo $stu->id; ?>" class="btn btn-sm btn-danger delete-btn" href="#">Delete</a>
              </td>
          </tr>



<?php endwhile; 