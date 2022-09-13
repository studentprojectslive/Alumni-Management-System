<?php
include("sqlcon.php");
if(isset($_POST[login]))
{
	if($_POST['utype'] == "1")
	{
		$rs = mysqli_query($con,"select * from tbluser where emailid=".$_POST[username]." and upass=".$_POST[password]."");
		if(mysqli_num_rows($rs) > 0)
		{
				$result = mysqli_fetch_array($rs);
				$ts1 = strtotime(date("Y-m-d"));
				$ts2 = strtotime($result[reg_date]);
				
				$d1 = new DateTime(date("Y-m-d"));
				$d2 = new DateTime($result[reg_date]);

				$diff = $d2->diff($d1);
				$age = $diff->d;
				
				$seconds_diff = $ts1 - $ts2;
				
				//echo "<script>alert(".$age.");</script>";
 
			  if($result[status] == "Inactive")
			  {
				   echo "<script>alert(Account Yet to be Verified!!!);</script>";
			  }
			  else  if($result[status] == "Disapproved")
			  {
				   echo "<script>alert(Account disapproved by Admin!!!);</script>";
			  }
			  else if($result[membershiptype] == "Standard" && $age > 365)
			  {
				   echo "<script>alert(Membership Expired..Please Renew the memership!!!);window.location=renew.php?id=$result[0];</script>";
			  }
			  else
			  {
				  
				$_SESSION[uid] = $result[0];
				$_SESSION[student_id] = $result[0];
				$_SESSION[name] = $result[2];
				$_SESSION[type] = "alumni";
				$_SESSION[place] = $result[location];
				
				echo "<script>window.location=index.php;</script>";
			  }
		}
		else
		{
			 echo "<script>alert(Invalid credential!!!!!);</script>";
		} 
	}
	else if($_POST['utype'] == "2")
	{
		$rs = mysqli_query($con,"select * from tblstaff where emailid=".$_POST[username]." and staff_pass=".$_POST[password]." ");
		if(mysqli_num_rows($rs) > 0)
		{
			$result = mysqli_fetch_array($rs);
			 if($result[status] == "Inactive")
			  {
				   echo "<script>alert(Account Yet to be Verified!!!);</script>";
			  }
			  else  if($result[status] == "Disapproved")
			  {
				   echo "<script>alert(Account disapproved by Admin!!!);</script>";
			  }
              else
			  {			  
				$_SESSION[uid] = $result[0];
				$_SESSION[name] = $result[1];
				$_SESSION[type] = "staff";
			
			     echo "<script>window.location=index.php;</script>";
		       }
		}
		else
		{
			echo "<script>alert(Invalid credential!!!!!);</script>";
		}
	}
}

/* ### */  ?>

<?php
include("header.php")
/* ### */  ?>
<div class="container">
	<div class="page">
   <h3 align="center" >Login</h3>
   <div class="bs-example" data-example-id="simple-horizontal-form">
   
<form action="" method="post" class="form-horizontal">
<div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label" style="text-align:right;">User type</label>
        <div class="col-sm-4">
         <select name="utype" id="utype" class="form-control">
		 <option value="1">Alumni</option>
		  <option value="2">Staff</option>
		 </select>
        </div>
      </div> 
<div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label" style="text-align:right;">User Name</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
        </div>
      </div> 
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label" style="text-align:right;">Password</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
      </div> 
	  <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8" style="text-align:center;">
   
         <label for="inputEmail3" class="col-sm-5 control-label" style="text-align:right;"><a href="reg.php">New Alumni?</a>&nbsp;&nbsp;or&nbsp;&nbsp;<a href="staffreg.php">New staff?</a></label>
           <label for="inputEmail3" class="col-sm-3 control-label" style="text-align:right;"><a href="forgotpass.php">Forgot Password</a></label>
      </div> 
	  </div>
 <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8" style="text-align:center;">
        <input type="submit" name="login" value="LOGIN" class="btn btn-default"/>&nbsp;&nbsp;
<input type="reset" name="cancel" value="CANCEL" class="btn btn-default"/> 
        </div>
      </div>
 


</form>
</div>
</div>
</div>
<?php
include("footer.php")
/* ### */  ?>