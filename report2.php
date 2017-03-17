<?php
session_start();
	require_once("conn.php");
	require_once 'PHPExcel/Classes/PHPExcel.php';
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
/*error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

	error_reporting(E_ALL);

	date_default_timezone_set('Asia/Bangkok');

/** PHPExcel */




// Create new PHPExcel object
//echo date('H:i:s') . " Create new PHPExcel object\n";
$objPHPExcel = new PHPExcel();

// Set properties
//echo date('H:i:s') . " Set properties\n";
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
							 
// Add some data header
//echo date('H:i:s') . " Add some data\n";
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'GROUP')
            ->setCellValue('C1', 'ITEM')
			->setCellValue('D1', 'CHECK')
			->setCellValue('E1', 'DETAIL')
			->setCellValue('F1', 'CREATEDAY');
			//->setCellValue('F1', 'STATUS')
			
			
           

				$sDate = $_REQUEST['sDate'];
				

				//Echo $sDate;
// Config search filter			
$strSQL= "SELECT*FROM tbtransaction WHERE tbtransaction.t_createday ='$sDate' ";
				
 							 
//Query SQL
$objQuery = mysqli_query($con,$strSQL);
$i=2;
while($result = mysqli_fetch_array($objQuery))
{

	
	$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $result["t_id"]);
	$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $result["g_id"]);
	$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $result["i_id"]);
	$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $result["t_by"]);
	$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $result["t_detail"]);
	$objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $result["t_createday"]);
	
	$i++;
}


//echo $strSQL;


// Rename sheet
//echo date('H:i:s') . " Rename sheet\n";
$objPHPExcel->getActiveSheet()->setTitle('My Customer');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="testTAO.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');


echo"<body onload=\"window.alert('Success'); return history.back();\">";

exit;
// Echo memory peak usage
//echo date('H:i:s') . " Peak memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB\r\n";

// Echo done
//echo date('H:i:s') . " Done writing file.\r\n";
?>
