<?php
include("sqlcon.php");
if(!isset($_SESSION[type]))
{
	//echo "<script>window.location=index.php;";
}

if(isset($_GET[did]))
{
	$rs = mysqli_query($con,"update tblalumnimeet set status=Inactive where eventid=".$_GET[did]);
	if($rs)
	{
		echo "<script>alert(Record updated successfully...!!);window.location=manage_events.php;</script>";
	}
}

/* ### */  ?>
<?php
include("header.php")
/* ### */  ?>

 
<div class="container">
	<div class="page">
   <h3 align=center>Manage Events</h3>
   <p>&nbsp;</p>
  <div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee">
    <table class="table" id="dataTables-example">
    <thead>
  <tr>
    <th>#</th>
	  <th>Event Title</th>
    <th>Location</th>
    <th>Event Date</th>
    <th>Time</th>
     <th>Action</th>
   </tr>
    <thead>
    <tbody>
    <?php
  $res = mysqli_query($con, "Select * from tblalumnimeet where status=Active");
  $c = 1;
  if(mysqli_num_rows($res) > 0)
  {
	  while($row = mysqli_fetch_array($res))
	  {
		echo "<tr>
		<td>".$c++."</td>
		<td>".$row[event_name]."</td>
		<td>".$row[loc]."</td>
		<td>".$row[event_date]."</td>
		<td>".$row[event_time]."</td>
		
	   
		<td><a href=alumnimeet.php?id=$row[0] >Edit</a>&nbsp;/&nbsp;<a href=manage_events.php?did=$row[0]>Delete</a></td>
	  </tr>";
	  }
   }
 
/* ### */  ?>
</tbody>
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