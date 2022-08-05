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
  <a href="driver_list.php">Driver Data List</a>
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

      <input id="first" type="text" name="firstname" style="font-size: 18px; width: 200px; height: 30px; border-radius: 10px;" placeholder="Name"  autofocus required />

       <input name="sub" type="submit" value="Search" style="background-color:whitesmoke;font-size:18px;border-radius: 10px;width: 100px;height: 40px;" />
</form>
<?php
if(isset($_POST['sub']))
{
  $firstname=@$_POST['firstname'];
  $q=$db->prepare("SELECT * FROM users WHERE firstname='$firstname'");
         $q->setFetchMode(PDO::FETCH_OBJ);
         $q->execute();
         if($row=$q->fetch())
         {
          ?>
          <br>
          <table id="customers" style="margin: 0px auto;">
  <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Username</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>More Information</th>
  </tr> 
  <tr>
    <td><?php echo $row->user_id; ?></td>
    <td><?php echo $row->firstname; ?></td>
    <td><?php echo $row->lastname; ?></td>
    <td><?php echo $row->username; ?></td>
    <td><?php echo $row->email; ?></td>
    <td><?php echo $row->phonenumber; ?></td>
    <td><?php echo $row->moreinformation; ?></td>
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
<p align="center" style="font-family: sans-serif; font-size: 25px; color: white;">User Data List</p>
<br>
<table id="customers" style="margin: 0px auto;">
  <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Username</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>More Information</th>
  </tr>
  <?php
$q=$db->query("SELECT * FROM users");
while ($p=$q->fetch(PDO::FETCH_OBJ)) {
  ?>
    <tr>
    <td><?= $p->user_id; ?></td>
    <td><?= $p->firstname; ?></td>
    <td><?= $p->lastname; ?></td>
    <td><?= $p->username; ?></td>
    <td><?= $p->email; ?></td>
    <td><?= $p->phonenumber; ?></td>
    <td><?= $p->moreinformation; ?></td>
   
  </tr>
  <?php
}
   ?>
 </table>
</div>

<div>
</body>
</html>
