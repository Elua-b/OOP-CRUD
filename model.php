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
            header('location:inde.php?msg=ins');
        }else{
            echo "Error ".$sql. "<br/>".$this->conn->error;
        }
    }
}
$obj=new Model();

?>