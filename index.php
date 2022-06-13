<?php
include 'model.php';
$obj = new Model();
// print_r($obj)
if(isset($_POST['submit']) ){
    // echo("hello");
    // print_r($obj); 
    $obj->insertRecord($_POST);
}
if(isset($_POST['update']) ){
  // echo("hello");
  // print_r($obj); 
  $obj->updateRecord($_POST);
}
if(isset($_GET['deleteid']) ){
  // echo("hello");
  // print_r($obj); 
  $delid=$_GET['deleteid'];
  $obj->deleteRecord($delid);
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
        <?php
        if(isset($_GET['msg']) AND $_GET['msg']=='ins'){
            echo '<div>Record Inserted successfully...!</div>';
        }
        if(isset($_GET['msg']) AND $_GET['msg']=='ups'){
          echo '<div>Record updated successfully...!</div>';
      }
      if(isset($_GET['msg']) AND $_GET['msg']=='del'){
        echo '<div>Record deleted successfully...!</div>';
    }
        ?>
        <?php 
        if(isset($_GET['editid'])){
  $editid=$_GET['editid'];
  $myrecord=$obj->displayRecordById($editid);
  ?>
   <form action="index.php" method="post">
    <label for="fname">Name</label>
    <input type="text" id="name" value="<?php echo $myrecord['name'];?>" name="name" placeholder="Your name.."/>

    <label for="lname">Email</label>
    <input type="email" id="email" name="email"  value="<?php echo $myrecord['email'];?>"placeholder="Your Email.."/>

    
  <input type="hidden" name="hid" value="<?php echo $myrecord['id'];?>">
    <input type="submit" name="update" value="update"/>
  </form>
  <?php
} else{
?>
    <form action="index.php" method="post">
    <label for="fname">Name</label>
    <input type="text" id="name"  name="name" placeholder="Your name.."/>

    <label for="lname">Email</label>
    <input type="email" id="email" name="email" placeholder="Your Email.."/>
    <input type="submit" name="submit" value="Submit"/>
  </form>
  <?php }?>
  <h1>Registration Table</h1>

<table id="customers">
  <tr>
    <th>S.NO</th>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
  </tr>
  <?php
  $data=$obj->displayRecord();
  $sno=1;
  foreach($data as $value){
    ?>

    <tr>
      <td>
        <?php echo $sno++;?>
      </td>
      <td>
        <?php echo $value['name'];?>
      </td>
      <td>
        <?php echo $value['email'];?>
      </td>
      <td id="action">
        <a href="index.php?editid=<?php echo $value['id'];?>">Edit</a>
        <a  id="del" href="index.php?deleteid=<?php echo $value['id'];?>">Delete</a>

      </td>
    </tr>
    <?php
  }
  ?>
  
  
</table>
</body>
</html>