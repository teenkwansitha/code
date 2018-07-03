<?php
require_once("view/header/header.php");
?>
<br/><br/><br/><br/><br/><br/><br/>
<div class="container">
    <form >
        <div class="form-group row" style="padding: 0px 5px;">
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
                <div class="col-xs-1">
                <input type="hidden" name="controller" value="sale"/>
                <button type="submit" class="btn btn-info" name="action" value="report_3" style="width:140px">Search</button>
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
   /* $dataPoints=array();
    for ($i=0; $i <sizeof($sale_list,1) ; $i++) { 
           
    }
    */
    print_r($sale_list);
    $dataPoints=array();
    for ($i=1; $i <sizeof($sale_list[0]) ; $i++) { 
        $per = ($sale_list[0][$i]/$sale_list[0][0])*100;
        echo $per."<br>";
        $dataPoints[]=array("label"=>$sale_list[1][$i], "y"=> $per);
    }
    print_r($dataPoints);
?>
<?php
 
 
 ?>
 <script>
    window.onload = function () {
    
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title: {
            text: "ยอดขายของเเต่ละหมวดหมู่สินค้าต่อเดือน"
        },
        axisY: {
            suffix: "%",
            scaleBreaks: {
                autoCalculate: true
            }
        },
        data: [{
            type: "column",
            yValueFormatString: "#,##0\"%\"",
            indexLabel: "{y}",
            indexLabelPlacement: "inside",
            indexLabelFontColor: "white",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
    
    }
 </script>
 
 <div id="chartContainer" style="height: 370px; width: 100%;"></div>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
      
