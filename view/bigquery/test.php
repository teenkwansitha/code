
<style>

</style>
<?php
require_once("view/header/header.php");
?>
<br/><br/><br/><br/><br/><br/><br/>
<div class="container">
    <form action="">
        <div class="form-group row" style="padding: 0px 10px;">
            <div class="col-xs-4">
                <div class="form-group">
                        <select class="form-control" name=month style="width:200px">
                        <option value="0">เดือน</option>
                        <option value="1">มกราคม</option>
                        <option value="2">กุมภาพันธ์</option>
                        <option value="3">มีนาคม</option>
                        <option value="4">เมษายน</option>
                        <option value="5">พฤษภาคม</option>
                        <option value="6">มิถุนายน</option>
                        <option value="7">กรกฎาคม</option>
                        <option value="8">สิงหาคม</option>
                        <option value="9">กันยายน</option>
                        <option value="10">ตุลาคม</option>
                        <option value="11">พฤศจิกายน</option>
                        <option value="12">ธันวาคม</option>
                        </select>
                </div>
            </div>
                <div class="col-xs-1.5">
                <input type="hidden" name="controller" value="sale"/>
                <button type="submit" class="btn btn-danger" name="action" value="index" style="width:140px">Search</button>
                </div>
        </div>
    </form>
<?php  
echo "".($month==1?"<h2>เดือน มกราคม </h2>":" ");
echo "".($month==2?"<h2>เดือน กุมภาพันธ์ </h2>":" ");
echo "".($month==3?"<h2>เดือน มีนาคม </h2>":" ");
echo "".($month==4?"<h2>เดือน เมษายน </h2>":" ");
echo "".($month==5?"<h2>เดือน พฤษภาคม </h2>":" ");
echo "".($month==6?"<h2>เดือน มิถุนายน </h2>":" ");
echo "".($month==7?"<h2>เดือน กรกฎาคม </h2>":" ");
echo "".($month==8?"<h2>เดือน สิงหาคม </h2>":" ");
echo "".($month==9?"<h2>เดือน กันยายน </h2>":" ");
echo "".($month==10?"<h2>เดือน ตุลาคม </h2>":" ");
echo "".($month==11?"<h2>เดือน พฤศจิกาย  </h2>":" ");
echo "".($month==12?"<h2>เดือน ธันวาคม </h2>":" ");
?>
<?php
$dataPoints = array( 
	array("y" => $sale_list[1][9],"label" => $sale_list[0][9] ),
	array("y" => $sale_list[1][8],"label" => $sale_list[0][8] ),
	array("y" => $sale_list[1][7],"label" => $sale_list[0][7] ),
	array("y" => $sale_list[1][6],"label" => $sale_list[0][6] ),
	array("y" => $sale_list[1][5],"label" => $sale_list[0][5] ),
	array("y" => $sale_list[1][4],"label" => $sale_list[0][4] ),
	array("y" => $sale_list[1][3],"label" => $sale_list[0][3] ),
	array("y" => $sale_list[1][2],"label" => $sale_list[0][2] ),
	array("y" => $sale_list[1][1],"label" => $sale_list[0][1] ),
	array("y" => $sale_list[1][0],"label" => $sale_list[0][0] )
);
 ?>
 <script>
 window.onload = function() { 
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     title:{
         text: "ยอดขายของสินค้าที่ขายดีที่สุดรายเดือน"
     },
     axisY: {
         title: "ยอดขายของสินค้าที่ขายดีที่สุดรายเดือน",
         prefix: "$",
         suffix:  "USD"
     },
     data: [{
         type: "bar",
         yValueFormatString: "$#,##0USD",
         indexLabel: "{y}",
         indexLabelPlacement: "inside",
         indexLabelFontWeight: "bolder",
         indexLabelFontColor: "white",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
  
 }
 </script>
 <table class="table table-striped" >
<?php
/*foreach($sale_list as $sale)
{
    echo "<tr>
    <td><center>$sale->total</center></td>";
    echo"</tr>";
echo"</tr>";
}
echo "</table>"; */
//print_r($sale_list);
?>
 </head>
 <body>
 <div id="chartContainer" style="height: 450px; width: 100%;"></div>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 </div>