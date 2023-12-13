<?php
require "connectDB.php";
header("Content-Type: application/json");
// Lấy dữ liệu gửi từ yêu cầu POST
$data = json_decode(file_get_contents("php://input"));
// Lấy ID từ URL
if (isset($data->hoTen) && isset($data->diaChi) && isset($data->sdt) && isset($data->cccd) && isset($data->gioiTinh)) {
    $uriSegments = explode('/', $_SERVER['REQUEST_URI']);
    // Lấy ID từ URI (ví dụ: 3)
    $id = (int) end($uriSegments);
    $hoTen = $data->hoTen;
    $diaChi = $data->diaChi;
    $sdt = $data->sdt;
    $cccd = $data->cccd;
    $gioiTinh = $data->gioiTinh;
    if ($data->gioiTinh == true){
        $gioiTinh=1;
    }else{
        $gioiTinh=0;
    }

    // Thêm nhân viên mới vào cơ sở dữ liệu
    $sql = "UPDATE tbl_nhanvien SET hoTen='$hoTen', diaChi='$diaChi', sdt='$sdt', cccd='$cccd', gioiTinh=$gioiTinh WHERE maNV=$id";
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
