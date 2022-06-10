<?php
include 'model.php';
$obj = new Model();
// print_r($obj)
if(isset($_POST['submit']) ){
    // echo("hello");
    // print_r($obj); 
    $obj->insertRecord($_POST);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>OOP CRUD</h1>
    <div class="container">
    <form action="index.php" method="post">
    <label for="fname">Name</label>
    <input type="text" id="name" name="name" placeholder="Your name..">

    <label for="lname">Email</label>
    <input type="email" id="email" name="email" placeholder="Your Email..">

    
  
    <input type="submit" name="submit" value="Submit">
  </form>
  <h1>A Fancy Table</h1>

<table id="customers">
  <tr>
    <th>S.NO</th>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
  </tr>
  
  
</table>
</body>
</html>