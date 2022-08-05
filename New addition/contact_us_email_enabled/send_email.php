<?php
    if(isset($_POST['submit'])){
        $part1 = "Dear Developers,\n";
        $name = $_POST['name'];
        $part2 = " has sent some messages regarding the program.\n";
        $part3 = "User's Comment:\n";
        $desc = $_POST['message'];
        $linebreak = "\n";
        $part4 = "User's rating: ";
        $rate = $_POST['checkbox'];
        $part5 = "\nSend email or reply to the user at ";
        $emailAddr = $_POST['email'];
        
        $message = $part1.$name.$part2.$part3.$desc.$linebreak.$linebreak.$part4.$rate.$part5.$emailAddr;


        // echo($message);



        $to_email = "kazimosaddequr@gmail.com";
        $subject = "Review of software \"car sharing\"";
        $body = $message;
        $headers = "From: dl8196971@gmail.com";
        
        if ( mail($to_email, $subject, $body, $headers)) {
            echo("Email successfully sent to $to_email...");
        } else {
            echo("Email sending failed...");
        }
    }
?>