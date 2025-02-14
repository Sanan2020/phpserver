<?php
require_once 'connect.php';
header('Access-Control-Allow-Origin: *');

$sql = "SELECT user_id,lesson_id,lesson_score FROM tb_lesson_score WHERE user_id = '".$_POST['user_id']."' AND lesson_id = '".$_POST['lesson_id']."'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  $sql = "UPDATE tb_lesson_score SET lesson_score='".$_POST['lesson_score']."' WHERE user_id = '".$_POST['user_id']."' AND lesson_id ='".$_POST['lesson_id']."'";
  if ($query = mysqli_query($conn, $sql)) {
    echo json_encode("Update point success");
 } else {
   echo json_encode("Error: " . $sql . "<br>" . mysqli_error($conn));
 }


}else{
  $sql = "INSERT INTO tb_lesson_score (user_id,lesson_id,lesson_score) VALUES ('".$_POST['user_id']."','".$_POST['lesson_id']."','".$_POST['lesson_score']."')";
  if ($query = mysqli_query($conn, $sql)) {
      echo json_encode("Insert point success");
   } else {
     echo json_encode("Error: " . $sql . "<br>" . mysqli_error($conn));
   }
}


//  $sql = "INSERT INTO tb_lesson_score (user_id,lesson_id,lesson_score) VALUES ('".$_POST['user_id']."','".$_POST['lesson_id']."','".$_POST['lesson_score']."')";
//  if ($query = mysqli_query($conn, $sql)) {
//      echo json_encode("New");
//   } else {
//     echo json_encode("Error: " . $sql . "<br>" . mysqli_error($conn));
//   }
mysqli_close($conn);

//echo json_encode($_POST['email']."' ,'".$_POST['password']."' ,'".$_POST['fname']."' ,'".$_POST['lname']);
?>