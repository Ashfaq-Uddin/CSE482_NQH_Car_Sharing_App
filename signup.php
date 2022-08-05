<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/signupstyle.css">



</head>
<body>
    
 <form action="" method="post">
 	<h1>Sign Up</h1>
 	<input type="text" name="firstname" placeholder="First Name" autofocus required>
 	<input type="text" name="lastname" placeholder="Last Name" autofocus required>
 	<input type="text" name="username" placeholder="Username" autofocus required>
 	<input type="email" name="email" placeholder="Email" autofocus required>
 	<input type="password" name="password" placeholder="Password" autofocus required>
 	<input type="password" name="" placeholder="Confirm Password" autofocus required>
 	<input type="text" name="phonenumber" placeholder="Phone No" autofocus required>
 	<input type="text" name="moreinformation" placeholder="More Information" autofocus required>

 	<button type="submit" name="sub">Sign Up</button><br><br>
  
   <li><a href="login.php" type="submit" style="width: 350px;height: 40px;font-size: 20px;background: transparent;color:black;">Login</a></li>
</form>
    <?php
    if(isset($_POST['sub'])){
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $username=$_POST['username'];
        $email=@$_POST['email'];
        $password=$_POST['password'];
        $phonenumber=$_POST['phonenumber'];
        $moreinformation=$_POST['moreinformation'];

        
 $q=$db->prepare("INSERT INTO users(firstname,lastname,username,email,password,phonenumber,moreinformation) VALUES (:firstname,:lastname,:username,:email,:password,:phonenumber,:moreinformation)");

        
        $q->bindValue('firstname',$firstname);
        $q->bindValue('lastname',$lastname);
        $q->bindValue('username',$username);
        $q->bindValue('email',$email);
        $q->bindValue('password',$password);
        $q->bindValue('phonenumber',$phonenumber);
        $q->bindValue('moreinformation',$moreinformation);
      
      if($q->execute())
            {
              echo "<script>alert('Sign Up Successfull')</script>";
            }
            else
            {
              echo "<script>alert('Sign Up Fail')</script>";
            }
         } 
           ?>
</body>
</html>