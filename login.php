<?php
require "connectDB.php";
header("Content-Type: application/json");
// Lấy dữ liệu gửi từ yêu cầu POST
$data = json_decode(file_get_contents("php://input"));

if (isset($data->username) && isset($data->password)) {
    $username = $data->username;
    $password = $data->password;

    // Kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo json_encode(array("success" => true));
    }else{
        echo json_encode(array("success" => false));
    }
} else {
    echo json_encode(array("message" => "Dữ liệu không hợp lệ"));
}

// Đóng kết nối
mysqli_close($conn);
?>
