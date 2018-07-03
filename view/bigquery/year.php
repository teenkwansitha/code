<?php
require_once("view/header/header.php");
?>
<br/><br/><br/><br/>
<div class="container">
    <form action="">
        <div class="form-group row" style="padding: 0px 10px;">
            <div class="col-xs-2">
                <div class="form-group" style="padding: 0px 15px;">
                <select class="form-control" name="year" style="width:150px">
                <option value="0">ปี</option>
                <option value="2018">2018</option>
                </select>
                </div>
            </div>
            <div class="col-xs-1.5">
                <input type="hidden" name="controller" value="sale"/>
                <button type="submit" class="btn btn-danger" name="action" value="year" style="width:140px">Search</button>
            </div>
        </div>
    </form>
<?php  
echo "".($year!=0?"<h2>ปี $year</h2>":" ");
?>
 </div>
<?php
//print_r($sale_list);
$datapoints=array();
$month = array("เดือนมกราคม","เดือนกุมภาพันธ์", "เดือนมีนาคม", "เดือนเมษายน","เดือนพฤษภาคม","เดือนมิถุนายน","เดือนกรกฎาคม","เดือนสิงหาคม","เดือนกันยายน", "เดือนตุลาคม","เดือนพฤศจิกายน","เดือนธันวาคม");
for($i=0;$i<sizeof($sale_list[0]);$i++)
{
    $dataPoints[] = array("y" => $sale_list[0][$i], "label" => $month[$i]);
}
//print_r($dataPoints);
?>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "ยอดขายที่ดีที่สุดรายปี"
	},
	axisY: {
		title: "รายได้จากการขาย",
	},
	data: [{
		type: "line",
        yValueFormatString: "$#,##0USD",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>