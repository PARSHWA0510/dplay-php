<?php header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=coach_inquiry.csv');

include "../config.php";  date_default_timezone_set('Asia/Kolkata');
$admin_id = $_SESSION['admin_id'];
$query = sprintf("select * from coach_inquiry where manager_id = '$admin_id'");
$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
if ($row) {
    echocsv(array_keys($row));
}
/*
 * output data rows (if atleast one row exists)
 */
while ($row) {
    echocsv($row);
    $row = mysqli_fetch_assoc($result);
}
/*
 * echo the input array as csv data maintaining consistency with most CSV implementations
 * - uses double-quotes as enclosure when necessary
 * - uses double double-quotes to escape double-quotes 
 * - uses CRLF as a line separator
 */
function echocsv($fields)
{
    $separator = '';
    foreach ($fields as $field) {
        if (preg_match('/\\r|\\n|,|"/', $field)) {
            $field = '"' . str_replace('"', '""', $field) . '"';
        }
        echo $separator . $field;
        $separator = ',';
    }
    echo "\r\n";
}
?>
