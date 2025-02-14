<?php
/* For page_lesson.dart -> easy */
require_once 'connect.php';
header('Access-Control-Allow-Origin: *'); 
//$sql = "SELECT id, chords, pic FROM lesson WHERE id = '".$_POST['id']."'";
$sql = "SELECT id, chords, song,
        (SELECT COUNT(id)
        FROM tb_practice WHERE freq_start ='".$_POST['type']."'
        ) AS lcount
FROM tb_practice WHERE freq_start ='".$_POST['type']."'";

$query = mysqli_query($conn, $sql);

 $data = array();
 while($row = $query->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);

mysqli_close($conn);
?>