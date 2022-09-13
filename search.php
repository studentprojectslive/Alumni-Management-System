<?php
include("sqlcon.php");
if(!isset($_SESSION['type']))
{
echo "<script>window.location=index.php;</script>";
}
/* ### */  ?>
<?php
include("header.php");
/* ### */  ?>

<script>
function loadalumni(post,region,pyear) {
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("ajaxoffice").innerHTML=xmlhttp.responseText;
    }
  }
  if(pyear == "")
  {
	  pyear  = "0";
  }
  var link = "ajaxalumni.php?post="+post+"&region="+region+"&pyear="+pyear;
  xmlhttp.open("GET",link,true);
  xmlhttp.send();
}
</script>

 <div class="content">
 <div class="col-top" >
	<div class="container">
	<div class="content-top" >
	
	<div class="container">
	<div class="page">
<h4 style="font-size: 2.0em;line-height: 1.4em;text-align:center;">Friends Circle </h4>	
  <p>&nbsp;</p>
    <form id="f1" method="post">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-1 control-label">Occupation</label>
        <div class="col-sm-3">
         <select name="post" id="post" class="form-control" onchange="loadalumni(post.value,region.value,pyear.value)">
			<?php
			$qry = "SELECT DISTINCT occupation FROM `tbluser`";
			$res = mysqli_query($con, $qry);
			echo "<option value=0>-- All --</option>";
			while($row = mysqli_fetch_array($res))
			{
			   echo "<option value=$row[0]>$row[0]</option>";
			}
			/* ### */  ?>
			</select>
        </div>
      </div> 
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-1 control-label">Region</label>
        <div class="col-sm-3">
         <select name="region" id="region" class="form-control" onchange="loadalumni(post.value,region.value,pyear.value)">
			<?php
			$qry = "Select * from tblregion";
			$res = mysqli_query($con, $qry);
			echo "<option value=0>--All--</option>";
			while($row = mysqli_fetch_array($res))
			{
				if($locid == $row[0])
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
        <label for="inputEmail3" class="col-sm-1 control-label">Batch</label>
        <div class="col-sm-3">
         <input type="number" name="pyear" id="pyear" placeholder="Enter Pass Out Year" onchange="loadalumni(post.value,region.value,pyear.value)" min="1"/>
        </div>
      </div>
	  <div class=""></div>
</form>
<div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee" id="ajaxoffice">
   <?php 
   include("ajaxalumni.php");
   /* ### */  ?>
</div>
</div>
</div>

	
		</div>
</div>		
			</div>
		</div>
		<?php include("chatbox.php"); /* ### */  ?>
		 <?php
include("footer.php");
/* ### */  ?>
