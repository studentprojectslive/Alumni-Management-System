<?php
include("sqlcon.php");

if(isset($_POST[submit]))
{
	$qry = "insert into tbluser(gender,name, dob, emailid,phone,pyear, courseid,occupation,address,message,upass,status,location,membershiptype,mfee,paytype,bank,cardno,cvv,expmonth,expyear,reg_date) values (".$_POST[Gender].",".$_POST[Name].",".$_POST[Date_Of_Birth].",".$_POST[Email].",".$_POST[phone].",".$_POST[Passing_Out_year].",".$_POST[course].",".$_POST[Occupation].",".$_POST[Address].",".$_POST[Message].",".$_POST[Pass].",Inactive,".$_POST[location].",".$_POST[membershiptype].",".$_POST[membershipfee].",".$_POST[paytype].",".$_POST[bankname].",".$_POST[cardno].",".$_POST[cvv].",".$_POST[cardexpmonth].",
	".$_POST[year].",".date("Y-m-d").")";
	if(mysqli_query($con, $qry))
	{ 
		$uid = mysqli_insert_id($con);
		//$filename = "noimage.png";
		
		$filename = rand().$_FILES['aphoto']['name'];
		move_uploaded_file($_FILES['aphoto']['tmp_name'],"upload/alumni/".$filename);
		
		$rs1=mysqli_query($con,"insert into tblalumniphoto(userid,profilepic) values(".$uid.",".$filename.")");
		echo "<script>alert(success!!!);</script>";
	}
}
?>

<?php
include("header.php")
?>
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
								  document.getElementById("Email").value="";
								  document.getElementById("Email").focus();
								  alert("Email Id already Registred");
							}
							 
						}
					}
			var getlink = "ajaxsetup.php?useremail="+email;
			xmlhttp.open("GET",getlink,true);
			xmlhttp.send();
}
</script>
 
<div class="container">
	<div class="page">
   <h3>Alumni Registration</h3>
 
<div class="bs-example" data-example-id="simple-horizontal-form">
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Profile Photo</label>
        <div class="col-sm-6">
          <input type="file" class="form-control" id="aphoto" name="aphoto" required>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="Name" name="Name" placeholder="Name" required  onkeypress="return Validate(event);"  >
		  <span id="lblError" style="color: red"></span>
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>
        <div class="col-sm-6">
         <input type="Radio" name="Gender" value="Male"  checked/> Male
<input type="Radio" name="Gender" value="Female" /> Female<br/>
        </div>
      </div> 	    
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Date of Birth</label>
        <div class="col-sm-6">
          <input type="date" class="form-control" id="Date_Of_Birth" name="Date_Of_Birth" placeholder="Date of Birth" required>
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
        <label for="inputEmail3" class="col-sm-2 control-label">Passout Year</label>
        <div class="col-sm-6">
          <input type="number" class="form-control" id="Passing_Out_year" name="Passing_Out_year" placeholder="Passout Year" required onchange="validateDate(this.value,Date_Of_Birth.value)">
        </div>
      </div>
	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Select Course</label>
        <div class="col-sm-6">
         <select name="course" id="course" class="form-control">
			<?php
			$qry = "Select * from tblcourse";
			$res = mysqli_query($con, $qry);
			echo "<option value=0>-- Select --</option>";
			while($row = mysqli_fetch_array($res))
			{
				echo "<option value=$row[0]>$row[1]</option>";
			}
			?>
			</select>
        </div>
      </div>
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Occupation</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="Occupation" name="Occupation" placeholder="Occupation" required>
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
        <div class="col-sm-6">
		<textarea class="form-control" id="Address" name="Address" placeholder="Address" rows="3"></textarea> 
        </div>
      </div> 
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Region</label>
        <div class="col-sm-6">
         <select name="location" id="location" class="form-control">
			<?php
			$qry = "Select * from tblregion";
			$res = mysqli_query($con, $qry);
			echo "<option value=0>-- Select Region --</option>";
			while($row = mysqli_fetch_array($res))
			{
				echo "<option value=$row[0]>$row[1]</option>";
			}
			?>
			</select>
        </div>
      </div>
        <div class="form-group">
	     <label for="inputEmail3" class="col-sm-2 control-label">Membership Type</label>
        <div class="col-sm-6">
	    <input type="Radio" name="membershiptype" value="Standard" onclick="updatecost(this.value)" checked />Standard
        &nbsp;&nbsp;<input type="Radio" name="membershiptype" value="Premium" onclick="updatecost(this.value)"/> Premium<br/>
        </div> 
       </div> 
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Membership Fee</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="membershipfee" readonly name="membershipfee" placeholder="Membership Fee" required value="1000.00">
        </div>
      </div> 
       <div class="form-group">
	     <label for="inputEmail3" class="col-sm-2 control-label">Pay Type</label>
        <div class="col-sm-6">
	    <input type="Radio" name="paytype" value="Debitcard" checked /> Debit Card
        &nbsp;&nbsp;<input type="Radio" name="paytype" value="Creditcard" /> Credit Card<br/>
        </div> 
       </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Bank Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="bankname" name="bankname" placeholder="Bank Name" required>
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Card No</label>
        <div class="col-sm-6">
          <input type="number" class="form-control" id="cardno" name="cardno" placeholder="Card No" required>
        </div>
      </div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">CVV</label>
        <div class="col-sm-6">
          <input type="Password" class="form-control" id="cvv" name="cvv" placeholder="CVV" required >
        </div>
      </div>
	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Card Expire Month</label>
        <div class="col-sm-6">
         <select name="cardexpmonth" id="cardexpmonth" class="form-control">
         <option value=0>--Select -- </option> 
		 <option value=1>1</option>
		 <option value=2>2</option>
		 <option value=3>3</option>
		 <option value=4>4</option>
		 <option value=5>5</option>
		 <option value=6>6</option>
		 <option value=7>7</option>
		 <option value=8>8</option>
		 <option value=9>9</option>
		 <option value=10>10</option>
		 <option value=11>11</option>
		 <option value=12>12</option>
		 </select>
         </div></div>
          <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Year</label>
          <div class="col-sm-6">
         <select name="year" id="year" class="form-control">
         <option value=0>--Select -- </option>
		 <option value=2017>2017</option>
		 <option value=2018>2018</option>
		 <option value=2019>2019</option>
		 <option value=2020>2020</option>
		 <option value=2021>2021</option>
		</select>
		  </div>
        </div>
      
     
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Message</label>
        <div class="col-sm-6">
		<textarea class="form-control" id="Message" name="Message" placeholder="Message" rows="3"></textarea> 
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
          <input type="submit" class="btn btn-default" name="submit" value="REGISTER" onclick="return Validate()">
		       <input type="reset" class="btn btn-default" name="cancel" value="CANCEL">
        </div>
      </div>
    </form>
  </div>	
 
