<?php include "header.php"?>
<?php include "nav.php"?>




<div class="container">
    <div class="row">
    <div class="col-sm-12">
     <h2 class="p-3 col text-center mt-5 text-white bg-primary"> All employees</h2>
    </div>
    
    <?php if (count($db->read('employees'))): ?>

    
    <div class="col-sm-12">
          <table class="table table-light">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Edit</th>
                <th>Delete</th>

              </tr>
            </thead>
            <tbody>     
              <?php foreach ($db->read('employees')as $row): ?>
              <tr>
               <td> <?php echo ($row['id']);?></td>
                <td> <?php echo strtolower($row['name']);?></td>
                <td> <?php echo strtolower($row['email']);?></td>
                <td> <?php echo strtolower($row['department']);?></td>
 <td>
   <a href="edit-employee.php?id=<?php echo $row['id']?>" class="btn btn-primary">Edit</a>
   </td> 
   <td>
     <a href="delete-employee.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a>
                </td>



              </tr>
              <?php endforeach;?>

            </tbody>
          </table>
    </div>
    <?php else: ?>
    <div class="col-sm-12">
    <h2 class="p-2 col text-center mt-5 alert alert-danger">not found data</h2>

    </div>
<?php endif;?>

    </div>
</div>


<?php include "footer.php"?>