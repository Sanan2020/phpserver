<?php
/* For page_search.dart */
require_once 'connect.php';
header('Access-Control-Allow-Origin: *'); 
//$sql = "SELECT id, chords, pic FROM lesson WHERE id = '".$_POST['id']."'";
$sql = "SELECT id, chords, pic ,freq_start ,freq_end,
        (SELECT COUNT(id)
        FROM tb_lesson
        ) AS lcount
FROM tb_lesson";
//WHERE id = '".$_POST['id']."'
//$AA= $_POST['lname'];
$query = mysqli_query($conn, $sql);
//$result['new'] = $AA; 
 //return
 $data = array();
 while($row = $query->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);

//ก่อนเป็นก้อน
/*if($result = mysqli_fetch_array($query,MYSQLI_ASSOC)){
    echo json_encode($result);
}else{
    echo json_encode("non");
}*/
mysqli_close($conn);
?>