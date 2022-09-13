<?php
include("sqlcon.php");
if(isset($_POST[submit]))
{
	$qry = "insert into tblalumnimeet(event_name,loc,event_date,event_time,description,status) values (".$_POST[eventname].",".$_POST[location].",".$_POST[eventdate].",".$_POST[eventtime].",".$_POST[description].",".$_POST[status].")";
	if(mysqli_query($con, $qry))
	{
		echo "<script>alert(Event Published successfully...);</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}


if(isset($_POST[update]))
{
	$rs = mysqli_query($con,"update tblalumnimeet set event_name=".$_POST[eventname].",loc=".$_POST[location].",event_date=".$_POST[eventdate].",event_time=".$_POST[eventtime].",description=".$_POST[description].",status=".$_POST[status]."	where eventid=".$_POST[arid]."");
	if($rs)
	{
		echo "<script>alert(Event record updated successfully...!!);</script>";
		echo "<script>window.location=manage_events.php;</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
if(isset($_GET[id]))
{
	$rs = mysqli_query($con, "Select * from tblalumnimeet where eventid=".$_GET[id]);
	$row = mysqli_fetch_array($rs);
	$eventid = $row[eventid];
	$event_name = $row[event_name];
	$loc = $row[loc];
	$event_date = $row[event_date];
	$event_time = $row[event_time];
	$description = $row[description];
	$status = $row[status];
	
}
/* ### */  ?>
<?php
include("header.php")
/* ### */  ?>

 
<div class="container">
	<div class="page">
   <h3>Alumni Meet</h3>
			<div class="bs-example" data-example-id="simple-horizontal-form">
    <form class="form-horizontal" method="post">
      <div class="form-group">
         <input type="hidden" value="<?php echo $eventid; /* ### */  ?>" name="arid"/>
        <label for="inputEmail3" class="col-sm-2 control-label">Event Title</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="eventname" name="eventname" placeholder="Title" required value="<?php echo $event_name; /* ### */  ?>" >
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Location</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="location" name="location" placeholder="Location" required value="<?php echo $loc; /* ### */  ?>" >
        </div>
      </div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Event Date</label>
        <div class="col-sm-6">
          <input type="date" class="form-control" id="eventdate" name="eventdate" required value="<?php echo $event_date  ; /* ### */  ?>" onchange="validateDate(this.value)">
        </div>
      </div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Event Time</label>
        <div class="col-sm-6">
          <input type="time" class="form-control" id="eventtime" name="eventtime" required value="<?php echo $event_time  ; /* ### */  ?>">
        </div>
      </div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
        <div class="col-sm-6">
          <textarea class="form-control" id="description" name="description" placeholder="Description" required ><?php echo $description;/* ### */  ?></textarea>
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
		if(isset($_GET[id]))
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
								  document.getElementById("eventdate").value="";
								  document.getElementById("eventdate").focus();
								  alert("Invalid Event Date");
							}
							 
						}
					}
			var getlink = "ajaxsetup.php?date="+date;
			xmlhttp.open("GET",getlink,true);
			xmlhttp.send();
}
</script>
