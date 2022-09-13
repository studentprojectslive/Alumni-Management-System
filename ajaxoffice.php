<?php
include("sqlcon.php");
session_start();
error_reporting(0);
?>
<table class="table" id="dataTables-example">
  <tr>
    <th>#</th>
    <th>Photo</th>
    <th>Post</th>
	<th>Region</th>
    <th>Name</th>
    <th>Address</th>
    <th>Reference contact</th>
    <th>Email</th>
  </tr>
<tbody>
<?php
  if(isset($_GET['post']) && isset($_GET['region']))
  {
	  if($_GET['post'] == 0 && $_GET['region'] != 0)
	  {
		  $q = "SELECT *, tblregion.location as locationa  FROM `tblofficer` LEFT JOIN tblregion on tblregion.locid=tblofficer.locid LEFT JOIN tblpost on tblpost.postid =tblofficer.postid left join tblalumniphoto on tblalumniphoto.userid=tblofficer.userid LEFT JOIN tbluser ON tbluser.userid=tblofficer.userid where tbluser.status=Active and tblofficer.locid=".$_GET['region'];
	  }
	  else if($_GET['post'] != 0 && $_GET['region'] == 0)
	  {
		  $q = "SELECT *, tblregion.location as locationa  FROM `tblofficer` LEFT JOIN tblregion on tblregion.locid=tblofficer.locid LEFT JOIN tblpost on tblpost.postid =tblofficer.postid left join tblalumniphoto on tblalumniphoto.userid=tblofficer.userid LEFT JOIN tbluser ON tbluser.userid=tblofficer.userid where tbluser.status=Active and tblofficer.postid=".$_GET['post'];
	  }
	  else if($_GET['post'] != 0 && $_GET['region'] != 0)
	  {
		  $q = "SELECT *, tblregion.location as locationa  FROM `tblofficer` LEFT JOIN tblregion on tblregion.locid=tblofficer.locid LEFT JOIN tblpost on tblpost.postid =tblofficer.postid left join tblalumniphoto on tblalumniphoto.userid=tblofficer.userid LEFT JOIN tbluser ON tbluser.userid=tblofficer.userid where tbluser.status=Active and tblofficer.postid=".$_GET['post']." and tblofficer.locid=".$_GET['region'];
	  }
	  else if($_GET['post'] == 0 && $_GET['region'] == 0)
	  {
		  $q = "SELECT *, tblregion.location as locationa  FROM `tblofficer` LEFT JOIN tblregion on tblregion.locid=tblofficer.locid LEFT JOIN tblpost on tblpost.postid =tblofficer.postid left join tblalumniphoto on tblalumniphoto.userid=tblofficer.userid LEFT JOIN tbluser ON tbluser.userid=tblofficer.userid where tbluser.status=Active ";
	  }
  }
  else
  {
	  $q = "SELECT *, tblregion.location as locationa  FROM `tblofficer` LEFT JOIN tblregion on tblregion.locid=tblofficer.locid LEFT JOIN tblpost on tblpost.postid =tblofficer.postid left join tblalumniphoto on tblalumniphoto.userid=tblofficer.userid LEFT JOIN tbluser ON tbluser.userid=tblofficer.userid where tbluser.status=Active ";
  }
  $res = mysqli_query($con, $q);
  $c = 1;
  if(mysqli_num_rows($res) > 0)
  {
	  while($row = mysqli_fetch_array($res))
	   { 
			if($row[postname] != "")
			{
		   echo "<tr>
			<td>".$c++."</td>";
			if($row[profilepic] != NULL)
			{
			echo "<td><img src=upload/alumni/".$row[profilepic]." width=150px height=150px/></td>";
			}
			else{
				echo "<td><img src=upload/alumni/noimage.png width=150px height=150px/></td>";
			}
			echo "<td>".$row[postname]."</td>
			<td>".$row[locationa]."</td>
			<td>".$row[name]."</td>
			<td>".$row[address]."</td>
			<td>".$row[phone]."</td>
			<td>".$row[emailid]."</td>
			</tr>";
			}
	   }
  }
  else	  
  {
	  echo "<tr><td colspan=7 style=text-align:center;>Sorry!! No Records</td></tr>";
  }
?>
   </tbody>
</table>