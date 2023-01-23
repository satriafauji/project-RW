<?php
include "../../koneksi.php";
$data = array();

$query = "SELECT * FROM schedule_list";
$statement = $db->query($query);

foreach ($statement as $row) {
    $data[] = array(
        'id' => $row['id'],
        'title' => $row['title'],
        'description' => $row['description'],
        'start' => $row['start_datetime'],
        'end' => $row['end_datetime']
    );
}

echo json_encode($data);

?>