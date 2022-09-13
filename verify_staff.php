<?php
include("sqlcon.php");
if(!isset($_SESSION[type]))
{
	//echo "<script>window.location=index.php;</script>";
}
if(isset($_GET[id]))
{
	$rs = mysqli_query($con,"update tblstaff set status=Active where staffid=".$_GET[id]);
	if($rs)
	{
		echo "<script>alert(Record updated successfully...!!);window.location=verify_staff.php;</script>";
	}
}
if(isset($_GET[did]))
{
	$rs = mysqli_query($con,"update tblstaff set status=Disapproved where staffid=".$_GET[did]);
	if($rs)
	{
		echo "<script>alert(Record updated successfully...!!);window.location=verify_staff.php;</script>";
	}
}

/* ### */  ?>
<?php
include("header.php")
/* ### */  ?>

 
<div class="container">
	<div class="page">
   <h3 align=center>Verify Alumni</h3>
   <p>&nbsp;</p>
  <div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee">
    <table class="table" id="dataTables-example">
  <tr>
    <th>#</th>
	  <th>Photo</th>
    <th>Full Name</th>
    <th>Qualification</th>
    <th>Designation</th>
    <th>Date Of Join</th>
     <th>Address</th>
    <th>Contact No</th>
    <th>Email Id</th>
      <th>Verify</th>
   </tr>
    <?php
  $res = mysqli_query($con, "Select * from tblstaff where status=Inactive");
  $c = 1;
  if(mysqli_num_rows($res) > 0)
  {
	  while($row = mysqli_fetch_array($res))
	  {
		echo "<tr>
		<td>".$c++."</td>
		<td>";
		if(file_exists(upload/staff/.$row['staffphoto']))
		{
		echo "<img src=upload/staff/".$row[staffphoto]." width=100px height=100px alt=$row[1]/>";
		}
		else
		{
		echo "<img src=images/821no-user-image.png width=100px height=100px alt=$row[1]/>";
		}
		echo "</td>
		<td>".$row[1]."</td>
		<td>".$row[2]."</td>
		<td>".$row[3]."</td>
		<td>".$row[4]."</td>
		<td>".$row[5]."</td>
		<td>".$row[6]."</td>
		<td>".$row[7]."</td>
	   
		<td><a href=verify_staff.php?id=$row[0] >Approve</a>&nbsp;/&nbsp;<a href=verify_staff.php?did=$row[0]>Deny</a></td>
	  </tr>";
	  }
   }
  else	  
	  {
		  echo "<tr><td colspan=10 style=text-align:center;>Sorry!! No Records</td></tr>";
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