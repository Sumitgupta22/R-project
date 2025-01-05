<?php
include('CONNECTION.PHP');
global $record;
$record = array();
if (!empty($_GET['USERID'])) {
    $user_id = $_GET['USERID'];
    $check_exist_table = $con->query("SHOW TABLES LIKE '$user_id'");
    if ($check_exist_table->num_rows > 0) {
        $query = "SELECT * FROM `$user_id`;";
        $result = mysqli_query($con, $query);
        $sno = 0;
        $no = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            global $son;
            if ($row['sno'] == 1) {

                $record[$no] = " <table><thead style='background-color: #002d72;'>
<tr>
<th>S. No.</th>
<th>" . $row['H1'] . "</th>
<th>" . $row['H2'] . "</th>
<th>" . $row['H3'] . "</th>
<th>" . $row['H4'] . "</th>
</tr>
</thead>
<tbody>
";
            } else {

                $record[$no] = "<tr>
<th>" . $son . "</th>
<td>" . $row['H1'] . "</td>
<td>" . $row['H2'] . "</td>
<td>" . $row['H3'] . "</td>
<td>" . $row['H4'] . "</td>
</tr>";
            }
            $son = $son + 1;
            $no = $no + 1;
        }
        echo "</table>";
    }
}

// var_dump($record);

// echo $record[0];
$storage;
global $storgae;

$i = 0;
while ($i < sizeof($record)) {
    global $storage;
    $storage = $storage . $record[$i];
    $i++;
}
echo $storage;

//$storage = "<h1>hello</h1>";
include('dompdf\dompdf\autoload.inc.php');
use Dompdf\Dompdf;
$obj = new Dompdf();

//$data = file_get_contents('DISPLAY_WITH_PDF.PHP');

$obj->loadhtml($storage);
$obj->render();
$obj->stream('RECORD.PDF', array('Attachment' => 0));

?>