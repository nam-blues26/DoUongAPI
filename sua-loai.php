<?php
require "connectDB.php";
header("Content-Type: application/json");
// Lấy dữ liệu gửi từ yêu cầu POST
$data = json_decode(file_get_contents("php://input"));
// Lấy ID từ URL
if (isset($data->tenLoai)) {
    $uriSegments = explode('/', $_SERVER['REQUEST_URI']);
    // Lấy ID từ URI (ví dụ: 3)
    $id = (int) end($uriSegments);
    $tenLoai = $data->tenLoai;
    $sql = "UPDATE tbl_loai SET tenLoai='$tenLoai' WHERE maLoai=$id";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(true);
    } else {
        echo json_encode(false );
    }
} else {
    echo json_encode(false);
}

// Đóng kết nối
mysqli_close($conn);
?>
