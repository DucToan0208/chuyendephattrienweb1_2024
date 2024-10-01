<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

// Giải mã id khi nhận từ GET
function simple_decrypt($data) {
    return base64_decode($data); 
}

// Kiểm tra và xử lý khi có id được truyền qua URL
if (!empty($_GET['id'])) {
    $id = simple_decrypt($_GET['id']); 
    if (!is_numeric($id)) {
        die('ID không hợp lệ!'); 
    }

    // Xóa user nếu id hợp lệ
    $userModel->deleteUserById($id); 
    header('Location: list_users.php'); 
}
