<?php
require_once('mpdf/mpdf.php');
ob_start();
require_once("conn.php");
session_start();
$sDate = $_REQUEST['sDate'];

?>
<html>
<head>

<link rel="shortcut icon" href="img/shortcut.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<style type="text/css">
 <!--
 @page rotated { size: landscape; }
 .style1 {
  font-family: "TH SarabunPSK";
  font-size: 18pt;
  font-weight: bold;
 }
 .style2 {
  font-family: "TH SarabunPSK";
  font-size: 16pt;
  font-weight: bold;
 }
 .style3 {
  font-family: "TH SarabunPSK";
  font-size: 16pt;
  
 }
 .style5 {cursor: hand; font-weight: normal; color: #000000;}
 .style9 {font-family: Tahoma; font-size: 12px; }
 .style11 {font-size: 12px}
 .style13 {font-size: 9}
 .style16 {font-size: 9; font-weight: bold; }
 .style17 {font-size: 12px; font-weight: bold; }
 -->
 </style>

</head>
<body>
<h1>Haier</h1>
<table  border="1" width="100%" cellspacing="0" cellpadding="0">
    <tr bgcolor="#CC9900" >
    <th  align="center">IT PROBLEM RECORD</th>

    </tr>
  </table>
<table width="100%"><tr><td>Date: <?echo $sDate;?></td><td align="right">Created by: <?echo $_SESSION["u_name"];?></td></tr></table>

  
<?php 
  $sqlq = "SELECT * from tbtransaction where tbtransaction.t_createday ='$sDate'";
  $query1 = mysqli_query($con,$sqlq) ;
  $objResult = mysqli_fetch_array($query1);

//echo $objResult['t_createday'];

if($objResult['t_createday'])//เช็คตาราง t_createday
      {
    ?>
<table  style="width:100%" border="1" cellspacing="0" cellpadding="3"; >
   <tr bgcolor="#CC9900" >
        <th>No.</th>
        <th>Description</th>
        <th>By</th>
        <th>Detail if Not OK</th>        
  </tr>

<?php
 $tbtran = "SELECT * FROM tbgroup "; //ประกาศ tbtran แสดง table tbgroup
        $rows=@mysqli_query($con,$tbtran); //ประกาศ rows ตรวจสอบ $con,$tbtran

      $run = "1";//เอาไว้เก็บค่าตัวแปร วนรูป while ไม่ให้ซ้ำกัน
          while($qp=@mysqli_fetch_array($rows)){
        $tbtran1 = "SELECT * FROM tbitem WHERE g_id = '".$qp['g_id']."' ";
        $rows1=@mysqli_query($con,$tbtran1);
        
      ?>

<tr bgcolor="#CC9900">
        <td></td>
        <th align="left"><?=$qp['g_name']?></th>
        <td style="color: #CC9900;">.</td>
        <td style="color: #CC9900;">.</td>
      </tr>
<?php

        while($qp1=@mysqli_fetch_array($rows1)){  
            
        ?>

<tr>
    <td align="center" >
    <input type="hidden" name="item<?=$run?>" value="<?=$qp1['i_name']?>">
    <input type="hidden" name="group<?=$run?>" value="<?=$qp1['g_id']?>"> <?=$qp1['i_id']?>
    </td>
    <td ><?=$qp1['i_name']?></td>
        <?
          $sqlq4 = "SELECT * from tbtransaction where i_id = '".$qp1['i_name']."' and t_createday = '".$_REQUEST['sDate']."' " ;
           $query14 = mysqli_query($con,$sqlq4) ;
          
           while($qp34=mysqli_fetch_array($query14)){ 
          

        ?>  
    <td align="center">
        <?          
          if( $qp34["t_by"] == 'Y' ){
        ?>
              yes      
        <?
          }else if( $qp34["t_by"] == 'N' ){
        ?>
              no               
        <?
          }else {       
        ?>
              -             
        <?
          }
        ?>
          </td>

    <td align="center">

          <?=$qp34['t_detail']; ?>
        
     </td>
    <? $run++; } ?>

          </tr>
        
         <?  
          } } 
         ?>
  </table>
<table  width="100%" border="1"  cellspacing="0" cellpadding="0">
    <tr >
    <th  align="left">Remark :<br><br><br><br></th>

    </tr>
  </table><br>
<p align="right"> Approved By: .....................................................................</p>
    <p align="right">Date: .....................................................................</p>
    
<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr><td>
    <font size="1">M-CPP-IT-F008</font></td><td align="right">
    <font size="1" >v.1 Effective on january 1, 2016</font></td></tr></table>
<?php
  mysqli_close($con);
 }
 else {
 ?>
 <?  //echo  "" ;
 }
 ?>    
</body>
</html>
<?Php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th', 'A4', '11', 'THSaraban');
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>     