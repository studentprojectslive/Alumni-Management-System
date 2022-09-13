<?php
include("sqlcon.php");
if(isset($_POST[update]))
{
	if(isset($_SESSION['type']))
	{
		if($_SESSION['type'] == "alumni")
		{
			 $rs = mysqli_query($con,"update tbluser set upass=".$_POST[newpass]." where userid=".$_SESSION['uid']);
				if($rs)
				{
					echo "<script>alert(Password Updated!!);</script>";
				} 
		}
		else if($_SESSION['type'] == "admin")
		{
			 $rs1 = mysqli_query($con,"update tbladmin set apassword=".$_POST[newpass]." where adminid=".$_SESSION['uid']);
				if($rs1)
				{
					echo "<script>alert(Password Updated!!);</script>";
				}
		}
		else if($_SESSION['type'] == "staff")
		{
			 $rs2 = mysqli_query($con,"update tblstaff set staff_pass=".$_POST[newpass]." where staffid=".$_SESSION['uid']);
				if($rs2)
				{
					echo "<script>alert(Password Updated!!);</script>";
				}
		}
	}
	else
	{
		echo "<script>alert(Please login !!);window.location=index.php;</script>";
	}
}


/* ### */  ?>

<?php
include("header.php")
/* ### */  ?>
<div class="container">
	<div class="page">
   <h3 align="center" >Change Password</h3>
   <div class="bs-example" data-example-id="simple-horizontal-form">
   
<form action="" method="post" class="form-horizontal">
<div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label" style="text-align:right;">Current Password</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="curpass" name="curpass" placeholder="Current Password" required onchange="checkpass(this.value)">
        </div>
      </div> 
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label" style="text-align:right;">New Password</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Password" required>
        </div>
      </div> 
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label" style="text-align:right;">Retype Password</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="retypepass" name="retypepass" placeholder="Password" required>
        </div>
      </div> 
 <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8" style="text-align:center;">
        <input type="submit" name="update" value="UPDATE" class="btn btn-default"  onclick="isPasswordMatch()"/>&nbsp;&nbsp;
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

<script>
function checkpass(pass)
{
	if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						 
						 if(xmlhttp.responseText.trim() =="error")
						 {
							 alert("invalid current password");
							 document.getElementById("curpass").value="";
							 document.getElementById("curpass").focus();
						 }
					}
				}
		var getlink = "ajaxsetup.php?p="+pass;
        xmlhttp.open("GET",getlink,true);
        xmlhttp.send();
	
}

function isPasswordMatch() {
    var password = document.getElementById("newpass");
   var confirm_password = document.getElementById("retypepass");

    if(password.value != confirm_password.value) 
	{
    confirm_password.setCustomValidity("Passwords Dont Match");
    } 
   else 
   {
    confirm_password.setCustomValidity();
   }
}
</script>

 