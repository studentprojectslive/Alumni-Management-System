<?php
include("sqlcon.php");
if(isset($_POST[register]))
{

	$filename = rand().$_FILES['staffphto']['name'];
	move_uploaded_file($_FILES['staffphto']['tmp_name'],"upload/staff/".$filename);
	
	 $qry = "insert into tblstaff(staffname, qualification, designation, dob, dateof_join, address, contactno, emailid, staff_pass, staffphoto, status) values (".$_POST[lecturename].",".$_POST[qualification].",".$_POST[designation].",".$_POST[dob].",".$_POST[doj].",".$_POST[address].",".$_POST[contactno].",".$_POST[email].",".$_POST[password].",".$filename.",Inactive)";
	 
	 if(mysqli_query($con, $qry))
	 { 
		echo "<script>alert(Record inserted!!!);window.location=login.php;</script>";  
	 }
}
/* ### */  ?>


<?php
include("header.php")
/* ### */  ?>

 
<div class="container">
	<div class="page">
   <h3>Staff Registration</h3>
 
<div class="bs-example" data-example-id="simple-horizontal-form">
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="lecturename" name="lecturename" placeholder="Name" required  onkeypress="return Validate(event);"   >
		  <span id="lblError" style="color: red"></span>
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Qualification</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Qualification" required>
        </div>
      </div> 
	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Date Of Birth</label>
        <div class="col-sm-6">
          <input type="date" class="form-control" id="dob" name="dob" placeholder="Qualification" required>
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Designation</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" required>
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Date of Join</label>
        <div class="col-sm-6">
          <input type="date" class="form-control" id="doj" name="doj" placeholder="Date of Join" required onchange="validateDate(this.value,dob.value)">
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
        <div class="col-sm-6">
		<textarea class="form-control" id="address" name="address" placeholder="Address" rows="3"></textarea> 
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Contact No.</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact no." required="">
        </div>
      </div>
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Photo</label>
        <div class="col-sm-6">
          <input type="file" class="form-control" id="staffphto" name="staffphto" required>
        </div>
      </div>
	     <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email Id</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email Id" required=""  onchange="checkemail(this.value)">
        </div>
      </div>
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-6">
          <input type="Password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
      </div>
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Confirm Password</label>
        <div class="col-sm-6">
          <input type="Password" class="form-control" id="Cpass" name="Cpass" placeholder="Confirm Password" required>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" class="btn btn-default" name="register" value="REGISTER" onclick="return isPasswordMatch();">
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
							 
							if(xmlhttp.responseText.trim() == "error")																							
							{
								  document.getElementById("email").value="";
								  document.getElementById("email").focus();
								  alert("Email Id already Registred");
							}
							 
						}
					}
			var getlink = "ajaxsetup.php?staffemail="+email;
			xmlhttp.open("GET",getlink,true);
			xmlhttp.send();
}


function validateDate(doj, dob)
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
							 
							if(xmlhttp.responseText.trim() == "error")
							{
								  document.getElementById("doj").value="";
								  document.getElementById("doj").focus();
								  alert("Invalid Date. Minimum age 24 years ");
							}
							 
						}
					}
			var getlink = "ajaxsetup.php?doj="+doj+"&sdob="+dob;
			xmlhttp.open("GET",getlink,true);
			xmlhttp.send();
}
</script>

<script>
function isPasswordMatch() {
    var password = document.getElementById("password");
   var confirm_password = document.getElementById("Cpass");
   
 if(document.getElementById("contactno").value.length == 0)
   {
	   alert(Enter Mobile Number);
	   document.getElementById("contactno").focus();
	   return false;
   }
   else if(document.getElementById("contactno").value.length != 10)
   {
	   alert(Inavalid Mobile Number);
	   document.getElementById("contactno").focus();
	   return false;
   }
    else if(password.value == "")
   {
	   alert(Enter Password);
	   password.focus();
	   return false;
   }
   else if(password.value.length < 6 || password.value.length >10)
   {
	   alert(Password length should be between 6 to 10.);
	   password.focus();
	   return false;
   }
   else if(password.value != confirm_password.value) 
	{
			alert(Password Mismatch!!!);
			document.getElementById("password").value = "";
			document.getElementById("Cpass").value = "";
    } 
   else 
   {
    return true;
   }
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