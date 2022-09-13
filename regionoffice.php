<?php
include("sqlcon.php");
if(isset($_POST[submit]))
{
	$qrys = "select * from tblofficer where locid=".$_POST[region]." and postid=".$_POST[position]." and userid = ".$_POST[user]."";
	$res = mysqli_query($con, $qrys);
	if(mysqli_num_rows($res) > 0)
	{
		echo "<script>alert(Data Already Exist!!!);</script>";
	}
	else
	{
		$qrys2 = "select * from tblofficer where locid=".$_POST[region]." and postid=".$_POST[position]."";
		$res2 = mysqli_query($con, $qrys2);
		if(mysqli_num_rows($res2) > 0)
		{
			echo "<script>alert(Post Already Exist for this region!!!);</script>";
		}
		else
		{
			$qry = "insert into tblofficer(locid,postid, userid) values (".$_POST[region].",".$_POST[position].",".$_POST[user].")";
			if(mysqli_query($con, $qry))
			{
				echo "<script>alert(success!!!);</script>";
			}
		}
	}
}
include("header.php")
/* ### */  
?>

 
<div class="container">
	<div class="page">
   <h3>Office Bearears</h3>
 
<div class="bs-example" data-example-id="simple-horizontal-form">
    <form class="form-horizontal" action="" method="post">
     <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Region</label>
        <div class="col-sm-6">
         <select name="region" id="region" class="form-control" onchange="loadAlumni(this.value)">
			<?php
			$qry = "Select * from tblregion";
			$res = mysqli_query($con, $qry);
			echo "<option value=0>-- Select --</option>";
			while($row = mysqli_fetch_array($res))
			{
				echo "<option value=$row[0]>$row[1]</option>";
			}
			/* ### */  ?>
			</select>
        </div>
      </div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Alumni</label>
        <div class="col-sm-6">
         <select name="user" id="user" class="form-control">
			<option value=0>-- Select --</option>
			</select>
        </div>
      </div>
	  	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Post</label>
        <div class="col-sm-6">
         <select name="position" id="position" class="form-control">
			<?php
			$qry = "Select * from tblpost";
			$res = mysqli_query($con, $qry);
			echo "<option value=0>-- Select --</option>";
			while($row = mysqli_fetch_array($res))
			{
				echo "<option value=$row[0]>$row[1]</option>";
			}
			/* ### */  ?>
			</select>
        </div>
      </div>
	    
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" class="btn btn-default" name="submit" value="SUBMIT">
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
 function loadAlumni(locid)
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
							 
							document.getElementById("user").innerHTML=xmlhttp.responseText;
							 
						}
					}
			var getlink = "ajaxsetup.php?locid="+locid;
			xmlhttp.open("GET",getlink,true);
			xmlhttp.send();
 }
 </script>