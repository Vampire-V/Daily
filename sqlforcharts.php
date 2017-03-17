<?php
require_once("conn.php");
$name = $_POST['year'];
// echo $name;

$sqlChartsY="SELECT DISTINCT
(select count(t_by) from tbtransaction where t_by = 'Y' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-01') as Y1701,

(select count(t_by) from tbtransaction where t_by = 'Y' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-02') as Y1702,

(select count(t_by) from tbtransaction where t_by = 'Y' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-03') as Y1703,

(select count(t_by) from tbtransaction where t_by = 'Y' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-04') as Y1704,

(select count(t_by) from tbtransaction where t_by = 'Y' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-05') as Y1705,

(select count(t_by) from tbtransaction where t_by = 'Y' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-06') as Y1706,

(select count(t_by) from tbtransaction where t_by = 'Y' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-07') as Y1707,

(select count(t_by) from tbtransaction where t_by = 'Y' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-08') as Y1708,

(select count(t_by) from tbtransaction where t_by = 'Y' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-09') as Y1709,

(select count(t_by) from tbtransaction where t_by = 'Y' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-10') as Y1710,

(select count(t_by) from tbtransaction where t_by = 'Y' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-11') as Y1711,

(select count(t_by) from tbtransaction where t_by = 'Y' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-12') as Y1712

FROM tbtransaction";

$sqlChartsN="SELECT DISTINCT
(select count(t_by) from tbtransaction where t_by = 'N' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-01') as N1701,

(select count(t_by) from tbtransaction where t_by = 'N' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-02') as N1702,

(select count(t_by) from tbtransaction where t_by = 'N' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-03') as N1703,

(select count(t_by) from tbtransaction where t_by = 'N' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-04') as N1704,

(select count(t_by) from tbtransaction where t_by = 'N' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-05') as N1705,

(select count(t_by) from tbtransaction where t_by = 'N' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-06') as N1706,

(select count(t_by) from tbtransaction where t_by = 'N' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-07') as N1707,

(select count(t_by) from tbtransaction where t_by = 'N' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-08') as N1708,

(select count(t_by) from tbtransaction where t_by = 'N' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-09') as N1709,

(select count(t_by) from tbtransaction where t_by = 'N' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-10') as N1710,

(select count(t_by) from tbtransaction where t_by = 'N' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-11') as N1711,

(select count(t_by) from tbtransaction where t_by = 'N' and DATE_FORMAT(t_createday, '%Y-%m') = '".$name."-12') as N1712

FROM tbtransaction";


$queryY = mysqli_query($con, $sqlChartsY);
$queryN = mysqli_query($con, $sqlChartsN);
?>
