<?php
include("sqlcon.php");
include("header.php");
if(isset($_GET[delid]))
{
	$sqldel = "DELETE FROM tbljob WHERE jobid=$_GET[delid]";
	$qsql = mysqli_query($con,$sqldel);
	echo "<script>alert(Job entry deleted successfully...);</script>";
	echo "<script>window.location=verifyjob.php;</script>";
}
?>
<div class="container">
	<div class="page">
   <h3>Verify Job Posting</h3>
    
  <div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee">
    <table class="table" id="dataTables-example">
	<thead>
  <tr>
    <th >#</th>
    <th >User Name</th>
    <th >Company</th>
    <th >Job Title</th>
    <th >Key Skills</th>
    <th>Package</th>
    <th >Exp.Required</th>
    <th >No. Of Vacancy</th>
    <th>Reference Email</th>
    <th >Last Date</th>
    <th >Delete</th>
  </tr>
  </thead>
<tbody>
  <?php
  $res = mysqli_query($con, "Select * from tbljob inner join tbluser on tbljob.alumnid=tbluser.userid where  tbljob.status=Active order by jobid desc");
  $c = 1;
  if(mysqli_num_rows($res) > 0)
  {
	  while($row = mysqli_fetch_array($res))
	   {  echo "<tr>
		<td>".$c++."</td>
		<td>".$row[name]."</td>
		<td>".$row[company]."</td>
		<td>".$row[jobtitle]."</td>
		<td>".$row[keyskils]."</td>
		<td>".$row[salary]."</td>
		<td>".$row[exp_required]."</td>
		<td>".$row[noofvacancy]."</td>
		<td>".$row[8]."</td>
		<td>".$row[10]."</td>
		<td><a href=verifyjob.php?delid=$row[0] onclick=confirmtodelete() >Delete</a></td>
		</tr>";
	   }
  }
  else	  
	  {
		  echo "<tr><td colspan=8 style=text-align:center;>Sorry!! No Records</td></tr>";
	  }
   /* ### */  ?>
   </tbody>
</table>
</div>
</div>
</div>
<script>
function confirmtodelete()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return true;
	}
}
</script>

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