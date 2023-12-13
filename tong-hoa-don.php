<?php
require "connectDB.php";
header("Content-Type: application/json");
// Lấy dữ liệu gửi từ yêu cầu POST

// Thêm nhân viên mới vào cơ sở dữ liệu
$sql = "Select COUNT(*) as soLuongHD, SUM(tongGia) as doanhThu FROM tbl_hoadonban";

$list = array();
//kiểm tra
if ($result = mysqli_query($conn, $sql)) {
    while ($row = mysqli_fetch_array($result)) {
        echo json_encode(array(
            "soLuongHD"=>(int) $row['soLuongHD'],
            "doanhThu" =>(int) $row['doanhThu']));
    }

} else
    //Hiện thông báo khi không thành công
    echo 'Không thành công. Lỗi' . mysqli_error($conn);

// Đóng kết nối
mysqli_close($conn);
?>
