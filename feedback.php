<?php
include("sqlcon.php");
if(!isset($_SESSION[type]))
{
	
	echo "<script>alert(You should login as Admin);window.location=index.php;</script>";
}
if(isset($_GET[id]))
{
	$rs = mysqli_query($con, "delete from tblcontact where cid=".$_GET[id]);
	if($rs)
	{
		echo "<script>alert(Feedback Deleted!!!);window.location=feedback.php;</script>";
	}
}
/* ### */  ?>

<?php
include("header.php")
/* ### */  ?>

 
<div class="container">
	<div class="page">
   <h3>Alumni Feedback</h3>
  <div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee">
    <table class="table" id="dataTables-example">
	<thead>
  <tr>
    <th>#</th>
    <th>From</th>
    <th>Subject</th>
    <th>Message</th>  
	<th>Email</th>
    <th>Contact No.</th>
	<th>Posted Date</th>
	<th>Action</th>
  </tr>
</thead>
<tfoot>
            <tr>
                <th colspan="7" style="text-align:right"></th>
                <th></th>
            </tr>
        </tfoot>
 <tbody>

  <?php
  $res = mysqli_query($con, "Select * from tblcontact");
  $c = 1;
  $tot=0;
  
  if(mysqli_num_rows($res) > 0)
  {
	  while($row = mysqli_fetch_array($res))
	   { 
	   $tot = $tot + $row[amount];
	   
	    echo "<tr>
		<td>".$c++."</td>
		<td>".$row[cname]."</td>
		<td>".$row[subject]."</td>
		<td>".$row[message]."</td>
		<td>".$row[email]."</td>
		<td>".$row[cno]."</td>
		<td>".$row[date]."</td>		
		 <td><a href=feedback.php?id=$row[0] onclick=return val()>Delete</a></td>
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