<?php
require "connectDB.php";
header("Content-Type: application/json");
// Lấy dữ liệu gửi từ yêu cầu POST
$data = json_decode(file_get_contents("php://input"));
// Lấy ID từ URL
if (isset($data->maNV) && isset($data->hoTen) && isset($data->diaChi) && isset($data->sdt) && isset($data->cccd) && isset($data->gioiTinh)) {
    $id = $data->maNV;
    $hoTen = $data->hoTen;
    $diaChi = $data->diaChi;
    $sdt = $data->sdt;
    $cccd = $data->cccd;
    $gioiTinh = $data->gioiTinh;

    // Thêm nhân viên mới vào cơ sở dữ liệu
    $sql = "UPDATE tbl_nhanvien SET hoTen='$hoTen', diaChi='$diaChi', sdt='$sdt', cccd='$cccd', gioiTinh=$gioiTinh WHERE maNV=$id";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false ));
    }
} else {
    echo json_encode(array("success" => null));
}

// Đóng kết nối
mysqli_close($conn);
?>
