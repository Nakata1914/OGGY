<?php
include("db.php");

$id = $_GET['id'];   // รับ id จาก URL

$sql = "SELECT * FROM notebook WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title><?php echo $row['name']; ?></title>

    <!-- ฟอนต์ -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
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


  <!-- ซ้าย: Filter -->
<div style="border:2px solid #ccc; padding: 20px 50px 20px 20px; margin: 20px 180px 20px 180px; background:#f9f9f9;">

    <div style="display:flex; gap:40px; align-items:flex-start;">
<div style="width:42%; border:1px solid #ccc; padding: 20px 15px 20px 15px; margin: 5px 5px 8px 10px;"> 
    <a href="detail.php?id=<?php echo $row['id']; ?>"> 
        <img src="uploads/<?php echo $row['image']; ?>" style="width:100%; height:450px; object-fit:contain;">
     </a>
     </div>

        <div style="flex:1;"><br>
            <h2><?php echo $row['name']; ?></h2>
                <p><strong>CPU : </strong> <?php echo $row['processor']; ?></p>
                <p><strong>GPU : </strong> <?php echo $row['video_graphics']; ?></p>
                <p><strong>RAM : </strong> <?php echo $row['memory']; ?></p>
                <p><strong>SSD : </strong> <?php echo $row['storage']; ?></p>
                <p><strong>DP : </strong> <?php echo $row['screen_size']; ?></p>
                <div style="width:82%; border:1px solid #f9f9f9;"> 
                <p><strong></strong> <?php echo $row['description']; ?></p>
                </div>
<div style="width:48%; border:1px solid  padding: 5px 5px 5px 5px;">

<div style="margin-top:20px; ">

    <a href="<?php echo $row['external_link']; ?>" target="_blank" style="
        display:block;
        text-decoration:none;
        border:1px solid #ddd;
        padding: 5px 5px 5px 5px ;
        border-radius:8px;
        background:white;
        transition:0.3s;
    ">

        <h2 style="
        color:red;
        display:flex;
        align-items:center;
        gap:10px;
        margin:0;
        padding: 0.1px 5px 0.1px 5px ;
    ">
        <img src="png/jib.png" 
             style="height:40px; object-fit:contain;">
             
        <?php echo number_format($row['price']); ?> บาท

        <p style="color:#555; font-size:15px;">
            คลิกเพื่อดูรายละเอียด
        </p>
    </h2>

    </a>

</div></div>
        </div>

       

    </div>

    <hr style="border:1px solid #ccc; margin: 20px 10px 20px 10px;">

<h2>คุณสมบัติสินค้า</h2>

<table border="1" bordercolor="#ccc" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th align="left">รายการ</th>
            <th align="left">รายละเอียด</th>
        </tr>
    </thead>

    <tbody>
        <tr><td>Name</td><td><?= $row['name'] ?></td></tr>
        <tr><td>Brand</td><td><?= $row['brand'] ?></td></tr>
        <tr><td>Model</td><td><?= $row['model'] ?></td></tr>
        <tr><td>Processor</td><td><?= $row['processor'] ?></td></tr>
        <tr><td>Processor Speed</td><td><?= $row['processor_speed'] ?></td></tr>
        <tr><td>Graphics</td><td><?= $row['video_graphics'] ?></td></tr>
        <tr><td>Screen Size</td><td><?= $row['screen_size'] ?></td></tr>
        <tr><td>Display</td><td><?= $row['display'] ?></td></tr>
        <tr><td>Memory</td><td><?= $row['memory'] ?></td></tr>
        <tr><td>Memory Slots</td><td><?= $row['memory_slots'] ?></td></tr>
        <tr><td>Max Memory</td><td><?= $row['max_memory'] ?></td></tr>
        <tr><td>Storage</td><td><?= $row['storage'] ?></td></tr>
        <tr><td>Operating System</td><td><?= $row['operating_system'] ?></td></tr>
        <tr><td>Camera</td><td><?= $row['camera'] ?></td></tr>
        <tr><td>Connection Ports</td><td><?= $row['connection_port'] ?></td></tr>
        <tr><td>WiFi / Bluetooth</td><td><?= $row['wifi_bluetooth'] ?></td></tr>
        <tr><td>Battery</td><td><?= $row['battery'] ?></td></tr>
        <tr><td>Color</td><td><?= $row['color'] ?></td></tr>
        <tr><td>Weight</td><td><?= $row['weight'] ?></td></tr>
        <tr><td>Warranty</td><td><?= $row['warranty'] ?></td></tr>
    </tbody>
</table>

</body>
</html>
