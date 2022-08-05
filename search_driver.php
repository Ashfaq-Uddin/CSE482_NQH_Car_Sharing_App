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
  <a href="admin_login.php">List</a>
  <a href="d.php">Driver Registration</a>
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
  
  <div align="center">
  <br><br>
  <div class="container">
     
<br>
<form  action="" method="post">
  <select name="seats" style="border-radius: 10px">
    <option>Seats Needed</option>
    <option>0</option>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    </select>

    <select name="pick_up" style="border-radius: 10px">
    <option>Pick Up</option>
    <option>Mirpur</option>
    <option>Dhanmondi</option>
    <option>Uttara</option>
    <option>Bashundhara</option>
    <option>Motijheel</option>
    <option>Mohammadpur</option>
    <option>Gandaria</option>
    </select>

    <select name="drop_out" style="border-radius: 10px">
    <option>Drop Out</option>
    <option>Mirpur</option>
    <option>Dhanmondi</option>
    <option>Uttara</option>
    <option>Bashundhara</option>
    <option>Motijheel</option>
    <option>Mohammadpur</option>
    <option>Gandaria</option>
    </select>
<br>
<?php include 'map.php'; ?>
    </form>

<br></br>

<?php
if(isset($_POST['sub']))
{
  $seats=@$_POST['seats'];
  $pick_up=@$_POST['pick_up'];
  $drop_out=@$_POST['drop_out'];
  $latitude=$_POST['latitude'];
  $longitude=$_POST['longitude'];

?>
<br>
  <table id="customers" style="margin: 0px auto;">
     <tr>
    
    <th>Name</th>
    <th>Gender</th>
    <th>Phone Number</th>
    <th>Seats Available</th>
    <th>Address</th>
    <th>Car Name</th>
    <th>Pick up</th>
    <th>Drop out</th>

  </tr>
    <?php
    $ql=$db->query("SELECT id, abs('$latitude' - latitude) AS a FROM location ORDER BY a LIMIT 2");
    while ($pl=$ql->fetch(PDO::FETCH_OBJ)) {
    $id=$pl->id;

  $q=$db->query("SELECT * FROM driver_list WHERE seats='$seats' AND pick_up='$pick_up' AND drop_out='$drop_out' AND id='$id'");
  $count=0;
  while ($p=$q->fetch(PDO::FETCH_OBJ)) {
    ?>
    <tr>
        <td><?= $p->name; ?></td>
        <td><?= $p->gender; ?></td>
        <td><?= $p->number; ?></td>
        <td><?= $p->seats; ?></td>
        <td><?= $p->address; ?></td>
        <td><?= $p->car_name; ?></td>
        <td><?= $p->pick_up; ?></td>
        <td><?= $p->drop_out; ?></td>
    <?php

      }

      ?>
    </tr>
    <?php

  }
     ?>
  </table>
  <?php

  }

 ?>
  </div>
</div>
</body>
</html>
