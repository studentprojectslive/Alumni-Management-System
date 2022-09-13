<?php
include("sqlcon.php");
if(!isset($_SESSION['type']) || $_SESSION['type'] != "staff")
{
	echo "<script>window.location=index.php</script>";
}
$res = mysqli_query($con, "Select * from tblstaff where staffid=".$_SESSION['uid']);
        $row = mysqli_fetch_array($res);		
			$name = $row[staffname];
			$qualification= $row[qualification];
			$email = $row[emailid];
			$contactno = $row[contactno];
			$designation = $row[designation];
			$dateof_join= $row[dateof_join];
			$address = $row[address];


if(isset($_POST[submit]))
{
	//update query for alumni profile
	$rs = mysqli_query($con,"update tblstaff set staffname=".$_POST[Name].",qualification=".$_POST[qualification].",designation=".$_POST[designation].",address=".$_POST[Address].",contactno=".$_POST[phone]." where staffid=".$_SESSION[staff_id]);
}
/* ### */  ?>

<?php
include("header.php");

/* ### */  ?>

		
<div class="container">
	<div class="page">
   <h3>My Profile</h3>
 
<div class="bs-example" data-example-id="simple-horizontal-form">
       <form class="form-horizontal" method="post">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="Name" name="Name" placeholder="Name" required value="<?php echo $name; /* ### */  ?>">
        </div>
      </div>     
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Date of Join</label>
        <div class="col-sm-6">
          <input type="date" class="form-control" id="Date_Of_join" name="Date_of_join" placeholder="Date of join" value="<?php echo $dateof_join; /* ### */  ?>" readonly>
        </div>
      </div> 
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email Id</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" id="Email" name="Email" placeholder="Email Id" value="<?php echo $email; /* ### */  ?>" readonly >
        </div>
      </div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Contact No.</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="phone" name="phone" placeholder="Contact no." required value="<?php echo $contactno; /* ### */  ?>" readonly>
        </div>
      </div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Qualification</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Qualification" required value="<?php echo 	$qualification ; /* ### */  ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Designation</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" value="<?php echo $designation; /* ### */  ?>" required>
        </div> 
       </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
        <div class="col-sm-6">
		<textarea class="form-control" id="Address" name="Address" placeholder="Address" rows="3" required><?php echo $address; /* ### */  ?></textarea> 
        </div>
      </div> 
	  <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="button" class="btn btn-default" name="updatep" id="updatep" value="Update Profile" onclick="updateprofile()" style="display:block;">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10" style="display:none;" id="disp">
          <input type="submit" class="btn btn-default" name="submit" id="submit" value="UPDATE"  />
		       <input type="submit" class="btn btn-default" name="btncancel" name="btncancel" value="CANCEL"  onclick="window.location.reload();" />
        </div>
      </div>
  </div>	
 
</div>
</div>

<?php
include("footer.php");
/* ### */  ?>
<script>
function updateprofile()
{
	$("#Name").removeAttr(readonly);
	$("#Date_Of_join").removeAttr(readonly);
	$("#phone").removeAttr(readonly);
	$("#qualification").removeAttr(readonly);
	$("#Address").removeAttr(readonly); 
	
	document.getElementById("disp").style.display="block";
	//document.getElementById("btncancel").style.display="block";
	
	document.getElementById("updatep").style.display="none";
}
</script>
 