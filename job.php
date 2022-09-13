<?php
include("sqlcon.php");
error_reporting(0);
session_start();
/* ### */  ?>

<?php
include("header.php")
/* ### */  ?>

 
<div class="container">
	<div class="page">
   <h3>Job Openings</h3>
   <?php 
   if(isset($_SESSION['type']) && $_SESSION[type] == alumni)
   {
   /* ### */  ?>
    <div class="col-md-12">         
<div class="btn-toolbar list-toolbar" style="text-align:right;">
    <a href="jobposting.php">
    <button class="btn btn-primary"><i class="fa fa-plus"></i> Post Job</button></a>
  <div class="btn-group">
  </div>
</div> <br/>
</div>
<?php
   }
   /* ### */  ?>
   
 <?php
  $res = mysqli_query($con, "Select * from tbljob inner join tbluser on tbljob.alumnid=tbluser.userid where tbljob.lastdate >= CURDATE() and  tbljob.status=Active");
  if(mysqli_num_rows($res) >0)
  {
while($result = mysqli_fetch_array($res))
{
	
  /* ### */  ?>
<div class="service-top">
			<div class="col-md-11 ser-1 animated wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
				<div class="ser-img">
					<h6><?php echo $result[jobtitle]; /* ### */  ?>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:blue;">Posted By: <?php echo $result[name]; /* ### */  ?></span></h6>
					<i class="glyphicon glyphicon-plus"><a  class="open-EditRow" href="#myModal" data-toggle="modal" data-id="<?php echo $result[0]; /* ### */  ?>"  data-backdrop="static" data-keyboard="false">Apply</a></i>
					
					<div class="clearfix"> </div>
				</div>
				<p><?php echo $result[company]; /* ### */  ?><br/><?php echo $result[exp_required]; /* ### */  ?> Yrs. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="glyphicon glyphicon-map-marker"></i> <?php echo $result[job_location]; /* ### */  ?>
				<br/>
				Job Description : &nbsp;&nbsp;&nbsp;<?php echo $result[jobdescription]; /* ### */  ?><br/>
				Key Skills:&nbsp;&nbsp;&nbsp;<?php echo $result[keyskils]; /* ### */  ?><br/>
				<span style="color:green;font-weight:bold;">Pay Scale: Rs. <?php echo $result[salary]; /* ### */  ?> P.A.</span></p>
				
			</div>
			
			<div class="clearfix"> </div>
		
			</div>
		<?php
}
  }
  else
  {
	  echo "<div class=service-top style=min-height:400px;><h3 align=center>Sorry!! No Openings.</h3></div>";
  }
/* ### */  ?>	
<!-- MODEL POPUP -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Job Apply</h4>
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
			
			<?php
include("footer.php");
/* ### */  ?>
<script>
$(.open-EditRow).click(function(){
    $(#myModal).on(show.bs.modal, function (e) {
        var rowid = $(e.relatedTarget).data(id);
		$(.fetched-data).load("jobapply.php?edit_id="+rowid);
     });
});  

    </script>