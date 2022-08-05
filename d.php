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
  <a href="search_driver.php">Search Driver</a>
  <a href="logout.php">Log out</a>
</div>

	<link rel="stylesheet" type="text/css" href="css/as1.css">
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
  <br>
  <div class="container">
     
<br>
<form  action="" method="post">

  <input id="first" type="text" name="name" style="font-size: 18px; width: 180px; height: 30px; border-radius: 10px;" placeholder="Full Name"  autofocus required /><br><br>

  <label for="Gender">Gender:</label>
	<input type="radio" name="gender" value="Male"/>Male
	<input type="radio" name="gender" value="Female"/>Female
	<input type="radio" name="gender" value="Others"/>Others
	<br><br>
	<input id="phone" type="text" name="number" style="font-size: 18px; width: 180px; height: 30px; border-radius: 10px;" placeholder="+8801********" required /><br><br>

	<select name="seats" style="border-radius: 10px">
		<option>Seats</option>
		<option>0</option>
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
	</select><br><br>
		<input id="first" type="text" name="address" style="font-size: 18px; width: 180px; height: 30px; border-radius: 10px;" placeholder="Address"  autofocus required /><br><br>

		<input id="first" type="text" name="car_name" style="font-size: 18px; width: 180px; height: 30px; border-radius: 10px;" placeholder="Car Name"  autofocus required /><br><br>

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
<?php include 'map.php'; ?>
    </form>

     <?php
    if(isset($_POST['sub'])){
    	$id=uniqid();
        $name=$_POST['name'];
        $gender=@$_POST['gender'];
        $number=$_POST['number'];
        $seats=$_POST['seats'];
        $address=$_POST['address'];
        $car_name=$_POST['car_name'];
        $pick_up=$_POST['pick_up'];
        $drop_out=$_POST['drop_out'];
				

        $q=$db->prepare("INSERT INTO driver_list(id,name,gender,number,seats,address,car_name,pick_up,drop_out) VALUES (:id,:name,:gender,:number,:seats,:address,:car_name,:pick_up,:drop_out)");

        $q->bindValue('id',$id);
        $q->bindValue('name',$name);
        $q->bindValue('gender',$gender);
        $q->bindValue('number',$number);
        $q->bindValue('seats',$seats);
        $q->bindValue('address',$address);
        $q->bindValue('car_name',$car_name);
        $q->bindValue('pick_up',$pick_up);
        $q->bindValue('drop_out',$drop_out);

        if($q->execute()){
                    $latitude=$_POST['latitude'];
					$longitude=$_POST['longitude'];
					$l=$db->prepare("INSERT INTO location(id,latitude,longitude) VALUES (:id,:latitude,:longitude)");
					$l->bindValue('id',$id);
					$l->bindValue('latitude',$latitude);
					$l->bindValue('longitude',$longitude);

        if($l->execute()){
	          echo "<script>alert('Registration Succesfull!')</script>";
              }
        }
        else{
            echo "<script>alert('Registration Failed!')</script>";
        }
    }

    ?>

	

</body>
</html>