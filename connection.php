<?php
$server="localhost";
$username="root";
$password="";
$dbname="employee2";
$con=mysqli_connect($server,$username,$password,$dbname);
if($con){
    //echo "connection ok";
}
else{
    echo "not connected";
}
?>