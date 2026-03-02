<?php
include("check_admin.php");
include("../db.php");

// รับ id
$id = $_GET['id'] ?? 0;

// ดึงข้อมูลเดิม
$stmt = $conn->prepare("SELECT * FROM notebook WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// ถ้ากดบันทึก
if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];

    $update = $conn->prepare("UPDATE notebook SET name=?, brand=?, price=? WHERE id=?");
    $update->bind_param("ssii", $name, $brand, $price, $id);

    if ($update->execute()) {
        header("Location: detail.php?id=".$id);
        exit();
    } else {
        echo "เกิดข้อผิดพลาด";
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title><?php echo $row['name']; ?></title>

    <!-- ฟอนต์ -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../style.css">
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
            <a href="edit.php?id=<?= $row['id'] ?>">แก้ไขข้อมูล</a>
            <a href="delete.php?id=<?= $row['id'] ?>"onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนี้?');">ลบข้อมูล</a>   
        </nav>

    </div>
</header>


  <!-- ซ้าย: Filter -->
<div style="border:2px solid #ccc; padding: 20px 50px 20px 20px; margin: 20px 180px 20px 180px; background:#f9f9f9;">

    <form method="POST">

<div style="display:flex; gap:40px; align-items:flex-start;">

<div style="width:42%; border:1px solid #ccc; padding:20px;">
    <img src="../uploads/<?php echo $row['image']; ?>" 
         style="width:100%; height:450px; object-fit:contain;">
</div>

<div style="flex:1;">

    <label>name</label>
    <input type="text" name="name" value="<?= $row['name'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>description</label>
    <input type="text" name="description" value="<?= $row['description'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>brand</label>
    <input type="text" name="brand" value="<?= $row['brand'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>model</label>
    <input type="text" name="model" value="<?= $row['model'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>processor</label>
    <input type="text" name="processor" value="<?= $row['processor'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>processor_speed</label>
    <input type="text" name="processor_speed" value="<?= $row['processor_speed'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>video_graphics</label>
    <input type="text" name="video_graphics" value="<?= $row['video_graphics'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>screen_size</label>
    <input type="text" name="screen_size" value="<?= $row['screen_size'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>bradisplaynd</label>
    <input type="text" name="bradisplaynd" value="<?= $row['display'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>memory</label>
    <input type="text" name="memory" value="<?= $row['memory'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>memory_slots</label>
    <input type="text" name="memory_slots" value="<?= $row['memory_slots'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>max_memory</label>
    <input type="text" name="max_memory" value="<?= $row['max_memory'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>storage</label>
    <input type="text" name="storage" value="<?= $row['storage'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>operating_system</label>
    <input type="text" name="operating_system" value="<?= $row['operating_system'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>camera</label>
    <input type="text" name="camera" value="<?= $row['camera'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>connection_port</label>
    <input type="text" name="connection_port" value="<?= $row['connection_port'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>wifi_bluetooth</label>
    <input type="text" name="wifi_bluetooth" value="<?= $row['wifi_bluetooth'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>battery</label>
    <input type="text" name="battery" value="<?= $row['battery'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>color</label>
    <input type="text" name="color" value="<?= $row['color'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>weight</label>
    <input type="text" name="weight" value="<?= $row['weight'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>warranty</label>
    <input type="text" name="warranty" value="<?= $row['warranty'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>type</label>
    <input type="text" name="type" value="<?= $row['type'] ?>" style="width:100%; padding:8px;"><br><br>

    <label>price</label>
    <input type="number" name="price" value="<?= $row['price'] ?>" style="width:100%; padding:8px;"><br><br>

    

    <button type="submit" name="update" 
            style="padding:10px 20px; background:#162456; color:white; border:none;">
        บันทึกการแก้ไข
    </button>

</div>
</div>


</form>