<?php
require "connectDB.php";
header("Content-Type: application/json");
// Lấy dữ liệu gửi từ yêu cầu POST
$data = json_decode(file_get_contents("php://input"));
if (isset($data->maDoUong) && isset($data->tenDoUong) && isset($data->gia)) {
    $maDoUong = $data->maDoUong;
    $tenDoUong = $data->tenDoUong;
    $gia = $data->gia;
    $trangThai = $data->trangThai;
    $maLoai = $data->maLoai;

    // Thêm nhân viên mới vào cơ sở dữ liệu
    $sql = "UPDATE tbl_douong  SET tenDoUong='$tenDoUong', gia=$gia,trangThai = $trangThai WHERE maDoUong= $maDoUong";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false ));
    }
} else {
    echo json_encode(array("success" => null));
}

// Đóng kết nối
mysqli_close($conn);
?>
