<?php

include("check_admin.php");

?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เกี่ยวกับเรา</title>

    <!-- ฟอนต์ -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../about.css">
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

<section class="about-tech-pro">
    <div class="about-tp-wrap">

        <div class="about-tp-head">
            <span class="about-tp-tag">ABOUT OGGY</span>
            <h1>เกี่ยวกับเรา</h1>
        </div>

        <p class="about-tp-slogan">
            ถ้าคุณชอบโน้ตบุ๊ก เราคือเพื่อนกัน
        </p>

        <div class="about-tp-content">
            <p>
                <strong>OGGY</strong> คือแพลตฟอร์มข้อมูลด้านโน้ตบุ๊ก
                ที่ออกแบบมาเพื่อช่วยให้ผู้ใช้งานเลือกเครื่องที่
                <span class="tp-mark">เหมาะกับการใช้งานจริง</span>
                มากที่สุด ไม่ใช่แค่แรง แต่ต้องตอบโจทย์
            </p>

            <p>
                เรานำเสนอข้อมูลจากการวิเคราะห์การใช้งานจริง
                ครอบคลุมทั้งการเรียน การทำงาน งานกราฟิก
                การเล่นเกม และการใช้งานทั่วไป
                โดยยึดหลักความเป็นกลางและความคุ้มค่า
            </p>

            <p>
                เป้าหมายของเราคือการลดความซับซ้อนของข้อมูล
                เพื่อให้คุณตัดสินใจได้อย่างมั่นใจ
                และได้โน้ตบุ๊กที่เหมาะสมกับงบประมาณมากที่สุด
            </p>
        </div>

        <div class="about-tp-quote">
            <p>
                โน้ตบุ๊กที่ดี<br>
                คือเครื่องมือที่พาคุณไปได้ไกลกว่าเดิม
            </p>
        </div>

    </div>
</section>
</body>
</html>
