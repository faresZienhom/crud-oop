<?php include "header.php"?>
<?php include "nav.php"?>
<?php 



$id = $_REQUEST['id'];
$delete = $db->delete('employees',$id);

if ($delete) {
    echo "<script>alert('delete successfully');</script>";
    header("location: employees.php"); 
}
else{
    echo " error";
}
    ?>