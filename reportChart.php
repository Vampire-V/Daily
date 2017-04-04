<?php
require "sqlforcharts.php";
?>

<html>
<head>
<title>Chart Daily</title>
<script type="text/javascript" src="fusioncharts/js/fusioncharts.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>






<script type="text/javascript">
  FusionCharts.ready(function(){
    var fusioncharts = new FusionCharts({
    type: 'mscolumn2d',
    renderAt: 'chart-container',
    width: '1000',
    height: '600',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": "Daily Check Sheet Chart <?php echo $name;?> ",
            "xAxisname": "Quarter",
            "yAxisName": "Num (In Daily)",
            "numberPrefix": "",
            "plotFillAlpha": "",

            //Cosmetics
            "paletteColors": "#FF0000,#1aaf5d",
            "baseFontColor": "#333333",
            "baseFont": "Helvetica Neue,Arial",
            "captionFontSize": "14",
            "subcaptionFontSize": "14",
            "subcaptionFontBold": "0",
            "showBorder": "0",
            "bgColor": "#ffffff",
            "showShadow": "0",
            "canvasBgColor": "#ffffff",
            "canvasBorderAlpha": "0",
            "divlineAlpha": "100",
            "divlineColor": "#999999",
            "divlineThickness": "1",
            "divLineIsDashed": "1",
            "divLineDashLen": "1",
            "divLineGapLen": "1",
            "usePlotGradientColor": "0",
            "showplotborder": "0",
            "valueFontColor": "#ffffff",
            "placeValuesInside": "1",
            "showHoverEffect": "1",
            "rotateValues": "1",
            "showXAxisLine": "1",
            "xAxisLineThickness": "1",
            "xAxisLineColor": "#999999",
            "showAlternateHGridColor": "0",
            "legendBgAlpha": "0",
            "legendBorderAlpha": "0",
            "legendShadow": "0",
            "legendItemFontSize": "10",
            "legendItemFontColor": "#666666"
        },
        "categories": [{
            "category": [
              { "label": "JAN."},
              { "label": "FEB."},
              { "label": "MAR."},
              { "label": "APR."},
              { "label": "MAY."},
              { "label": "JUN."},
              { "label": "JUL."},
              { "label": "AUG."},
              { "label": "SEP."},
              { "label": "OCT."},
              { "label": "NOV."},
              { "label": "DEC."}
            ]
        }],
        "dataset": [{
            "seriesname": "No",
            "data": [
            <?php
            $resultN = mysqli_fetch_array($queryN);
            ?>
              { "value": "<?php echo $resultN["N1701"];?>" },
              { "value": "<?php echo $resultN["N1702"];?>" },
              { "value": "<?php echo $resultN["N1703"];?>" },
              { "value": "<?php echo $resultN["N1704"];?>" },
              { "value": "<?php echo $resultN["N1705"];?>" },
              { "value": "<?php echo $resultN["N1706"];?>" },
              { "value": "<?php echo $resultN["N1707"];?>" },
              { "value": "<?php echo $resultN["N1708"];?>" },
              { "value": "<?php echo $resultN["N1709"];?>" },
              { "value": "<?php echo $resultN["N1710"];?>" },
              { "value": "<?php echo $resultN["N1711"];?>" },
              { "value": "<?php echo $resultN["N1712"];?>" }
            ]
        }, {
            "seriesname": "Yes",
            "data": [
              <?php
              $resultY = mysqli_fetch_array($queryY);
              ?>
              { "value": "<?php echo $resultY["Y1701"];?>" },
              { "value": "<?php echo $resultY["Y1702"];?>" },
              { "value": "<?php echo $resultY["Y1703"];?>" },
              { "value": "<?php echo $resultY["Y1704"];?>" },
              { "value": "<?php echo $resultY["Y1705"];?>" },
              { "value": "<?php echo $resultY["Y1706"];?>" },
              { "value": "<?php echo $resultY["Y1707"];?>" },
              { "value": "<?php echo $resultY["Y1708"];?>" },
              { "value": "<?php echo $resultY["Y1709"];?>" },
              { "value": "<?php echo $resultY["Y1710"];?>" },
              { "value": "<?php echo $resultY["Y1711"];?>" },
              { "value": "<?php echo $resultY["Y1712"];?>" }
            ]
            }],
        "trendlines": [{
            "line": [{
                "startvalue": "10",
                "color": "#0075c2",
                "displayvalue": "Previous{br}Average",
                "valueOnRight": "1",
                "thickness": "1",
                "showBelow": "1",
                "tooltext": "Hello"
            }, {
                "startvalue": "20",
                "color": "#1aaf5d",
                "displayvalue": "Current{br}Average",
                "valueOnRight": "1",
                "thickness": "1",
                "showBelow": "1",
                "tooltext": "ยากนัก จารย์"
            }]
        }]
    }
}
);
    fusioncharts.render();
});
</script>



</head>
<body>
  <div class="container">
    <?php include_once 'manuBar.php'; //เรียกใช้ไฟล์ manuBar.php ?>
  </div><br>

  <center><div><form  method="post" name="form1">
    <select name="year" id="year">
<option value=" ">--Select Years--</option>
<?PHP $years=date("Y");
for($i=0; $i<=10; $i++) {?>
<option value="<?PHP echo $years-$i?>"><?PHP echo $years-$i?></option>
<?PHP }?>
</select>
		<input name="btnSubmit" type="submit" value="Submit" class="btn btn-success btn-sm">
	</form></div></center>


  <center><div class="container" id="chart-container">FusionCharts XT will load here!
          </div></center>
</body>
</html>
