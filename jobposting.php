<?php
include("sqlcon.php");
error_reporting(0);
session_start();
if(!isset($_SESSION['uid']) && isset($_SESSION[type]) != "alumni")
{
	
	echo "<script>alert(".$_SESSION[type].");window.location=index.php;</script>";
}
if(isset($_POST[submit]))
{
   $qry = "insert into tbljob(company,jobtitle,qualification,jobdescription,salary,exp_required,noofvacancy,emailid,status,lastdate,alumnid,keyskils,job_location) values (".$_POST[company].",".$_POST[jobtitle].",".$_POST[qualification].",".$_POST[description].",".$_POST[package].",".$_POST[exp_required].",".$_POST[noofvacancy].",".$_POST[emailid].",Active,".$_POST[lastdate].",".$_SESSION['uid'].",".$_POST[keyskills].",".$_POST[joblocation].")";
	 
	 if(mysqli_query($con, $qry))
	 { 
		echo "<script>alert(success!!!);</script>";  
	 }
}
/* ### */  ?>


<?php
include("header.php")
/* ### */  ?>

 
<div class="container">
	<div class="page">
   <h3>Job Posting</h3>
 <div  style="text-align:right; padding-right:20px;">
    <a href="job.php">
    <button class="btn btn-primary"><i class="fa fa-plus"></i> << BACK</button></a>
	<p>&nbsp;</p>
  <div class="btn-group">
  </div>
</div>
<div class="bs-example" data-example-id="simple-horizontal-form">
    <form class="form-horizontal" action="" method="post">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Company</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="company" name="company" placeholder="Company" required>
        </div>
      </div> 
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Job Location</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="joblocation" name="joblocation" placeholder="Job Location" required>
        </div>
      </div>
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Job Title</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="jobtitle" name="jobtitle" placeholder="Job Title" required>
        </div>
      </div> 
	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Qualification</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Qualification" required>
        </div>
      </div> 
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
        <div class="col-sm-6">
		<textarea class="form-control" id="description" name="description" placeholder="Description" rows="3"></textarea> 
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Key Skills</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="keyskills" name="keyskills" placeholder="Key Skills" required>
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Package</label>
        <div class="col-sm-6">
		<input type="text" class="form-control" id="package" name="package" placeholder="Package">
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Experienced Required</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="exp_required" name="exp_required" placeholder="Experienced Required" required>
        </div>
      </div>
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">No. of Vacancy</label>
        <div class="col-sm-6">
          <input type="number" class="form-control" id="noofvacancy" name="noofvacancy" placeholder="No. of Vacancy" required>
        </div>
      </div>
	     <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Reference Email</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Reference Email" required>
        </div>
      </div>
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Last Date</label>
        <div class="col-sm-6">
          <input type="date" class="form-control" id="lastdate" name="lastdate" placeholder="Last Date" required>
        </div>
      </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" class="btn btn-default" name="submit" value="POST">
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

 