</div>
</div>

<?php
include("footer.php");
?>

<script type="text/javascript">


function validateDate(date, dob)
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
								  document.getElementById("Passing_Out_year").value="";
								  document.getElementById("Passing_Out_year").focus();
								  alert("Invalid Passout Year");
							}
							 
						}
					}
			var getlink = "ajaxsetup.php?passdate="+date+"&dob="+dob;
			xmlhttp.open("GET",getlink,true);
			xmlhttp.send();
}

    function Validate() {
        var password = document.getElementById("Pass");
        var confirmPassword = document.getElementById("Cpass");
		
        var month = document.getElementById("cardexpmonth").value;
        var year = document.getElementById("year").value;
		
		var objdate = new Date();
		var cur_month = objdate.getUTCMonth()+1;
		var cur_year = objdate.getUTCFullYear();
		
		if(document.getElementById("phone").value == "")
		   {
			   alert(Enter Mobile Number);
			   document.getElementById("phone").focus();
			   return false;
		   }
		else if(document.getElementById("phone").value.length != 10)
		   {
			   alert(Inavalid Mobile Number);
			   document.getElementById("phone").focus();
			   return false;
		   }
	   else if(document.getElementById("cardno").value == "")
		{
			alert("Enter Card Number");
			document.getElementById("cardno").focus();
			return false;
		}
		 else if(document.getElementById("cardno").value.length != 16)
		{
			alert("Invalid Card Number");
			document.getElementById("cardno").value="";
			document.getElementById("cardno").focus();
			return false;
		}
		else if(document.getElementById("cvv").value == "")
		{
			alert("Please Enter CVV");
			document.getElementById("cvv").focus();
			return false;
		}
		else if(document.getElementById("cvv").value.length != 3)
		{
			alert("Invalid CVV");
			document.getElementById("cvv").value="";
			document.getElementById("cvv").focus();
			return false;
		}
		else if(month == 0)
		{
			alert("Select Month");
			return false;
		}
		else if(year == 0)
		{
			alert("Select Year");
			return false;
		}
		else if(month < cur_month && year == cur_year)
		{
			alert(Card Expired!!!);
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
	   else if(password.value != confirmPassword.value) 
		{
			alert(Password Mismatch!!!);
			document.getElementById("Pass").value = "";
			document.getElementById("Cpass").value = "";
		} 
		 else   
		 {
        return true;
		 }
    }
	
	function updatecost(type)
	{
		if(type == "Standard")
		{
			document.getElementById("membershipfee").value = "1000.00";
		}
		else if(type == "Premium")
		{
			document.getElementById("membershipfee").value = "10,000.00";
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