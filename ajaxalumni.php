<?php
include("sqlcon.php");
  if(isset($_GET['post']) || isset($_GET['region']) || isset($_GET['pyear']))
  {
	  if($_GET['post'] == "0" && $_GET['region'] != 0 && $_GET['pyear'] == 0)
	  {
		  $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status=Active and tbluser.location=".$_GET['region'];
	  }
	  else if($_GET['post'] != "" && $_GET['region'] == 0 && $_GET['pyear'] == 0)
	  {
		   $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status=Active and tbluser.occupation=".$_GET['post']."";
	  }
	  else if($_GET['post'] != "0" && $_GET['region'] != 0 && $_GET['pyear'] == 0)
	  {
		   $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status=Active and tbluser.occupation=".$_GET['post']." and tbluser.location=".$_GET['region'];
	  }
	  else if($_GET['post'] == "0" && $_GET['region'] == 0 && $_GET['pyear'] != 0)
	  {
		  $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status=Active and pyear=".$_GET['pyear']."";
	  }
	  else  if($_GET['post'] == "0" && $_GET['region'] != 0 && $_GET['pyear'] != 0)
	  {
		   $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status=Active and pyear=".$_GET['pyear']." and tbluser.location=".$_GET['region'];
	  }
	  else  if($_GET['post'] != "0" && $_GET['region'] == 0 && $_GET['pyear'] != 0)
	  {
		  $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status=Active and pyear=".$_GET['pyear']." and tbluser.occupation=".$_GET['post']."";
	  }
	  else  if($_GET['post'] != "0" && $_GET['region'] != 0 && $_GET['pyear'] != 0)
	  {
		  $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status=Active and pyear=".$_GET['pyear']." and tbluser.occupation=".$_GET['post']." and tbluser.location=".$_GET['region'];
	  }
	   else
	  {
		   $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status=Active";
	  }
  }
  else
  {
	 $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status=Active";
  }
  
  
  $res = mysqli_query($con, $q);
  $c = 1;
    
		 /* ### */  ?>
		 
	
	
 	<div class="col-md-12 content-top-2 animated wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="500ms">
		
			
						<div class="content-in">
  				<div class="container">
				
							 <div class="wmuSlider example1 animated wow">
				   <div class="wmuSliderWrapper">
				   <?php
				   
						while($ks = mysqli_fetch_array($res))
						{ /* ### */  ?>
						    <article style="width: 25%;display:inline;float:left;">
							<div class="team-top">	
							<?php 
							if($ks['profilepic'] != "" || $ks['profilepic'] != NULL)
							{
							/* ### */  
								if(!file_exists("upload/alumni/".$ks[profilepic]))
								{
							?>
									<img style="width: 150px;height:150px" src="upload/alumni/noimage.png" alt="" >
							<?php
								}
								else
								{
							?>
									<img  style="width: 150px;height:150px" src="upload/alumni/<?php echo $ks[profilepic]; /* ### */  ?>" alt="" >
								
							<?php 
								}
							}
							else
						    {
								echo "<img src=upload/alumni/noimage.png  style=width: 150px;height:150px />"; 								
							}
							/* ### */  ?>
									<span><?php echo $ks['name']; /* ### */  ?></span>
									
								</div>									
					 	</article>
						
				<?php 
				    } 
				
				/* ### */  ?> 
					  
					 </div>
	               
	            </div>
	           
			
			</div>
		</div>
		
			
							
			</div>
		 
		 
   </tbody>
</table>