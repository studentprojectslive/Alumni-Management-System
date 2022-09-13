<?php
include("sqlcon.php");
if(isset($_SESSION['type']))
{
	//echo "<script>window.location=index.php;</script>";
}
if(isset($_POST[submit]))
{
$qry = "update tbluser set membershiptype=".$_POST[membershiptype].", mfee=".$_POST[membershipfee].", paytype=".$_POST[paytype].", bank=".$_POST[bankname].", cardno=".$_POST[cardno].", cvv=".$_POST[cvv].", expmonth=".$_POST[cardexpmonth].", expyear=".$_POST[year].", reg_date=".date("Y-m-d")." where userid=".$_GET[id];
$rs = mysqli_query($con, $qry);
if($rs)
{
	echo "<script>alert(Renewal Success!!);window.location=login.php;</script>";
}
}
/* ### */  ?>

<?php
include("header.php")
/* ### */  ?>
<script type="text/javascript">

    function fValidate() {
       
		
        var month = document.getElementById("cardexpmonth").value;
        var year = document.getElementById("year").value;
		
		var objdate = new Date();
		var cur_month = objdate.getUTCMonth()+1;
		var cur_year = objdate.getUTCFullYear();
		
		
	   if(document.getElementById("cardno").value == "")
		{
			alert("Enter Card Number");
			document.getElementById("cardno").focus();
			return false;
		}
		 else if(document.getElementById("cardno").value.length != 16)
		{
			alert("Invalid Card Number");
			document.getElementById("cardno").focus();
			return false;
		}
		else if(document.getElementById("cvv").value == "")
		{
			alert("Please Enter CVV");
			document.getElementById("cvv").focus();
			return false;
		}
		else if(document.getElementById("cvv").value.length != 3)
		{
			alert("Invalid CVV");
			document.getElementById("cvv").focus();
			return false;
		}
		else if(month == 0)
		{
			alert("Select Month");
			return false;
		}
		else if(year == 0)
		{
			alert("Select Year");
			return false;
		}
		else if(month < cur_month && year == cur_year)
		{
			alert(Card Expired!!!);
			return false;
		}
	    
		 else   
		 {
        return true;
		 }
    }
	
	function updatecost(type)
	{
		if(type == "Standard")
		{
			document.getElementById("membershipfee").value = "1000.00";
		}
		else if(type == "Premium")
		{
			document.getElementById("membershipfee").value = "10,000.00";
		}
	}
	 
</script>
 
<div class="container">
	<div class="page">
   <h3>Alumni Membership Renewal</h3>
 
<div class="bs-example" data-example-id="simple-horizontal-form">
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
	
        <div class="form-group">
	     <label for="inputEmail3" class="col-sm-2 control-label">Membership Type</label>
        <div class="col-sm-6">
	    <input type="Radio" name="membershiptype" value="Standard" onclick="updatecost(this.value)" checked />Standard
        &nbsp;&nbsp;<input type="Radio" name="membershiptype" value="Premium" onclick="updatecost(this.value)"/> Premium<br/>
        </div> 
       </div> 
       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Membership Fee</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="membershipfee" readonly name="membershipfee" placeholder="Membership Fee" required value="1000.00">
        </div>
      </div> 
       <div class="form-group">
	     <label for="inputEmail3" class="col-sm-2 control-label">Pay Type</label>
        <div class="col-sm-6">
	    <input type="Radio" name="paytype" value="Debitcard" checked /> Debit Card
        &nbsp;&nbsp;<input type="Radio" name="paytype" value="Creditcard" /> Credit Card<br/>
        </div> 
       </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Bank Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="bankname" name="bankname" placeholder="Bank Name" required>
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Card No</label>
        <div class="col-sm-6">
          <input type="number" class="form-control" id="cardno" name="cardno" placeholder="Card No" required>
        </div>
      </div>
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">CVV</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" id="cvv" name="cvv" placeholder="CVV" required >
        </div>
      </div>
	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Card Expire Month</label>
        <div class="col-sm-6">
         <select name="cardexpmonth" id="cardexpmonth" class="form-control">
         <option value=0>--Select -- </option> 
		 <option value=1>1</option>
		 <option value=2>2</option>
		 <option value=3>3</option>
		 <option value=4>4</option>
		 <option value=5>5</option>
		 <option value=6>6</option>
		 <option value=7>7</option>
		 <option value=8>8</option>
		 <option value=9>9</option>
		 <option value=10>10</option>
		 <option value=11>11</option>
		 <option value=12>12</option>
		 </select>
         </div></div>
          <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Year</label>
          <div class="col-sm-6">
         <select name="year" id="year" class="form-control">
         <option value=0>--Select -- </option>
		 <option value=2017>2017</option>
		 <option value=2018>2018</option>
		 <option value=2019>2019</option>
		 <option value=2020>2020</option>
		 <option value=2021>2021</option>
		</select>
		  </div>
        </div>
	    
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" class="btn btn-default" name="submit" value="PAY NOW" onclick="return fValidate()">
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

