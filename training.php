<?php
error_reporting(0);
session_start();
include("sqlcon.php");
if(isset($_POST[submit]))
{
   $qry = "insert into tbltraining(topicname,description,courseid,trainingdate,duration,venue,participationdate,refcontactname,refcontactno,status) values (".$_POST[topic].",".$_POST[description].",".$_POST[course].",".$_POST[trainingdate].",".$_POST[duration].",".$_POST[venue].",".$_POST[participationdate].",".$_POST[refcontactname].",".$_POST[refcontactno].",".$_POST[status].")";
	 
	 if(mysqli_query($con, $qry))
	 { 
		echo "<script>alert(success!!!);</script>";  
	 }
}

if(isset($_POST[update]))
{
	$rs = mysqli_query($con,"update tbltraining set topicname=".$_POST[topic].",description=".$_POST[description].",courseid=".$_POST[course].",trainingdate=".$_POST[trainingdate].",duration=".$_POST[duration].",venue=".$_POST[venue].",participationdate=".$_POST[participationdate].",status=".$_POST[status].",refcontactname=".$_POST[refcontactname].",refcontactno=".$_POST[refcontactno]." 
	where trainingid=".$_POST[trid]."");
	if($rs)
	{
		echo "<script>alert(Record updated successfully...!!);window.location=viewtraining.php;</script>";
	}
}

if(isset($_GET[eid]))
{
	$rs = mysqli_query($con, "Select * from tbltraining where trainingid=".$_GET[eid]);
	$row = mysqli_fetch_array($rs);
	$tid = $row[0];
	$topic = $row[1];
	$descr = $row[2];
	$courseid = $row[3];
	$tdate = $row[4];
	$duration = $row[5];
	$venue = $row[6];
	$pdate = $row[7];
	$status = $row[8];
	$rcontact = $row[9];
	$rphone = $row[10];
}
/* ### */  ?>


<?php
include("header.php")
/* ### */  ?>

 
<div class="container">
	<div class="page">
   <h3>Training</h3>
 	
			<div  style="text-align:right; padding-right:20px;">
    <a href="viewtraining.php">
    <button class="btn btn-primary"><i class="fa fa-plus"></i> << BACK</button></a>
	<p>&nbsp;</p>
  <div class="btn-group">
  </div>
</div>
<div class="bs-example" data-example-id="simple-horizontal-form">
    <form class="form-horizontal" action="" method="post">
      <div class="form-group">
      <input type="hidden" value="<?php echo $tid; /* ### */  ?>" name="trid"/>
        <label for="inputEmail3" class="col-sm-2 control-label">Topic</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="topic" name="topic" placeholder="Topic" required value="<?php echo $topic; /* ### */  ?>">
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
        <div class="col-sm-6">
          <textarea  class="form-control" id="description" name="description" placeholder="Description" required ><?php echo $descr; /* ### */  ?></textarea>
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Course</label>
        <div class="col-sm-6">
         <select name="course" id="course" class="form-control">
			<?php
			$qry = "Select * from tblcourse";
			$res = mysqli_query($con, $qry);
			echo "<option value=0>-- Select --</option>";
			while($row = mysqli_fetch_array($res))
			{
				if($courseid == $row[0])
				{
					echo "<option value=$row[0] selected>$row[1]</option>";
				}
				else
				{
					echo "<option value=$row[0]>$row[1]</option>";
				}
			}
			/* ### */  ?>
			</select>
        </div>
      </div>
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Training Date</label>
        <div class="col-sm-6">
          <input type="date" class="form-control" id="trainingdate" name="trainingdate" placeholder="Training Date" required value="<?php echo $tdate; /* ### */  ?>" onchange="validateDate(this.value)">
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Duration</label>
        <div class="col-sm-6">
		<input type="text" class="form-control" id="duration" name="duration" placeholder="Duration" value="<?php echo $duration; /* ### */  ?>">
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Venue</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="venue" name="venue" placeholder="Venue" required value="<?php echo $venue; /* ### */  ?>">
        </div>
      </div>
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Last Date Participation</label>
        <div class="col-sm-6">
          <input type="date" class="form-control" id="participationdate" name="participationdate" placeholder="Participation date" required value="<?php echo $pdate; /* ### */  ?>" onchange="validateDate1(this.value)">
        </div>
      </div>
	     <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Reference Contact Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="refcontactname" name="refcontactname" placeholder="Reference Contact Name" required value="<?php echo $rcontact; /* ### */  ?>" >
        </div>
      </div>
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Reference Contact Number</label>
        <div class="col-sm-6">
          <input type="number" class="form-control" id="refcontactno" name="refcontactno" placeholder="Reference Contact Number" required value="<?php echo $rphone; /* ### */  ?>" onchange="validatephone(this.value)">
        </div>
      </div>
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
        <div class="col-sm-6">
           <select name="status" id="status" class="form-control">
           <option value="Active" <?php if($status == Active) echo "selected"; /* ### */  ?> >Active</option>
            <option value="Inactive" <?php if($status == Inactive) echo "selected"; /* ### */  ?> >Inactive</option>
           </select>
        </div>
      </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <?php
		if(isset($_GET[eid]))
		{
		/* ### */  ?>
         <input type="submit" class="btn btn-default" name="update" value="UPDATE">
         <?php
		}
		else
		{
		 /* ### */  ?>
          <input type="submit" class="btn btn-default" name="submit" value="SUBMIT">
         <?php
          }
          /* ### */  ?>
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
function validateDate(date)
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
								  document.getElementById("trainingdate").value="";
								  document.getElementById("trainingdate").focus();
								  alert("Invalid Event Date");
							}
							 
						}
					}
			var getlink = "ajaxsetup.php?date="+date;
			xmlhttp.open("GET",getlink,true);
			xmlhttp.send();
}

function validateDate1(date)
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
								  document.getElementById("participationdate").value="";
								  document.getElementById("participationdate").focus();
								  alert("Invalid Event Date");
							}
							 
						}
					}
			var getlink = "ajaxsetup.php?date="+date;
			xmlhttp.open("GET",getlink,true);
			xmlhttp.send();
}
function validatephone(phone)
{
	if(phone.length != 10)
	{
		 document.getElementById("refcontactno").value="";
		document.getElementById(refcontactno).focus();
		alert("Invalid Mobile Number");
	}
}
</script> 