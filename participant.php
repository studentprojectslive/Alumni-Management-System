<?php
include("sqlcon.php");
if(isset($_GET[id]))
{
	$rs = mysqli_query($con,"update tbltrainingappln set status=Selected where tpid=".$_GET[id]);
	if($rs)
	{
		echo "<script>alert(Record updated successfully...!!);window.location=viewtraining.php;</script>";
	}
}
if(isset($_GET[did]))
{
	$rs = mysqli_query($con,"update tbltrainingappln set status=Denied where tpid=".$_GET[did]);
	if($rs)
	{
		echo "<script>alert(Record updated successfully...!!);window.location=viewtraining.php;</script>";
	}
}
/* ### */  ?>



  <div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee">
    <table class="table" id="dataTables-example">
	<thead>
  <tr>
    <th>#</th>
    <th>Alumni Name</th>
	<th>Passout Year</th>
    <th>Course</th>
    <th>City</th>  
	<th>Status</th>
	<th>Update</th>
  </tr>
</thead>

 <tbody>

  <?php
  $res = mysqli_query($con, "select * from tbltrainingappln inner join tbluser on tbltrainingappln.alimniid=tbluser.userid inner join tblcourse on tbluser.courseid=tblcourse.courseid where trainid=".$_GET[edit_id]);
  $c = 1;

  
  if(mysqli_num_rows($res) > 0)
  {
	  while($row = mysqli_fetch_array($res))
	   { 

	    echo "<tr>
		<td>".$c++."</td>
		<td>".$row[name]."</td>
		<td>".$row[pyear]."</td>
		<td>".$row[coursename]."</td>
		<td>".$row[location]."</td>
			<td>".$row[4]."</td>";
		if($row[4] != "Pending")
		{
			echo "<td>Done.</td>";
		}
		else
		{
		echo "<td><a href=participant.php?id=$row[0] >Select</a>&nbsp;/&nbsp;<a href=participant.php?did=$row[0]>Deny</a></td>";
		}		
		echo "</tr>";
	   }
	   
	   
  }
 
   /* ### */  ?>
    </tbody>

</table>
</div>


