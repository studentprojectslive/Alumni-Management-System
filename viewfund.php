<?php
include("sqlcon.php");
session_start();
error_reporting(0);
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
   <h3>View Funds</h3>
  <div class="bs-example" data-example-id="contextual-table" style="border: 1px solid #eee">
    <table class="table" id="dataTables-example">
	<thead>
  <tr>
    <th>#</th>
    <th>Alumni Name</th>
	<th>Payment Date</th>
    <th>Payment Type</th>
    <th>Bank Name</th>  
	<th>Remarks</th>
    <th>Paid Amount</th>
  </tr>
</thead>
<tfoot>
            <tr>
                <th colspan="7" style="text-align:right"></th>
            </tr>
        </tfoot>
 <tbody>

  <?php
  $res = mysqli_query($con, "Select * from tblfund inner join tbluser on tblfund.userid=tbluser.userid order by fundid desc");
  $c = 1;
  $tot=0;
  
  if(mysqli_num_rows($res) > 0)
  {
	  while($row = mysqli_fetch_array($res))
	   { 
	   $tot = $tot + $row[amount];
	   
	    echo "<tr>
		<td>".$c++."</td>
		<td>".$row[name]."</td>
		<td>".$row[paiddate]."</td>
		<td>".$row[5]."</td>
		<td>".$row[bankname]."</td>
		<td>".$row[remarks]."</td>
		<td>".$row[amount]."</td>	 
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