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

        <!-- LOGO HEADER -->
        <a href="index.php" class="logo">
            <img src="png/oggy.png" alt="OGGY">
        </a>

        <!-- MENU -->
        <nav class="nav">
            <a href="#">หน้าหลัก</a>
            <a href="#">ค้นหา</a>
            <a href="#">บทความ</a>
            <a href="#">รีวิวล่าสุด</a>
            <a href="#">ติดต่อเรา</a>
            <a href="#">เกี่ยวกับเรา</a>
            <a href="#">อื่นๆ</a>
        </nav>

        <!-- SEARCH -->
        <div class="search">
            <input type="text" placeholder="ค้นหา">
        </div>

    </div>
</header>

<!-- ================= LOGIN PAGE ================= -->
<div class="login-page">
    <div class="login-card">

        <!-- LOGO IMAGE -->
        <img src="png/oggy.png" alt="OGGY" class="login-logo-img">

        <p class="login-text">ล็อกอินเข้าสู่ระบบแอดมิน</p>

        <input type="email" id="email" placeholder="กรุณากรอกอีเมล">

        <div class="password-wrap">
            <input type="password" id="password" placeholder="กรุณากรอกรหัสผ่าน">
            <span class="eye" onclick="togglePassword()">👁</span>
        </div>

        <button class="login-btn" onclick="login()">เข้าสู่ระบบ</button>

    </div>
</div>

<script>
function togglePassword() {
    const p = document.getElementById("password");
    p.type = (p.type === "password") ? "text" : "password";
}

function login() {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    if (email === "admin@gmail.com" && password === "123456") {
        alert("เข้าสู่ระบบสำเร็จ");
        window.location.href = "admin/home.php"; // หน้าแอดมิน
    } else {
        alert("อีเมลหรือรหัสผ่านไม่ถูกต้อง");
    }
}
</script>


</body>
</html>
