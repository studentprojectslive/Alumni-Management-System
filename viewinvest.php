<?php
include("sqlcon.php");
error_reporting(0);
session_start();
if(!isset($_SESSION['type']))
{
echo "<script>window.location=index.php;</script>";
}
/* ### */  ?>

<?php
include("header.php")
/* ### */  ?>

 
<div class="container">
	<div class="page">
   <h3>Invested Funds</h3>
  <div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee">
    <table class="table" id="dataTables-example">
	<thead>
  <tr>
    <th>#</th>
	<th>Utilized For</th>
	<th>Invested Date</th>
	<th>Remarks</th> 
	<th>Amount Invested</th>
  </tr>
</thead>
<tfoot>
            <tr>
                <th colspan="5" style="text-align:right"></th>
                <th></th>
            </tr>
        </tfoot>
 <tbody>

  <?php
  $res = mysqli_query($con, "Select * from tblfundinterest");
  $c = 1;
  
  if(mysqli_num_rows($res) > 0)
  {
	  while($row = mysqli_fetch_array($res))
	   { 
	  
	   $invest=$invest+$row[iamount];
	   
	    echo "<tr>
		<td>".$c++."</td>
		<td>".$row[investedfor]."</td>	
		<td>".$row[investeddate]."</td>
		<td>".$row[note]."</td>
		<td>".$row[iamount]."</td> 
		</tr>";
	   }
	    $res = mysqli_query($con, "Select sum(amount) from tblfund");
  $row = mysqli_fetch_array($res);
  $result = $row[0];
	   $bal = $result - $invest;
	   
  }
 
   /* ### */  ?>
    </tbody>
</table>
</div>
</div>
</div>
<h3 style=float:right;padding-right:120px;>Balance: <?php echo number_format((float)$bal, 2, ., );  /* ### */  ?></h3>
<h3>&nbsp;</h3>
<h3>&nbsp;</h3>
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
            pageLength
        ],
		"footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === string ?
                    i.replace(/[\$,]/g, )*1 :
                    typeof i === number ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 6, { page: current} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 6 ).footer() ).html(
                Rs.+pageTotal + ( Rs.+ total + total)
            );
        }
	} );
        });
    </script>
 <?php
include("footer.php");
/* ### */  ?>