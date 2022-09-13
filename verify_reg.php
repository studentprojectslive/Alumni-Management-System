<?php
include("sqlcon.php");
session_start();
error_reporting(0);
if(!isset($_SESSION['type']))
{
	echo "<script>window.location=index.php;</script>";
}
if(isset($_GET[id]))
{
	 $qry = "update tbluser set status=Active,reg_date=CURDATE() where userid=".$_GET[id];
	$rs = mysqli_query($con,$qry);
	if($rs)
	{
		echo "<script>alert(Record updated successfully...!!);window.location=verify_reg.php;</script>";
	}
}
if(isset($_GET[did]))
{
	$rs = mysqli_query($con,"update tbluser set status=Disapproved, reg_date=CURDATE() where userid=".$_GET[did]);
	if($rs)
	{
		echo "<script>alert(Record updated successfully...!!);window.location=verify_reg.php;</script>";
	}
}


/* ### */  ?>


<?php
include("header.php")
/* ### */  ?>

 
<div class="container">
	<div class="page">
   <h3>Verify Alumni</h3>
  <div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee">
    <table class="table" id="dataTables-example">
  <tr>
    <th >#</th>
    <th >User Name</th>
    <th >DOB</th>
    <th >Passout Year</th>
    <th >Course</th>
    <th>Occupation</th>
	<th >Region</th>
    <th >Membership Type</th>
    <th >Membership Fee</th>
    <th>Pay Type</th>
    <th >Verify</th>
  </tr>

  <?php
  $res = mysqli_query($con, "Select * from tbluser inner join tblcourse on tbluser.courseid=tblcourse.courseid inner join tblregion on tbluser.location=tblregion.locid where  tbluser.status=Inactive");
  $c = 1;
  if(mysqli_num_rows($res) > 0)
  {
	  while($row = mysqli_fetch_array($res))
	   {  echo "<tr>
		<td>".$c++."</td>
		<td>".$row[name]."</td>
		<td>".$row[dob]."</td>
		<td>".$row[pyear]."</td>
		<td>".$row[coursename]."</td>
		<td>".$row[occupation]."</td>
		<td>".$row[location]."</td>
		<td>".$row[membershiptype]."</td>
		<td>".$row[mfee]."</td>
		<td>".$row[paytype]."</td>
		<td><a href=verify_reg.php?id=$row[0] >Approve</a>&nbsp;/&nbsp;<a href=verify_reg.php?did=$row[0]>Deny</a></td>
		</tr>";
	   }
  }
  else	  
	  {
		  echo "<tr><td colspan=7 style=text-align:center;>Sorry!! No Records</td></tr>";
	  }
   /* ### */  ?>
</table>
</div>
</div>
</div>



<link rel="stylesheet" type="text/css" href="DataTables-1.10.12/extensions/Buttons/css/buttons.dataTables.css">
 	<link rel="stylesheet" type="text/css" href="DataTables-1.10.12/media/css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="DataTables-1.10.12/media/js/jquery.dataTables.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/extensions/Buttons/js/dataTables.buttons.js">
	</script>
	<script type="text/javascript" language="javascript" src="Stuk-jszip-6d2b991/dist/jszip.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="pdfmake-master/build/pdfmake.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="pdfmake-master/build/vfs_fonts.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/extensions/Buttons/js/buttons.html5.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/examples/resources/syntax/shCore.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/examples/resources/demo.js">
	</script>
    <script>
        $(document).ready(function () {
            $(#dataTables-example).dataTable({
		dom: Bfrtip,
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ 10 rows, 25 rows, 50 rows, Show all ]
        ],
        buttons: [
            pageLength,
			pdfHtml5
        ]
	} );
        });
    </script>
 <?php
include("footer.php");
/* ### */  ?>