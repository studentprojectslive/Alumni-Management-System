<?php
include("sqlcon.php");
if(!isset($_SESSION['type']))
{
	echo "<script>window.location=index.php;</script>";
}

if(isset($_GET[aid]))
{
	$date = date("Y-m-d");
	$rs = mysqli_query($con,"insert into tbltrainingappln(trainid,alimniid,confirmdate,status) values(".$_GET[aid].",".$_SESSION[uid].",$date,Pending)");
	if($rs)
	{
		echo "<script>alert(Success!!);window.location=viewtraining.php</script>";
	}
}


/* ### */  ?>


<?php
include("header.php")
/* ### */  ?>

 
<div class="container">
	<div class="page">
   <h3>View Training</h3>
   	<?php
	if($_SESSION['type'] == "admin")
	{
		/* ### */  ?>
			<div  style="text-align:right; padding-right:20px;">
    <a href="training.php">
    <button class="btn btn-primary"><i class="fa fa-plus"></i> Add New</button></a>
	<p>&nbsp;</p>
  <div class="btn-group">
  </div>
</div>
<?php
	}
	/* ### */  ?>
  <div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee">
    <table class="table" id="dataTables-example">
	<thead>
  <tr>
    <th >#</th>
    <th >Topic Name</th>
    <th >Description</th>
    <th >Course</th>
    <th >Detail</th>
    <th>Reference contact</th>
    <th >Participation Last Date</th>
	<?php 
	 if($_SESSION['type'] == "admin")
	 {
		 echo "<th>View Participants</th>";
	 }
	/* ### */  ?>
    <th>Action</th>
  </tr>
</thead>
<tbody>
  <?php
  $qry = "Select * from tbltraining inner join tblcourse on tbltraining.courseid=tblcourse.courseid where status=Active and trainingdate >= CURDATE() order by trainingid desc";
  $res = mysqli_query($con, $qry);
  $c = 1; 
  if(mysqli_num_rows($res) > 0)
  {
	  while($row = mysqli_fetch_array($res))
	   {  echo "<tr>
		<td>".$c++."</td>
		<td>".$row[1]."</td>
		<td>".$row[2]."</td>
		<td>".$row[coursename]."</td>
		<td>Training Date: ".$row[trainingdate]."<br/>Duration: ".$row[duration]." hr. <br/>Venue: ".$row[venue]."</td>
		<td>Name: ".$row[refcontactname]."<br/>Phone: ".$row[refcontactno]."</td>
		<td>".$row[participationdate]."</td>";
		if($_SESSION['type'] == "alumni")
		{
			$rst = mysqli_query($con, "select * from tbltrainingappln where trainid=$row[0] and alimniid=".$_SESSION[uid]);
			if(mysqli_num_rows($rst) > 0)
			{
				$r = mysqli_fetch_array($rst);
				echo "<td>Already Participated.<br/> Status: ".$r[4]."</td>";
			}
			else{
				$date1 = date("Y/m/d");
				if(strtotime($date1) <= strtotime($row[trainingdate]))
				{
			echo "<td><a href=viewtraining.php?aid=$row[0]>Participate</a></td>";
				}
				else
				{
					echo "<td>Participation Closed</td>";
				}
			}
		}
		else if($_SESSION['type'] == "admin")
		{
		
		    echo "<td> <a href=#myModalEdit class=open-EditRow id=custId data-toggle=modal data-id=".$row[0]." data-backdrop=static data-keyboard=false>View Participants</a></td>";
			 
			echo "<td><a href=viewtraining.php?id=$row[0] >Delete</a>&nbsp;/&nbsp;<a href=training.php?eid=$row[0]>Edit</a></td>";
	    }
		echo "</tr>";
	   }
  }
  
   /* ### */  ?>
   </tbody>
</table>

<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Paricipants List</h4>
      </div>
      <div class="modal-body">
	  <div class="fetched-data">
	  
		</div>
      </div>
    </div>
  </div>
</div>

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

<script>
$(.open-EditRow).click(function(){
    $(#myModalEdit).on(show.bs.modal, function (e) {
        var rowid = $(e.relatedTarget).data(id);
		$(.fetched-data).load("participant.php?edit_id="+rowid);
     });
});  
</script>