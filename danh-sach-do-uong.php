<?php
require "connectDB.php";
header("Content-Type: application/json");
// Lấy dữ liệu gửi từ yêu cầu POST

    // Thêm nhân viên mới vào cơ sở dữ liệu
    $sql = "SELECT * FROM tbl_douong WHERE trangThai= true";

    $list = array();
//kiểm tra
if ($result = mysqli_query($conn, $sql)) {
    while ($row = mysqli_fetch_array($result)) {
        array_push($list,array(
            "maDoUong" => $row['maDoUong'],
            "tenDoUong" => $row['tenDoUong'],
            "gia" => $row['gia'],
            "image" => $row['image'],));
    }
    echo json_encode($list);
} else
    //Hiện thông báo khi không thành công
    echo 'Không thành công. Lỗi' . mysqli_error($conn);

// Đóng kết nối
mysqli_close($conn);
?>
