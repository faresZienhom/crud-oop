<?php

 class Database {

    private $server = "localhost";
    private $username = "root";
    private $password;
    private $dbname = "company";
    private $conn;
    
    public function __construct(){
    
        
            $this->conn =  mysqli_connect($this ->server , $this -> username, $this -> password,$this->dbname);  
            if(!$this->conn){

                die("Error connect : " . mysqli_connect_errno());
            }
    }

  public function insert($sql)
  {
    if(mysqli_query($this->conn,$sql))
    {
    return " Added success";
    }
    else
     {
        die("Error :" .mysqli_error($this->conn) );
    }
  }



  public function read($table){
    $data = [];

    $sql = "SELECT * FROM $table";
    $result = mysqli_query($this->conn,$sql);
    if($result){
        if(mysqli_num_rows($result))
        {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;

        }
    }
    return $data;
}
else{
    die("Error :" .mysqli_error($this->conn) );

}
  }



  public function find($table,$id){

    $sql = "SELECT * FROM $table WHERE 'id'= '$id' ";
    $result = mysqli_query($this->conn,$sql);
    if($result){

        if(mysqli_num_rows($result) > 0)
        {
        return mysqli_fetch_assoc($result) ;
          
         }
    return false;
}
else
{
    die("Error :" .mysqli_error($this->conn) );

}
  }


  
  public function update($data){

    $query = "UPDATE employees SET name='$data[name]', department='$data[department]' ,email='$data[email]' WHERE id='$data[id] '";

    if ($sql = $this->conn->query($query)) {
        return true;
    }else{
        return false;
    }
}   

public function delete($table,$id){
 
  $sql = "DELETE FROM $table where id = '$id'";
  if (mysqli_query($this->conn,$sql)){
      return  "Daleted success";
  
  }

else
{
    die("Error :" .mysqli_error($this->conn) );

}
  }



    public function enc_password($password){

        return sha1($password);
    }
 }

