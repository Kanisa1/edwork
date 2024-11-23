<?php
if(isset($_POST['submit'])){

    $a=$_POST['name'];
    $b=$_POST['email'];
    $c=$_POST['phone'];
    $d=$_POST['appointment_date'];
    $e=$_POST['department'];
    $f=$_POST['mentor'];
    $g=$_POST['message'];

    $sq=mysqli_connect("localhost","root","","edtech");

    $q="INSERT INTO `appointments`(`id`, `name`, `email`, `phone`, `appointment_date`, `department`, `mentor`, `message`) VALUES ('','$a','$b','$c','$d','$e','$f','$g')";
    
    mysqli_query($sq,$q);
}





?>