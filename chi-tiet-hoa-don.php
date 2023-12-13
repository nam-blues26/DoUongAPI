<?php
require "connectDB.php";
header("Content-Type: application/json");
// Lấy dữ liệu gửi từ yêu cầu POST
$uriSegments = explode('/', $_SERVER['REQUEST_URI']);
// Lấy ID từ URI (ví dụ: 3)
$id = (int) end($uriSegments);
// Thêm nhân viên mới vào cơ sở dữ liệu
$sql = "Select cthd.maHDB, cthd.soLuong, cthd.giaDoUong, du.tenDoUong From  qlydouong.tbl_chitiethoadon as cthd
left join qlydouong.tbl_douong as du on du.maDoUong = cthd.maDoUong Where cthd.maHDB = $id";

$list = array();
//kiểm tra
if ($result = mysqli_query($conn, $sql)) {
    while ($row = mysqli_fetch_array($result)) {
        array_push($list,array(
            "maHDB" =>(int) $row['maHDB'],
            "soLuong" => $row['soLuong'],
            "giaDoUong" => $row['giaDoUong'],
            "tenDoUong" => $row['tenDoUong'],));
    }
    echo json_encode($list);
} else
    //Hiện thông báo khi không thành công
    echo 'Không thành công. Lỗi' . mysqli_error($conn);

// Đóng kết nối
mysqli_close($conn);
?>
