<?php
include("sqlcon.php");
if(isset($_POST['Apply']))
{
	$filename = rand().$_FILES['uploadresume']['name'];
	move_uploaded_file($_FILES['uploadresume']['tmp_name'],"upload/cv/".$filename);
	
	$date = date("Y-m-d");
	
	$qry = "insert into tbljobappln(jobid,candidatename,contactno,emailid,applndate,resumecopy,coverletter) values (".$_POST[jobid].",".$_POST[candidatename].",".$_POST[contactno].",".$_POST[email].",$date,".$filename.",".$_POST[coverletter].")";
	if(mysqli_query($con, $qry))
	{ 
		echo "<script>alert(success!!!);</script>";
	}
}
/* ### */  ?>

 
 
 
<div class="bs-example" data-example-id="simple-horizontal-form">
    <form class="form-horizontal" action="" method="post">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label">Candidate Name</label>
        <div class="col-sm-6">
		<input type="hidden" name="jobid" value="<?php echo $_GET['edit_id']; /* ### */  ?>">
          <input type="text" class="form-control" id="candidatename" name="candidatename" placeholder="Candidate Name" required>
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label">Contact No</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact No" required>
        </div>
      </div> 
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
        <div class="col-sm-6">
		<input type="text" class="form-control" id="email" name="email" placeholder="Email">
        </div>
      </div> 
	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label">Cover Letter</label>
        <div class="col-sm-6">
		<textarea class="form-control" id="coverletter" name="coverletter" placeholder="Cover Letter" rows="3"></textarea> 
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-4 control-label">Upload Resume</label>
        <div class="col-sm-6">
		<input type="file" class="form-control" id="uploadresume" name="uploadresume" placeholder="Upload Resume">
        </div>
      </div> 
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" class="btn btn-default" name="Apply" value="APPLY">
		      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>	
 
 
