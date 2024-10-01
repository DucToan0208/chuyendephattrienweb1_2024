<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$_id = NULL;

function simple_decrypt($data) {
    return base64_decode($data); 
}

$_id = NULL;
if (!empty($_GET['id'])) {
    $_id = simple_decrypt($_GET['id']);
    if (!is_numeric($_id)) {
        die('ID không hợp lệ!'); 
    }
    $user = $userModel->findUserById($_id); // Tìm user theo id
}




// Khởi tạo biến lưu lỗi
$errors = [];

// Hàm validate tên
function validate_name($name) {
    if (empty($name)) {
        return "Tên là bắt buộc.";
    }
    if (!preg_match("/^[a-zA-Z0-9]{5,15}$/", $name)) {
        return "Tên chỉ được chứa các ký tự A-Z, a-z, 0-9 và độ dài từ 5 đến 15 ký tự.";
    }
    return "";
}

// Hàm validate mật khẩu
function validate_password($password) {
    if (empty($password)) {
        return "Mật khẩu là bắt buộc.";
    }
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()])[A-Za-z\d~!@#$%^&*()]{5,10}$/", $password)) {
        return "Mật khẩu phải bao gồm chữ thường, chữ hoa, số và ký tự đặc biệt (~!@#$%^&*()), độ dài từ 5 đến 10 ký tự.";
    }
    return "";
}

// Kiểm tra khi người dùng submit form
if (!empty($_POST['submit'])) {
    // Validate name
    $name_error = validate_name($_POST['name']);
    if (!empty($name_error)) {
        $errors['name'] = $name_error;
    }

    // Validate password
    $password_error = validate_password($_POST['password']);
    if (!empty($password_error)) {
        $errors['password'] = $password_error;
    }

    // Nếu không có lỗi thì thực hiện insert/update
    if (empty($errors)) {
        if (!empty($_POST['id'])) {
            $_id = $_POST['id'];
            $userModel->updateUser($_POST);
        } else {
            $userModel->insertUser($_POST);
        }
        header('location: list_users.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php' ?>
    <div class="container">
        <?php if (!empty($user) || !isset($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $_id ?>">
                
                <!-- Name field -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value="<?php echo !empty($user[0]['name']) ? $user[0]['name'] : '' ?>">
                    <?php if (!empty($errors['name'])) { ?>
                        <div class="text-danger"><?php echo $errors['name'] ?></div>
                    <?php } ?>
                </div>
                
                <!-- Password field -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <?php if (!empty($errors['password'])) { ?>
                        <div class="text-danger"><?php echo $errors['password'] ?></div>
                    <?php } ?>
                </div>

                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                User not found!
            </div>
        <?php } ?>
    </div>
</body>
</html>
