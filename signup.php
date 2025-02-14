<?php
/* For sign_up.dart */
require_once 'connect.php';
header('Access-Control-Allow-Origin: *');

 //INSERT INTO table_name (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);
 $sql = "SELECT email FROM tb_accounts WHERE email = '".$_POST['email']."'";
 $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) {
  echo json_encode("non");
 }else{
  $str = $_POST['password'];
  $d_str = base64_encode($str);
  $sql = "INSERT INTO tb_accounts(email,password,fname,lname) VALUES ('".$_POST['email']."' ,'".$d_str."' ,'".$_POST['fname']."' ,'".$_POST['lname']."')";
 if ($query = mysqli_query($conn, $sql)) {
    echo json_encode("New");

  } else {
    echo json_encode("Error: " . $sql . "<br>" . mysqli_error($conn));
  }
 }

mysqli_close($conn);

//echo json_encode($_POST['email']."' ,'".$_POST['password']."' ,'".$_POST['fname']."' ,'".$_POST['lname']);
?>