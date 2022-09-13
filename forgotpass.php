<?php
include("sqlcon.php");
if(isset($_SESSION['type']))
{
	echo "<script>window.location=index.php;</script>";
}
if(isset($_POST[fpass]))
{
	if($_POST['utype'] == "1")
	{
		$email=$_POST[email];
		$check_user_data = mysqli_query($con,"SELECT * FROM tbluser WHERE emailid = ".$_POST[email]."") ;
		
		if(mysqli_num_rows($check_user_data) == 0)
		{
			echo "<script>alert(This email address does not exist. Please try again.)</script>";
		}
		else 
		{
			$row = mysqli_fetch_array($check_user_data);
			$email=$row[emailid];
			$to = $email;
			$subject  =  "Here are your login details . . . ";
				$message = "This is in response to your request for reset login password as ALUMNI of our ALUMNI Management System.<br/>Your Name is ".$row[name].".<br/>Your  Password is ".$row[upass].".<br/>Dont give your password to anyone in your group, but do save it somewhere safe. <br/><br/> Enjoy!!..<br/>Regards,<br/>the management";
				include("sendmail.php");
			sendmail($to,$subject,$message,$row[name]);
			echo "<script>alert(Please Check your registered email id..);window.location=forgotpass.php;</script>";
		}
	}
	else if($_POST['utype'] == "2")
	{
		$email=$_POST[email];
		$check_user_data = mysqli_query($con,"SELECT * FROM tblstaff WHERE emailid = ".$_POST[email]."") ;
		
		if(mysqli_num_rows($check_user_data) == 0)
		{
			echo "<script>alert(This email address does not exist. Please try again.)</script>";
		}
		else 
		{
			$row = mysqli_fetch_array($check_user_data);
			$email=$row[emailid];
			$to = $email;
			$subject  =  "Here are your login details . . . ";
			$message = "This is in response to your request for reset login password as Staff of our ALUMNI Management System.<br/>Your Name is ".$row[staffname].".<br/>Your  Password is ".$row[staff_pass].".<br/>Dont give your password to anyone in your group, but do save it somewhere safe. <br/><br/> Enjoy!!..<br/>Regards,<br/>the management";
			sendmail($to,$subject,$message,$row[staffname]);
			echo "<script>alert(Please Check your registered email id..);</script>";
			echo "<script>window.location=forgotpass.php;</script>";
		}
	}
}
include("header.php");
?>
<div class="container">
	<div class="page">
   <h3 align="center" >Forgot Password</h3>
   <div class="bs-example" data-example-id="simple-horizontal-form">
   
 
		 
				<form name="MyForm" method="POST"  class="form-horizontal" action="#" >
						 <div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label" style="text-align:right;">User type</label>
						<div class="col-sm-4">
						 <select name="utype" id="utype" class="form-control" required>
						 <option value="1">Alumni</option>
						  <option value="2">Staff</option>
						 </select>
						</div>
					  </div> 
			            	<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label" style="text-align:right;">Enter Registered Email Id</label>
							<div class="col-sm-4">
							  <input type="email" class="form-control" id="email" name="email" placeholder="Email Id" required>
							</div>
						  </div> 
						  <div class="form-group">
								<div class="col-sm-offset-2 col-sm-8" style="text-align:center;">
								<input type="submit" value="Recover" name="fpass" class="btn btn-primary" width="100%">   
					<input type="button" value="Go back to Home Page" onClick="window.location=index.php" class="btn btn-primary">  
								</div>
					</div>
				</form>
</div>
</div>
</div>
<?php
include("footer.php")
/* ### */  ?>