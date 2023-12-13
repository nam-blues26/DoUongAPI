<?php
require "connectDB.php";
header("Content-Type: application/json");
// Lấy dữ liệu gửi từ yêu cầu POST
$data = json_decode(file_get_contents("php://input"));
if (isset($data->hoTen) && isset($data->diaChi) && isset($data->sdt) && isset($data->cccd) && isset($data->gioiTinh)) {
    $hoTen = $data->hoTen;
    $diaChi = $data->diaChi;
    $sdt = $data->sdt;
    $cccd = $data->cccd;
    if ($data->gioiTinh == true){
        $gioiTinh=1;
    }else{
        $gioiTinh=0;
    }
    // Thêm nhân viên mới vào cơ sở dữ liệu
    $sql = "INSERT INTO tbl_nhanvien (hoTen, diaChi, sdt, cccd, gioiTinh) VALUES ('$hoTen', '$diaChi', '$sdt', '$cccd', 0)";
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
