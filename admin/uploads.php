<?php
include("../db.php");

if (isset($_POST['submit'])) {

    $name  = $_POST['name'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $processor = $_POST['processor'];
    $processor_speed = $_POST['processor_speed'];
    $video_graphics = $_POST['video_graphics'];
    $screen_size = $_POST['screen_size'];
    $display = $_POST['display'];
    $memory = $_POST['memory'];
    $memory_slots = $_POST['memory_slots'];
    $max_memory = $_POST['max_memory'];
    $storage = $_POST['storage'];
    $operating_system = $_POST['operating_system'];
    $camera = $_POST['camera'];
    $connection_port = $_POST['connection_port'];
    $wifi_bluetooth = $_POST['wifi_bluetooth'];
    $battery = $_POST['battery'];
    $color = $_POST['color'];
    $weight = $_POST['weight'];
    $warranty = $_POST['warranty'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $description = $_POST['description'];


        $image   = "";
        $image_l = "";
        $image_r = "";

        if ($_FILES['image']['error'] == 0) {
            $image = time() . "_" . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $image);
        }

        if (!empty($_FILES['image_l']['name'])) {
            $image_l = time() . "_l_" . $_FILES['image_l']['name'];
            move_uploaded_file($_FILES['image_l']['tmp_name'], "../uploads/" . $image_l);
        }

        if (!empty($_FILES['image_r']['name'])) {
            $image_r = time() . "_r_" . $_FILES['image_r']['name'];
            move_uploaded_file($_FILES['image_r']['tmp_name'], "../uploads/" . $image_r);
        }

    $stmt = $conn->prepare("INSERT INTO notebook 
        (name, brand, model, processor, processor_speed, video_graphics,
        screen_size, display, memory, memory_slots, max_memory, storage,
        operating_system, camera, connection_port, wifi_bluetooth,
        battery, color, weight, warranty, price, image, type, image_l, image_r, description)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param("ssssssssssssssssssssssssss",
        $name, $brand, $model, $processor, $processor_speed, $video_graphics,
        $screen_size, $display, $memory, $memory_slots, $max_memory, $storage,
        $operating_system, $camera, $connection_port, $wifi_bluetooth,
        $battery, $color, $weight, $warranty, $price, $image, $type, $image_l, $image_r, $description
    );

    $stmt->execute();
    echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>OGGY</title>

<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="../login.css">
<link rel="stylesheet" href="../uploads.css">
</head>

<body>

<header class="header">
    <div class="header-inner">

        <!-- LOGO (คลิกกลับหน้าแรก) -->
        <a href="home.php" class="logo">
            <img src="../png/oggy.png" alt="OGGY">
        </a>

        <!-- เมนู -->
        <nav class="nav">
            <a href="home.php">หน้าหลัก</a>  
            <a href="list.php">รายการโน๊ตบุ๊ค</a>
            <a href="contact.php">ติดต่อเรา</a>
            <a href="about.php">เกี่ยวกับเรา</a>
            <a href="uploads.php">เพิ่มข้อมูล</a>
            <a href="logout.php">ออกจากระบบ</a>
        </nav>

    </div>
</header>
<div class="admin-wrapper">

<h2 class="admin-title">เพิ่มข้อมูลโน๊ตบุ๊คใหม่</h2>

<form method="POST" enctype="multipart/form-data" class="admin-form">

<div class="form-grid">

<!-- LEFT -->
<div class="form-col">

<input type="text" name="name" placeholder="ชื่อ" required>
<input type="text" name="brand" placeholder="แบรนด์" required>
<input type="text" name="model" placeholder="รุ่น" required>
<input type="text" name="processor" placeholder="CPU" required>
<input type="text" name="processor_speed" placeholder="ความเร็ว CPU">
<input type="text" name="video_graphics" placeholder="GPU">
<input type="text" name="screen_size" placeholder="ขนาดจอ">
<input type="text" name="display" placeholder="ประเภทจอ">
<input type="text" name="memory" placeholder="RAM">
<input type="text" name="memory_slots" placeholder="ช่อง RAM">
<input type="text" name="max_memory" placeholder="RAM สูงสุด">
<input type="text" name="storage" placeholder="Storage">

</div>

<!-- RIGHT -->
<div class="form-col">

<input type="text" name="operating_system" placeholder="OS">
<input type="text" name="camera" placeholder="Camera">
<input type="text" name="connection_port" placeholder="Port">
<input type="text" name="wifi_bluetooth" placeholder="WiFi / Bluetooth">
<input type="text" name="battery" placeholder="Battery">
<input type="text" name="color" placeholder="Color">
<input type="text" name="weight" placeholder="Weight">
<input type="text" name="warranty" placeholder="Warranty">

<textarea name="description" placeholder="คำอธิบาย"></textarea>

<input type="number" name="price" placeholder="ราคา">

<select name="type">
<option value="เกมมิ่ง">เกมมิ่ง</option>
<option value="ทำงาน">ทำงาน</option>
</select>

<label>รูปหลัก</label>
<input type="file" name="image">

<input type="text" name="external_link" placeholder="ลิงก์เว็บไซต์ร้านค้า">


</div>

</div>

<button type="submit" name="submit" class="save-btn">
บันทึกข้อมูล
</button>

</form>
</div>