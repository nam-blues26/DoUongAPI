<?php
require "connectDB.php";
header("Content-Type: application/json");
// Lấy dữ liệu gửi từ yêu cầu POST
$data = json_decode(file_get_contents("php://input"));
if ( isset($data->tenDoUong) && isset($data->gia)) {
    $tenDoUong = $data->tenDoUong;
    $gia = $data->gia;
    $uriSegments = explode('/', $_SERVER['REQUEST_URI']);
    // Lấy ID từ URI (ví dụ: 3)
    $id = (int) end($uriSegments);
    // Thêm nhân viên mới vào cơ sở dữ liệu
    $sql = "UPDATE tbl_douong  SET tenDoUong='$tenDoUong', gia=$gia WHERE maDoUong= $id";

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
