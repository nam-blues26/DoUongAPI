<?php
require "connectDB.php";
header("Content-Type: application/json");
// Lấy dữ liệu gửi từ yêu cầu POST
$data = json_decode(file_get_contents("php://input"));
// Lấy ID từ URL
if (isset($data->maNV)) {
    $id = $data->maNV;
    // Thêm nhân viên mới vào cơ sở dữ liệu
    $sql = "DELETE FROM tbl_nhanvien WHERE maNV=$id";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false));
    }
} else {
    echo json_encode(array("success" => null));
}

// Đóng kết nối
mysqli_close($conn);
?>