<?php include "header.php"?>
<?php include "nav.php"?>


<?php

   $departments = array("it","cs","ts");
   $error = '';
   $success = "";

  if(isset($_POST['submit'])){

     $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
     $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
     $department = filter_var($_POST['department'],FILTER_SANITIZE_STRING);
     $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);

   if (empty($name) or empty($email) or empty($department) or empty($password)){

    $error = "please fill all fields";
   }
   else{

    if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $department = strtolower($department);
        if(in_array($department,$departments)){
            if(strlen($password) > 6){

                $newpassword = $db->enc_password($password);
                $sql = "INSERT INTO employees (name, email, department,password)
                VALUES ('$name', '$email', '$department','$newpassword')";
                $success = $db->insert($sql);

            }else{
                $error =" pasword must be greater than 6 char";
            }

        }else{
            $error = "Department not found";

        }


    }else{
        $error = "please type valied email";
    }
   }


  }

?>


<div class="container">
    <div class="row">
    <div class="col-sm-12">
     <h2 class="p-3 col text-center mt-5 text-white bg-primary"> Add New Eemployees</h2>
    </div>
    <div class="col-sm-12">
        <?php if($error != ""): ?>
            <h2 class="p-2 col text-center mt-5 alert alert-danger"><?php echo $error;?></h2>
<?php endif;?>

<div class="col-sm-12">
        <?php if($success != ""): ?>
            <h2 class="p-2 col text-center mt-5 alert alert-success"><?php echo $success;?></h2>
<?php  endif;?>
    </div>
    </div>
    </div>

     <div class="container"  style="margin-bottom:100px;">
    <div class="row">
    <div class="col-sm-12">
     <form  action= "<?php $_SERVER['PHP_SELF'];?>"    method="POST"  >
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Department</label>
                        <input type="text" class="form-control" name="department">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    
                    
                    <div class="form-group p-2 my-1">
                    <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                    </div>
                </form>   
    </div>
     </div>
    </div>

 <?php include "footer.php"?>