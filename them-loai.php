<?php
require "connectDB.php";
header("Content-Type: application/json");
// Lấy dữ liệu gửi từ yêu cầu POST
$data = json_decode(file_get_contents("php://input"));
if (isset($data->tenLoai)) {
    $tenLoai = $data->tenLoai;


    // Thêm nhân viên mới vào cơ sở dữ liệu
    $sql = "INSERT INTO tbl_loai (tenLoai) VALUES ('$tenLoai')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
} else {
    echo json_encode(false);
}

// Đóng kết nối
mysqli_close($conn);
?>
