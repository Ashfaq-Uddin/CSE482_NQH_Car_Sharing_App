<?php
$db=new PDO('mysql:host=localhost;dbname=car_sharing','root','');
if($db)
{
    echo "";
}
else
{
    echo "Not Connect";
}
?>