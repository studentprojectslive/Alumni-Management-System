<?php
include("sqlcon.php");
if(isset($_GET['p']))
{
	if(isset($_SESSION['type']))
	{
		if($_SESSION['type'] == "alumni")
		{
			$user = $_SESSION[uid];
			$rs = mysqli_query($con, "Select * from tbluser where upass=".$_GET['p']." and userid=$user");
			if(mysqli_num_rows($rs) > 0)
			{
				echo "success";
			}
			else
			{
				echo "error";
			}
		}
		
		if($_SESSION['type'] == "staff")
		{
			$user = $_SESSION[uid];
			$rs = mysqli_query($con, "Select * from tblstaff where staff_pass=".$_GET['p']." and staffid=$user");
			if(mysqli_num_rows($rs) > 0)
			{
				echo "success";
			}
			else
			{
				echo "error";
			}
		}
		
		if($_SESSION['type'] == "admin")
		{
			$user = $_SESSION[uid];
			$rs = mysqli_query($con, "Select * from tbladmin where apassword=".$_GET['p']." and adminid=$user");
			if(mysqli_num_rows($rs) > 0)
			{
				echo "success";
			}
			else
			{
				echo "error";
			}
		}
	}
}	
	if(isset($_GET[locid]))
	{
		$user = $_GET[locid];
			$rs = mysqli_query($con, "Select * from tbluser where status=Active and location=".$user);
			echo "<option value=0>-- Select --</option>";
			while($row = mysqli_fetch_array($rs))
			{
				echo "<option value=$row[0]>".$row[2]."</option>";
			}
	}

	
if(isset($_GET[useremail]))
{
	$mail = $_GET[useremail];
	
	$rs = mysqli_query($con, "select * from tbluser where emailid=".$mail."");
	if(mysqli_num_rows($rs) > 0)
	{
		echo "error";
	}
	else
	{
		echo "success";
	}
}

if(isset($_GET[staffemail]))
{
	$mail = $_GET[staffemail];
	
	$rs = mysqli_query($con, "select * from tblstaff where emailid=".$mail."");
	if(mysqli_num_rows($rs) > 0)
	{
		echo "error";
	}
	else
	{
		echo "success";
	}
}

	
if(isset($_GET[adminemail]))
{
	$mail = $_GET[adminemail];
	
	$rs = mysqli_query($con, "select * from tbladmin where emailid=".$mail."");
	if(mysqli_num_rows($rs) > 0)
	{
		echo "error";
	}
	else
	{
		echo "success";
	}
}

if(isset($_GET[date]))
	{ 
		$today 	= strtotime(date("Y-m-d"));
		$expiration_date = strtotime($_GET[date]);
		if ($expiration_date < $today) {
		 echo "error";
		}
		else
			echo "";
		
	}
	
	
if(isset($_GET[passdate]))
	{ 
		$d1 = new DateTime($_GET[passdate].-06-01);
		$d2 = new DateTime($_GET[dob]);

		$diff = $d2->diff($d1);

		$age = $diff->y;
		if($age < 18)
		{
			echo "error";
		}
		else
		{
			echo "";
		}

	}
	
	if(isset($_GET[doj]))
	{ 
		$d1 = new DateTime($_GET[doj]);
		$d2 = new DateTime($_GET[sdob]);

		$diff = $d2->diff($d1);

		$age = $diff->y;
		if($age < 24)
		{
			echo "error";
		}
		else
		{
			echo "";
		}

	}
/* ### */  ?>