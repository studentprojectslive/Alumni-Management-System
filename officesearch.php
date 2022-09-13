<?php
include("sqlcon.php");
if(!isset($_SESSION['type']))
{
	echo "<script>window.location=index.php;</script>";
}
include("header.php")
?>
<script>
function loadalumni(post,region) {
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("ajaxoffice").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","ajaxoffice.php?post="+post+"&region="+region,true);
  xmlhttp.send();
}
</script>

 <div class="container">
	<div class="page">
   <h2 align=center style=font-weight:bold;font-size:2.3em>Alumni Office Bearers</h2>
   <p>&nbsp;</p>
     <p>&nbsp;</p>
    <form class="form-horizontal">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Post</label>
        <div class="col-sm-6">
         <select name="post" id="post" class="form-control" onchange="loadalumni(post.value,region.value)">
			<?php
			$qry = "Select * from tblpost";
			$res = mysqli_query($con, $qry);
			echo "<option value=0>-- All --</option>";
			while($row = mysqli_fetch_array($res))
			{
				if($postid == $row[0])
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
        <label for="inputEmail3" class="col-sm-2 control-label">Region</label>
        <div class="col-sm-6">
         <select name="region" id="region" class="form-control" onchange="loadalumni(post.value,region.value)">
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
</form>
<div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee" id="ajaxoffice">
   <?php 
   include("ajaxoffice.php");
   /* ### */  ?>
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
?>
