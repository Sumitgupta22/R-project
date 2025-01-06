<?php
include('../CONNECTION.PHP');

require('autoload.inc.php');
use Dompdf\Dompdf;
$obj = new Dompdf();
$sno = 0;
if (empty($_GET['USERID'])) {
    $user_id = $_GET['USERID'];
    //$user_id = "sumitaaaa";
    $query = mysqli_query($con, 'select * from ' . "$user_id" . ';');
    if (mysqli_num_rows($query) > 0) {

        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['sno'] == 1) {
                $html = "<table>";
                $html .= "<tr><th>" . "S NO" . "</th><th>" . $row['H1'] . "</th><th>" . $row['H2'] . "</th><th>" . $row['H3'] . "</th><th>" . $row['H4'] . "</th></tr>";
            } else {
                $html .= "<tr><td>" . $sno . "</td><td>" . $row['H1'] . "</td><td>" . $row['H2'] . "</td><td>" . $row['H3'] . "</td><td>" . $row['H4'] . "</td></tr>";

            }
            $sno++;
        }
        $html .= "</table>";
    } else {
        $html = "data not found";
    }
}
$obj->loadhtml($html);
$obj->render();
$obj->stream('RECORD.PDF', array('Attachment' => 0));

?>