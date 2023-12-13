<?php
require "connectDB.php";
header("Content-Type: application/json");
// Lấy dữ liệu gửi từ yêu cầu POST

// Thêm nhân viên mới vào cơ sở dữ liệu
$sql = "SELECT * FROM tbl_hoadonban ORDER BY id desc";

$list = array();
//kiểm tra
if ($result = mysqli_query($conn, $sql)) {
    while ($row = mysqli_fetch_array($result)) {
        array_push($list,array(
            "maHDB"=>(int) $row['maHDB'],
            "maNV" =>(int) $row['maNV'],
            "ngayLap" => $row['ngayLap'],
            "tongGia" => $row['tongGia'],
            "soBan" => (int)$row['soBan']));
    }
    echo json_encode($list);
} else
    //Hiện thông báo khi không thành công
    echo 'Không thành công. Lỗi' . mysqli_error($conn);

// Đóng kết nối
mysqli_close($conn);
?>
