<?php
include("sqlcon.php");
if(isset($_POST[submit]))
{
	$qry = "insert into tbladmin(fullname,emailid,apassword,contactno) values (".$_POST[Name].",".$_POST[Email].",".$_POST[Pass].",".$_POST[phone].")";
	if(mysqli_query($con, $qry))
	{ 		
		echo "<script>alert(A new Admin is Added!!!);</script>";
	}
}
include("header.php")
?>

 
<div class="container">
	<div class="page">
   <h3>Add Admin</h3>
 
<div class="bs-example" data-example-id="simple-horizontal-form">
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Fullname</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="Name" name="Name" placeholder="Name" required  onkeypress="return Validate(event);"  >
		  <span id="lblError" style="color: red"></span>
        </div>
      </div> 
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email Id</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" id="Email" name="Email" placeholder="Email Id" required onchange="checkemail(this.value)">
        </div>
      </div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Contact No.</label>
        <div class="col-sm-6">
          <input type="number" class="form-control" id="phone" name="phone" placeholder="Contact no." required>
        </div>
      </div>
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-6">
          <input type="Password" class="form-control" id="Pass" name="Pass" placeholder="Password" required>
        </div>
      </div>
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Confirm Password</label>
        <div class="col-sm-6">
          <input type="Password" class="form-control" id="Cpass" name="Cpass" placeholder="Confirm Password" required >
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" class="btn btn-default" name="submit" value="ADD" onclick="return Validate()">
		       <input type="reset" class="btn btn-default" name="cancel" value="CANCEL">
        </div>
      </div>
    </form>
  </div>	
 
</div>
</div>

<?php
include("footer.php");
/* ### */  ?>

<script type="text/javascript">
    function Validate()
	{
        var password = document.getElementById("Pass").value;
        var confirmPassword = document.getElementById("Cpass").value;
		
        var month = document.getElementById("cardexpmonth").value;
        var year = document.getElementById("year").value;
    }
</script>
<script>
function checkemail(email)
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
							 
							if(xmlhttp.responseText == "error")																							
							{
								  document.getElementById("Email").value="";
								  document.getElementById("Email").focus();
								  alert("Email Id already Registred");
							}
							 
						}
					}
			var getlink = "ajaxsetup.php?adminemail="+email;
			xmlhttp.open("GET",getlink,true);
			xmlhttp.send();
}
</script>
<script type="text/javascript">
    function Validate(e) {
        var keyCode = e.keyCode || e.which;
 
        var lblError = document.getElementById("lblError");
        lblError.innerHTML = "";
 
        //Regex for Valid Characters i.e. Alphabets.
        var regex = /^[A-Za-z\s]+$/;
 
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            lblError.innerHTML = "Only Alphabets allowed.";
        }
        return isValid;
    }
</script>