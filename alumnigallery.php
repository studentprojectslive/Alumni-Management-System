<?php
include("sqlcon.php");
if(isset($_POST[upload]))
{
	$flag = false;
	for($i=0; $i < count(array_filter($_FILES[photo][name])); $i++)
	{
		$filename = rand().$_FILES['photo']['name'][$i];
		move_uploaded_file($_FILES['photo']['tmp_name'][$i],"gallery/".$filename);
		$glry = "gallery/".$filename;
		$qry = "insert into tblgallery(eventid,photo) values (".$_POST[event].",".$glry.")";
		$quest = mysqli_query($con, $qry);
		if($quest)
		{
			$flag = true;
		}
		
	}
	if($flag)
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
   <h3>Update Event Gallery</h3>
 	
<div class="bs-example" data-example-id="simple-horizontal-form">

 
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

	<div class="form-group"> 
        <label for="inputEmail3" class="col-sm-2 control-label">Event</label>
        <div class="col-sm-6">
         <select name="event" id="event" class="form-control"> <?php
		  $res = mysqli_query($con, "select * from tblalumnimeet");
		  echo "<option value=0>--Select -- </option>";
		  while($row = mysqli_fetch_array($res))
		  {
			 echo "<option value=$row[0]>$row[1]</option>";
		  }
		  /* ### */  ?>
		  </select>
        </div>
      </div> 
		<div class="form-group"> 
        <label for="inputEmail3" class="col-sm-2 control-label">Event</label>
        <div class="col-sm-6">
         <input type="file" name="photo[]" class="form-control" />
        </div>
      </div> 
 
  <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
 <input type="submit" name="upload" value="UPLOAD" class="btn btn-default"/>     
  <input type="submit" name="cancel" value="CANCEL" class="btn btn-default"/>  <br/>
</div></div>
</form>

 </div>	
 
</div>
</div>

 <?php
include("footer.php");
/* ### */  ?>