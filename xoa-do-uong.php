<?php
require "connectDB.php";
header("Content-Type: application/json");
// Lấy dữ liệu gửi từ yêu cầu POST
$data = json_decode(file_get_contents("php://input"));
// Lấy ID từ URL
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
// Lấy dữ liệu từ URI (ví dụ: xoa-do-uong.php/3)
    $uriSegments = explode('/', $_SERVER['REQUEST_URI']);
    // Lấy ID từ URI (ví dụ: 3)
    $id = (int) end($uriSegments);
        // Thêm nhân viên mới vào cơ sở dữ liệu
        $sql = "DELETE FROM tbl_douong WHERE maDoUong=$id";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }

} else {
    http_response_code(405); // Method Not Allowed
    echo "Phương thức không được phép";
    exit();
}

// Đóng kết nối
mysqli_close($conn);
?>
