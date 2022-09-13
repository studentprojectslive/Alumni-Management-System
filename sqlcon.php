<?php
error_reporting(0);
session_start();
?>
<?php
$server = "localhost";
$user="root";
$pass="";
$db="alumni_management_system";
$con = mysqli_connect($server,$user,$pass,$db);
if(!$con)
{
	echo "mysql connection error ".mysqli_error($con);
	
}
/* ### */  ?>