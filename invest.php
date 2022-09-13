<?php
include("sqlcon.php");
session_start();
error_reporting(0);
if(!isset($_SESSION['type']))
{
echo "<script>window.location=index.php;</script>";
}

if(isset($_POST[submit]))
{
	$qry = "insert into tblfundinterest(investedfor,note,investeddate,iamount) values (".$_POST[investedfor].",".$_POST[note].",".$_POST[date].",".$_POST[iamount].")";
	if(mysqli_query($con, $qry))
	{ 
		echo "<script>alert(success!!!);</script>";
	}
}
/* ### */  ?>
<?php
  $res = mysqli_query($con, "Select sum(amount) from tblfund");
  $row = mysqli_fetch_array($res);
  $result = $row[0];
  
  $res1 = mysqli_query($con, "Select sum(iamount) from tblfundinterest");
  $row1 = mysqli_fetch_array($res1);
  $avail = $row1[0];
  
  $Total = $result-$avail;
/* ### */  ?>

<?php
include("header.php")
/* ### */  ?> 
<div class="container">
	<div class="page">
   <h3>Fund invested</h3>
 
			<div  style="text-align:right; padding-right:20px;">
    <a href="viewfund.php">
    <button class="btn btn-primary"><i class="fa fa-plus"></i> View Fund Payment</button></a>
	<p>&nbsp;</p>
  <div class="btn-group">
  </div>
</div>
<div class="bs-example" data-example-id="simple-horizontal-form">
    <form class="form-horizontal" action="" method="post">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Collected Fund Amount (Rs.)</label>
        <div class="col-sm-6">
		<input type="hidden" value="<?php echo $Total; /* ### */  ?>" name="hdnamt" id="hdnamt"/>
          <input type="text" class="form-control" id="camount" name="camount" value="<?php  echo $result; /* ### */  ?>" readonly>
        </div>
      </div> 
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Available Amount (Rs.)</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="availamount" name="availamount" value="<?php echo number_format((float)$Total, 2, ., ); /* ### */  ?>"  readonly>
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Utilized Amount</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="iamount" name="iamount" placeholder="Utilized Amount" onchange="updateAmt(this.value,hdnamt.value)" required>
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Utilized For</label>
        <div class="col-sm-6">
          <input type="text " class="form-control" id="investedfor" name="investedfor" placeholder="Utilized For" required>
        </div>
      </div>
	     <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Note</label>
        <div class="col-sm-6">
          <textarea  class="form-control" id="note" name="note" placeholder="Note" required></textarea>
        </div>
      </div> 
	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
        <div class="col-sm-6">
          <input type="date" id="date" name="date" placeholder="Date" required class="form-control">
        </div>
      </div> 
	      
	    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" class="btn btn-default" name="submit" value="SUBMIT">
		       <input type="reset" class="btn btn-default" name="cancel" value="CANCEL">
        </div>
      </div>
    </form>
  </div>	
 
</div>
</div>

<?php
include("footer.php");
/* ### */  ?>

<script>
function updateAmt(amt, total)
{
	amt = round(amt, 2); 
	total = round(total, 2); 
	if(amt > total)
	{
		alert("Invalid Amount!! Amount should be less than total Available fund.");
		document.getElementById("iamount").value="";
		document.getElementById("iamount").focus();
		document.getElementById("availamount").value=rem;
	}
	else
	{
		var rem = total-amt;
		document.getElementById("availamount").value=total;
	}	
}
function round(value, decimals) {
  return Number(Math.round(value+e+decimals)+e-+decimals);
}
</script>
