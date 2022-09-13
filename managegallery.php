<?php
include("sqlcon.php");
if(!isset($_SESSION['type']))
{
	echo "<script>window.location=index.php;</script>";
}
else if(isset($_SESSION['type']) && $_SESSION[type] != "admin")
{
	echo "<script>window.location=index.php;</script>";
}
/* ### */  ?>

<?php
include("header.php")
/* ### */  ?>
<?php
if(isset($_GET[id]))
{
	$rs = mysqli_query($con,"delete from tblgallery where gid=".$_GET[id]);
	if($rs)
	{
		echo "<script>alert(Record updated successfully...!!);window.location=managegallery.php;</script>";
	}
}
/* ### */  ?>
 
<div class="container">
	<div class="page">
   <h3>Gallery</h3>
  <div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee">
    <table class="table" id="dataTables-example">
	<head>
  <tr>
    <th>#</th>
    <th>Event Name</th>  
	<th>Photo</th>
	<th>Action</th>
  </tr>
</head>
<foot>
            <tr>
                <th colspan="7" style="text-align:right"></th>
                <th></th>
            </tr>
        <foot>
 <body>

  <?php
  $res = mysqli_query($con, "Select * from tblgallery inner join tblalumnimeet on tblgallery.eventid=tblalumnimeet.eventid  ");
  $c = 1;
  $tot=0;
  
  if(mysqli_num_rows($res) > 0)
  {
	  while($row = mysqli_fetch_array($res))
	   {   
	    echo "<tr>
		<td>".$c++."</td>
		<td>".$row[event_name]."</td>
		<td><img src=".$row[2]." width=300px height=250px alt=$row[1]/></td>
		<td><a href=managegallery.php?id=$row[0] >Delete</a></td>
		</tr>";
	   }
	   
	   
  }
 
   /* ### */  ?>
    <body>

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
 
 <?php
include("footer.php");
/* ### */  ?>