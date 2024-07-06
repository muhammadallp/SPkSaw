<?php
// $sql = 'SELECT * FROM saw_evaluations';
// $result = $db->query($sql);
// while ($row = $result->fetch_object()) {
//     if ($row=0) {
//     echo "<tr>
//       data kosong
//       </tr>\n";
//     }else {}}
$sql = "SELECT weight FROM saw_criterias ORDER BY id_criteria";
$result = $db->query($sql);
$i = 0;
$W = array();
while ($row = $result->fetch_object()) {
    $W[] = $row->weight;
}
