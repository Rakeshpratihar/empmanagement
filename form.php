<?php
include("connection.php");
error_reporting(0);
?>
<?php
if(isset($_POST["search"])){
$emid=$_POST["eid"];
$query="SELECT * FROM form WHERE id='$emid'";
$data=mysqli_query($con,$query);
$ar=mysqli_fetch_assoc($data);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Software development</title>
</head>
<body>
    <div class="center">
        <form action="" method="POST">
        <h1>Employee Data Entry Automation Software</h1>
        <div class="form">
            <input type="text" class="textfield" placeholder="Search ID" name="eid" 
            value="<?php if(isset($_POST["search"])){
                echo $ar['id'];
            }?>">
            <input type="text" class="textfield" placeholder="Employee Name" name="ename" value="<?php if(isset($_POST["search"])){
                echo $ar['emp_name'];
            } ?>">
            <select class="textfield" name="gender"> 
                <option value="not selected" >Select Gender</option>
                <option value="male" 
                <?php
                 if($ar['emp_gender']=='male'){
                 echo "selected";
                 }
                ?>
                >Male</option>
                <option value="female"
                     <?php
                 if($ar['emp_gender']=='female'){
                 echo "selected";
                 }
             ?>>Female</option>
                <option value="other"
                     <?php
                 if($ar['emp_gender']=='other'){
                 echo "selected";
                 }
             ?>>other</option>
            </select>
            <input type="text" class="textfield" placeholder="Email Address" name="email" value="<?php if(isset($_POST["search"])){
                echo $ar['emp_email'];
            } ?>">
            <select class="textfield" name="text">
                <option value="not selected">Select Department</option>
                <option value="it" 
                <?php if($ar['emp_deprtment']=='it'){
                echo "selected";
            } ?>
                >It</option>
                <option value="accounts" 
                 <?php if($ar['emp_deprtment']=='accounts'){
                echo "selected";
            } ?>
                >Accounts</option>
                <option value="sales"
                 <?php if($ar['emp_deprtment']=='sales'){
                echo "selected";
            } ?>
                >Sales</option>
                <option value="hr"
                 <?php if($ar['emp_deprtment']=='hr'){
                echo "selected";
            } ?>
                >Hr</option>
                <option value="business development"
                 <?php if($ar['emp_deprtment']=='business development'){
                echo "selected";
            } ?>
                >Business Development</option>
                <option value="marketing"
                 <?php if($ar['emp_deprtment']=='marketing'){
                echo "selected";
            } ?>
                >Marketing</option>
            </select>
            <textarea placeholder="Address" name="address">
             <?php if(isset($_POST["search"])){
                echo $ar['emp_address'];
            } ?>
            </textarea>
            <input type="submit" value="Search" name="search" class="btn">
            <input type="submit" value="Save" name="save" class="btn" style="background-color:green;">
            <input type="submit" value="Modify" name="modify" class="btn" style="background-color:orange;">
            <input type="submit" value="Delete" name="delete" class="btn" style="background-color:red;"
            onclick="return checkdelete()">
            <input type="reset" value="Clear" name="clear" class="btn" style="background-color:blue;">
</div>
</form>
</div>
</body>
</html>
<script>
function checkdelete(){
    return confirm('are you sure you want to delete this record');
}
</script>
<?php
if(isset($_POST["save"])){
   $name=$_POST["ename"];
   $gen=$_POST["gender"];
   $email=$_POST["email"];
   $text=$_POST["text"];
   $add=$_POST["address"];

   $a="INSERT INTO form(emp_name,emp_gender,emp_email,emp_deprtment,emp_address) VALUES('$name','$gen','$email','$text','$add')";
$data=mysqli_query($con,$a);
if($data){
    echo "data insertd";
}
else{
    echo "not inserted";
}
}
?>
<?php
if(isset($_POST["delete"])){
    $id_no=$_POST["eid"];
    $query="DELETE FROM form WHERE id='$id_no'";
   $data=mysqli_query($con,$query);
   if($data){
    echo 'record deleted';
   }
   else{
    echo "faild to delete";
   }
}
?>
<?php
if(isset($_POST["modify"])){
   $empid=$_POST["eid"];
   $name=$_POST["ename"];
   $gen=$_POST["gender"];
   $email=$_POST["email"];
   $text=$_POST["text"];
   $add=$_POST["address"];

   $a="UPDATE form SET emp_name='$name',emp_gender='$gen',emp_email='$email',emp_deprtment='$text',emp_address='$add' WHERE id='$empid'";
$data=mysqli_query($con,$a);
if($data){
    echo "<script>alert('record updated')</script>";
}
else{
    echo "<script>alert('failed to update')</script>";
}
}
?>