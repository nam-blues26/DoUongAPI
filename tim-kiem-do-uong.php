<?php
require "connectDB.php";
header("Content-Type: application/json");
// Lấy dữ liệu gửi từ yêu cầu POST
$data = json_decode(file_get_contents("php://input"));
if (isset($data->key)) {
    $key = $data->key;


    // Thêm nhân viên mới vào cơ sở dữ liệu
    $sql = "SELECT * FROM tbl_douong WHERE tenDoUong LIKE '%$key%'";
    $list = array();
    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($list,array(
                "maDoUong" =>(int) $row['maDoUong'],
                "tenDoUong" => $row['tenDoUong'],
                "gia" =>(int) $row['gia'],));
        }
        echo json_encode($list);
    } else
        //Hiện thông báo khi không thành công
        echo 'Không thành công. Lỗi' . mysqli_error($conn);

} else {
    echo json_encode(false);
}

// Đóng kết nối
mysqli_close($conn);
?>
