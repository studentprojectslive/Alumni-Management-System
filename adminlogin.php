<?php
include("sqlcon.php");
session_start();
error_reporting(0);
if(isset($_POST[login]))
{
	$rs = mysqli_query($con,"select * from tbladmin where emailid=".$_POST[adminname]." and apassword=".$_POST[password]." ");
	if(mysqli_num_rows($rs) > 0)
	{
		$result = mysqli_fetch_array($rs);
		  
		$_SESSION[uid] = $result[0];
		$_SESSION[name] = $result[1];
		$_SESSION[type] = "admin";
		
		echo "<script>window.location=index.php;</script>";
	}
	else
	      echo "<script>alert(Invalid credential!!!!!);</script>";
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
        <label for="inputEmail3" class="col-sm-4 control-label" style="text-align:right;">User Name</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="adminname" name="adminname" placeholder="Username" required>
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

