<?php
class Model{
    private $server='localhost';
    private $username='root';
    private $password='';
    private $dbname='oopdb';
    private $conn;
    function __construct()
    {
        $this->conn =new mysqli($this->server,$this->username,$this->password,$this->dbname);
        if($this->conn->connect_error){
            echo 'connection failed';
        }
        else{
          return $this->conn;  
        }
    } 
    public function insertRecord($post){
        // echo 'insert function call';
        
        $name=$post['name'];
        $email=$post['email'];
        $sql="INSERT INTO users(name,email)VALUE('$name','$email')";
        $result=$this->conn->query($sql);
        if($result){
            header('location:index.php?msg=ins');
        }else{
            echo "Error ".$sql. "<br/>".$this->conn->error;
        }
    }
    public function updateRecord($post){
        // echo 'insert function call';
        
        $name=$post['name'];
        $email=$post['email'];
        $editid=$post['hid'];
        $sql="UPDATE users SET name='$name', email='$email' WHERE id=$editid";
        $result=$this->conn->query($sql);
        if($result){
            header('location:index.php?msg=ups');
        }else{
            echo "Error ".$sql. "<br/>".$this->conn->error;
        }
    }
    public function displayRecord(){
        $sql="SELECT * FROM users";
        $result=$this->conn->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $data[]=$row;
            }
            return $data;
        }
    }
    public function displayRecordById($editid){
        $sql="SELECT * FROM users WHERE id='$editid'";
        $result= mysqli_query($this->conn,$sql);
        if(mysqli_num_rows($result)==1){
            $row=$result->fetch_assoc();
            
            return $row;
        }
    }
    public function deleteRecord($delid){
        $sql="DELETE FROM  users Where id='$delid'";
        $result=$this->conn->query($sql);
        if($result){
            header('location:index.php?msg=del');
        }else{
            echo "Error".$sql."<br/>".$this->conn->error;
        }
    }
}
$obj=new Model();
