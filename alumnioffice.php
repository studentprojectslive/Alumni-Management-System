<?php
include("sqlcon.php");
if(!isset($_SESSION[type]))
{
	echo "<script>window.location=index.php;</script>";
}
 if(isset($_GET['id']))
 {
	 $qry = mysqli_query($con, "delete from tblofficer where id=".$_GET['id']);
	 if($qry)
	 {
		 echo "<script>alert(Record Deleted!!!);window.location=alumnioffice.php;</script>";
	 }
 }
/* ### */  ?>


<?php
include("header.php")
/* ### */  ?>

<div class="container">
	<div class="page">
   <h3 align=center>Alumni Office bearears</h3>
   <p>&nbsp;</p>
  <div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee">

 <table class="table" id="dataTables-example">
  <tr>
    <th >#</th>
    <th >Photos</th>
    <th >Post</th>
	<th >Region</th>
    <th >Name</th>
    <th >Contact Detail</th>
	<th >Action</th>
  </tr>
<tbody>
  <?php
  $c = 1;

		$sqlofficebearer ="SELECT * from tblofficer";
		$qsqlofficebearer = mysqli_query($con,$sqlofficebearer);
		while($rsofficebearer  = mysqli_fetch_array($qsqlofficebearer))
		{
			$sqltblpost ="SELECT * from tblpost WHERE postid=$rsofficebearer[postid]";
			$qsqltblpost = mysqli_query($con,$sqltblpost);
			$rstblpost  = mysqli_fetch_array($qsqltblpost);
			$sqlregion ="SELECT * from tblregion WHERE locid=$rsofficebearer[locid]";
			$qsqlregion = mysqli_query($con,$sqlregion);
			$rstregion  = mysqli_fetch_array($qsqlregion);
			$q = "Select * from tbluser left join tblalumniphoto on tbluser.userid=tblalumniphoto.userid  where tbluser.status=Active AND tbluser.userid=$rsofficebearer[userid] ";
			$res = mysqli_query($con, $q);
			$row = mysqli_fetch_array($res);
		   {  echo "<tr>
			<td>".$c++."</td>";
			if($row[profilepic] != NULL)
			{
			echo "<td><img src=upload/alumni/".$row[profilepic]." width=150px height=150px/></td>";
			}
			else{
				echo "<td><img src=upload/alumni/noimage.png width=150px height=150px/></td>";
			}
			echo "<td>".$rstblpost[postname]."</td>
			<td>".$rstregion[location]."</td>
			<td>".$row[name]."</td>
			<td>".$row[address]. "<br>Ph. No. ". $row[phone]. "<br>Email: " .$row[emailid]."</td>
			<td><a href=alumnioffice.php?id=$rsofficebearer[0]>Delete</a></td>
			</tr>";
		   }
		}

   /* ### */  ?>
   </tbody>
</table>

</div></div></div>
<?php
include("footer.php")
/* ### */  ?>

