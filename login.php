<?php
session_start();
include('db.php');

$error = false;

if (isset($_POST['login'])) {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    // ใช้ Prepared Statement เพื่อความปลอดภัยจากการ SQL Injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = ? AND user_password = ?");
    $stmt->bind_param("ss", $user_email, $user_password);
    $stmt->execute();
    $result = $stmt->get_result();

if ($result->num_rows == 1) {
    $rs = $result->fetch_assoc();

    $_SESSION['user_id']    = $rs['id'];
    $_SESSION['user_name']  = $rs['user_name'];
    $_SESSION['user_email'] = $rs['user_email'];
    $_SESSION['user_role']  = $rs['user_role'];  // ⭐ สำคัญ

    header("Location: admin/home.php");
    exit();
}

}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>OGGY</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>

<header class="header">
    <div class="header-inner">
        <a href="index.php" class="logo">
            <img src="png/oggy.png" alt="OGGY">
        </a>

        <nav class="nav">
            <a href="home.php">หน้าหลัก</a>  
            <a href="list.php">รายการโน๊ตบุ๊ค</a>
            <a href="contact.php">ติดต่อเรา</a>
            <a href="about.php">เกี่ยวกับเรา</a>
            <a href="login.php">อื่นๆ</a>
        </nav>

    </div>
</header>

<!-- ================= LOGIN PAGE ================= -->
<div class="login-page">
    <div class="login-card">

        <!-- LOGO IMAGE -->
        <img src="png/oggy.png" alt="OGGY" class="login-logo-img">

        <p class="login-text">ล็อกอินเข้าสู่ระบบแอดมิน</p>

            <form method="POST" action="">

                <input type="email" name="user_email" placeholder="กรุณากรอกอีเมล" required>

                <div class="password-wrap">
                    <input type="password" name="user_password" id="password" placeholder="กรุณากรอกรหัสผ่าน" required>
                    <span class="eye" onclick="togglePassword()">👁</span>
                </div>

                <button type="submit" name="login" class="login-btn">
                    เข้าสู่ระบบ
                </button>

            </form>


    </div>
</div>

<script>
function togglePassword() {
    const p = document.getElementById("password");
    p.type = (p.type === "password") ? "text" : "password";
}

</script>


</body>
</html>
