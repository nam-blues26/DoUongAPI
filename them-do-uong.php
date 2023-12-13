<?php
require "connectDB.php";
header("Content-Type: application/json");
// Lấy dữ liệu gửi từ yêu cầu POST
$data = json_decode(file_get_contents("php://input"));
if (isset($data->tenDoUong) && isset($data->gia)) {
    $tenDoUong = $data->tenDoUong;
    $gia = $data->gia;
    $trangThai = true;
    $maLoai = $data->maLoai;

    // Thêm nhân viên mới vào cơ sở dữ liệu
    $sql = "INSERT INTO tbl_douong (tenDoUong, gia, trangThai,maLoai) VALUES ('$tenDoUong', '$gia', $trangThai,$maLoai)";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(true);
    } else {
        echo json_encode(false );
    }
} else {
    echo json_encode( false);
}

// Đóng kết nối
mysqli_close($conn);
?>
