<?php
/* For menu.dart */
require_once 'connect.php';
header('Access-Control-Allow-Origin: *'); 
//$sql = "SELECT id, chords, pic FROM lesson WHERE id = '".$_POST['id']."'";
// $sql = "SELECT id, chords, pic ,freq_start ,freq_end,
//         (SELECT COUNT(id)
//         FROM tb_lesson
//         ) AS lcount
// FROM tb_lesson_score WHERE email = '".$_POST['email']."'";

$sql ="SELECT acc.fname ,acc.lname ,gg.lesson_score ,mm.practice_score FROM tb_accounts acc 
LEFT JOIN ( SELECT user_id,SUM(lesson_score) AS lesson_score FROM tb_lesson_score GROUP BY tb_lesson_score.user_id ) gg ON acc.id = gg.user_id 
LEFT JOIN ( SELECT user_id,SUM(practice_score) AS practice_score FROM tb_practice_score GROUP BY tb_practice_score.user_id ) mm ON acc.id = mm.user_id 
WHERE isAdmin !='1' AND acc.email ='".$_POST['email']."'";
//$AA= $_POST['lname'];
$query = mysqli_query($conn, $sql);
//$result['new'] = $AA; 
 //return

if($result = mysqli_fetch_array($query,MYSQLI_ASSOC)){
    echo json_encode($result);
}else{
    echo json_encode("non");
}
mysqli_close($conn);
?>