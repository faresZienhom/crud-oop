<?php include "header.php"?>
<?php include "nav.php"?>



<div class="row">
        <div class="col-md-5 mx-auto">
          <?php
              $id = $_REQUEST['id'];
              $row = $db->find('employees','id');
 
              if (isset($_POST['update'])) {
                if (isset($_POST['name']) && isset($_POST['department']) && isset($_POST['email'])) {
                  if (!empty($_POST['name']) && !empty($_POST['department']) && !empty(($_POST['email'])) ) {
                     
                    $data['id'] = $id;
                    $data['name'] = $_POST['name'];
                    $data['department'] = $_POST['department'];
                    $data['email'] = $_POST['email'];

 
                    $update = $db->update($data);
 
                    if($update){
                      echo "<script>alert('record update successfully');</script>";
                    }else{
                      echo "<script>alert('record update failed');</script>";
                    }
 
                  }else{
                    echo "<script>alert('empty');</script>";
                  }
                }
              }
          ?>
<div class="container">
    <div class="row">
    <div class="col-sm-12">
     <h2 class="p-3 col text-center mt-5 text-white bg-primary"> Edit Eemployees</h2>
    </div>


     <div class="container"  style="margin-bottom:100px;">
    <div class="row">
    <div class="col-sm-12">
     <form  action= ""    method="POST"  >

     
     <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">
            </div>
                    <div class="form-group">
                        <label class="form-label">Department</label>
                        <input type="text" class="form-control" name="department" value="<?php echo $row['department'];?>" >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email"  value="<?php echo $row['email'];?>">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="<?php echo $row['password'];?>">
                    </div>

                    
                    
                    <div class="form-group p-2 my-1">
                    <input type="submit" class="btn btn-primary" value="update" name="update"></button>
                    </div>
                </form>   
    </div>
     </div>
    </div>

 <?php include "footer.php"?>