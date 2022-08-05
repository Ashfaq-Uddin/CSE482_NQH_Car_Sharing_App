<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/loginstyle.css">
  
  <title></title>
  
</head>
<body>
  
 <form action="" method="post">
  <h1>Admin Login</h1>
  <input type="email" name="un" placeholder="Email">
  <input type="password" name="ps" placeholder="Password">
  <button type="submit" name="sub">Login</button>
</form>
 <?php
      if(isset($_POST['sub']))
      {
         $un=$_POST['un'];
         $ps=$_POST['ps'];
         $q=$db->prepare("SELECT * FROM admin WHERE email='$un' && password='$ps'");
         $q->execute();
         $res=$q->fetchAll(PDO::FETCH_OBJ);
         if($res)
         {

          $_SESSION['un']=$un;
           header("Location:admin.php");
         }
         else
         {
           echo "<script>alert('Wrong User')</script>";
         }
      }
        ?>
</body>
</html>