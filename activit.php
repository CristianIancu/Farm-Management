<?php
session_start();
$con = mysqli_connect("localhost","root","","farmmanagement");

if(isset($_POST['save_radio']))
{
    $type  = $_POST['type'];
    $field  = $_POST['fiel	'];
	$field_bun = (int) $field;
    $query = "INSERT INTO activity (type,field) VALUES ('$type','$field_bun')";
    $query_run = mysqli_query($con, $query);
	
    if($query_run)
    {
        $_SESSION['status'] = "Inserted Successfully";
        header("Location: index.php");
    }
    else{
        $_SESSION['status'] = "Inserted Successfully";
        header("Location: index.php");
    }
}
?>