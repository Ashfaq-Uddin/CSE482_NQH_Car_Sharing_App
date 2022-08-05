<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>

  <div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="New%20addition/contact_us_email_enabled/contact_us.php">Contact</a>
  <a href="about_us.php">About Us</a>
  <a href="admin.php">User Data List</a>
  <a href="logout.php">Log out</a>
</div>

  <link rel="stylesheet" type="text/css" href="css/as.css">
</head>
<body>
<?php
       $un=$_SESSION['un'];
       if(!$un)
       {
         header("Location:login.php");
       }
      ?>

 <br><br><br>
<div align="center">
  <form method="POST">

      <input id="first" type="text" name="name" style="font-size: 18px; width: 200px; height: 30px; border-radius: 10px;" placeholder="Name"  autofocus required />

       <input name="sub" type="submit" value="Search" style="background-color:whitesmoke;font-size:18px;border-radius: 10px;width: 100px;height: 40px;" />
</form>
<?php
if(isset($_POST['sub']))
{
  $name=@$_POST['name'];
  $q=$db->prepare("SELECT * FROM driver_list WHERE name='$name'");
         $q->setFetchMode(PDO::FETCH_OBJ);
         $q->execute();
         if($row=$q->fetch())
         {
          ?>
          <br>
          <table id="customers" style="margin: 0px auto;">
  <tr>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Phone Number</th>
    <th>Seat Available</th>
    <th>Address</th>
    <th>Car Name</th>
  </tr> 
  <tr>
    <td><?php echo $row->id; ?></td>
    <td><?php echo $row->name; ?></td>
    <td><?php echo $row->gender; ?></td>
    <td><?php echo $row->number; ?></td>
    <td><?php echo $row->seats; ?></td>
    <td><?php echo $row->address; ?></td>
    <td><?php echo $row->car_name; ?></td>
  </tr>
          </table>
<?php
         }
         
         else
         {
           echo "Name Does not exist";
         }
      }
        ?>
        <div>
  <br>
<p align="center" style="font-family: sans-serif; font-size: 25px; color: white;">Driver's Data List</p>
<br>
<table id="customers" style="margin: 0px auto;">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Phone Number</th>
    <th>Seat Available</th>
    <th>Address</th>
    <th>Car Name</th>
  </tr>
  <?php
$q=$db->query("SELECT * FROM driver_list");
while ($p=$q->fetch(PDO::FETCH_OBJ)) {
  ?>
    <tr>
    <td><?= $p->id; ?></td>
    <td><?= $p->name; ?></td>
    <td><?= $p->gender; ?></td>
    <td><?= $p->number; ?></td>
    <td><?= $p->seats; ?></td>
    <td><?= $p->address; ?></td>
    <td><?= $p->car_name; ?></td>
   
  </tr>
  <?php
}
   ?>
 </table>
</div>

</body>
</html>
