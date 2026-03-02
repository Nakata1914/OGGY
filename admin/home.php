<?php
include("check_admin.php");
include("../db.php");

$sql = "SELECT * FROM notebook";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>AdminPage</title>

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
        </nav>

    </div>
</header>


<div style="border:2px solid #ccc; padding: 20px 20px 20px 20px; margin: 20px 80px 20px 80px; background:#f9f9f9;">

<div style="display:flex; gap:60px; align-items:center;">

    <a href="https://pjoggy.xo.je/n/admin/detail.php?id=4"><img src="../png/01 1.png" style="flex:1; height:500px; object-fit:contain;"></a>
    <a href="https://notebookspec.com/web/842595-asus-expertcenter-p500sv-business-pc"><img src="../png/asus.png" style="flex:2; height:500px; object-fit:contain;"></a>
    <a href="https://pjoggy.xo.je/n/admin/detail.php?id=1"><img src="../png/01 2.png" style="flex:1; height:500px; object-fit:contain;"></a>

</div>

<hr style="border:1px solid #ccc; margin: 20px 10px 20px 10px;">

<h2>-- แนะนำโน๊ตบุ๊คเกมมิ่ง --</h2>

<div style="display:flex; flex-wrap:wrap; gap:15px;">

    <?php
    $sql1 = "SELECT * FROM notebook WHERE type = 'เกมมิ่ง' LIMIT 5";
    $result1 = $conn->query($sql1);

    while($row = $result1->fetch_assoc()){
    ?>

        <div style="width:19%; border:1px solid #ccc;padding:15px; margin:5px 2px 8px 2px; display:flex; flex-direction:column;">

            <div>
                <a href="detail.php?id=<?php echo $row['id']; ?>">
                    <img src="../uploads/<?php echo $row['image']; ?>"
                        style="width:100%; height:200px; object-fit:contain;">
                </a>

                <a href="detail.php?id=<?php echo $row['id']; ?>" style="color:#162456; font-size:18px;">
                    <?php echo $row['name']; ?>
                </a>

                <div style="color:#3F3F46; font-size:15px;">
                    CPU: <?php echo $row['processor']; ?>
                </div>
                <div style="color:#3F3F46; font-size:15px;">
                    GPU: <?php echo $row['video_graphics']; ?>
                </div>
                <div style="color:#3F3F46; font-size:15px;">
                    RAM: <?php echo $row['memory']; ?>
                </div>
                <div style="color:#3F3F46; font-size:15px;">
                    SSD: <?php echo $row['storage']; ?>
                </div>
                <div style="color:#3F3F46; font-size:15px;">
                    DP: <?php echo $row['screen_size']; ?>
                </div>
            </div>

            <div style="margin-top:auto; text-align:right;">
                <h2 style="color:red; margin:0;">
                    <?php echo number_format($row['price']); ?> บาท
                </h2>
            </div>

        </div>

    <?php } ?>

</div>

<h2>-- แนะนำโน๊ตบุ๊คทำงาน --</h2>

<div style="display:flex; flex-wrap:wrap; gap:15px;">

    <?php
    $sql1 = "SELECT * FROM notebook WHERE type = 'ทำงาน' LIMIT 5";
    $result1 = $conn->query($sql1);

    while($row = $result1->fetch_assoc()){
    ?>

        <div style="width:19%; border:1px solid #ccc;padding:15px; margin:5px 2px 8px 2px; display:flex; flex-direction:column;">

            <div>
                <a href="detail.php?id=<?php echo $row['id']; ?>">
                    <img src="../uploads/<?php echo $row['image']; ?>"
                        style="width:100%; height:200px; object-fit:contain;">
                </a>

                <a href="detail.php?id=<?php echo $row['id']; ?>" style="color:#162456; font-size:18px;">
                    <?php echo $row['name']; ?>
                </a>

                <div style="color:#3F3F46; font-size:15px;">
                    CPU: <?php echo $row['processor']; ?>
                </div>
                <div style="color:#3F3F46; font-size:15px;">
                    GPU: <?php echo $row['video_graphics']; ?>
                </div>
                <div style="color:#3F3F46; font-size:15px;">
                    RAM: <?php echo $row['memory']; ?>
                </div>
                <div style="color:#3F3F46; font-size:15px;">
                    SSD: <?php echo $row['storage']; ?>
                </div>
                <div style="color:#3F3F46; font-size:15px;">
                    DP: <?php echo $row['screen_size']; ?>
                </div>
            </div>

            <div style="margin-top:auto; text-align:right;">
                <h2 style="color:red; margin:0;">
                    <?php echo number_format($row['price']); ?> บาท
                </h2>
            </div>

        </div>

<?php
    }
?>

</body>
</html>
