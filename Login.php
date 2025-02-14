<?php
/* For login.dart */
require_once 'connect.php';
header('Access-Control-Allow-Origin: *'); 
$str = $_POST['password'];
$d_str = base64_encode($str);

$sql = "SELECT id, fname, lname FROM tb_accounts WHERE email = '".$_POST['email']."' AND  password = '".$d_str."' AND isAdmin='0'";
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