<?php
require "connectDB.php";
header("Content-Type: application/json");
// Lấy dữ liệu gửi từ yêu cầu POST

// Thêm nhân viên mới vào cơ sở dữ liệu
$sql = "SELECT * FROM tbl_nhanvien";

$list = array();
//kiểm tra
if ($result = mysqli_query($conn, $sql)) {
    while ($row = mysqli_fetch_array($result)) {
        array_push($list,array(
            "maNV" =>(int) $row['maNV'],
            "hoTen" => $row['hoTen'],
            "diaChi" => $row['diaChi'],
            "sdt" => $row['sdt'],
            "cccd" => $row['cccd'],
            "gioiTinh" =>(bool) $row['gioiTinh'],));
    }
    echo json_encode($list);
} else
    //Hiện thông báo khi không thành công
    echo 'Không thành công. Lỗi' . mysqli_error($conn);

// Đóng kết nối
mysqli_close($conn);
?>
