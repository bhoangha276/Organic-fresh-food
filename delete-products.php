<?php
include "db_connect.php";

//var_dump($_POST);
$MaChatLieu = $_POST['MaChatLieu'];
$TenChatLieu = $_POST['TenChatLieu'];

$sql = "UPDATE tblchatlieu set TenChatLieu='".$TenChatLieu."' Where MaChatLieu='$MaChatLieu'";

//print ($sql);
if ($conn->query($sql) === TRUE) {
    echo "Cập nhật thành công";
    echo "<br><a href='tblchatlieu_list.php'>Quay lại</a>";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}
?>