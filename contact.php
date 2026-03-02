<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>OGGY</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contact.css">
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
<!-- CONTACT PAGE -->
<section class="contact-page">
    <div class="contact-card">

        <h2 class="contact-title">ติดต่อเรา</h2>
    
    <hr>

        <div class="contact-grid">

            <!-- LEFT : INFO -->
            <div class="contact-info">
                <h3>ที่อยู่ติดต่อ</h3>
                <p>
                    456/3 ถ. ตลาดใหม่ ตำบลตลาด<br>
                    อำเภอเมืองสุราษฎร์ธานี<br>
                    จังหวัดสุราษฎร์ธานี 84000
                </p>

                <hr>

                <h3>ติดต่อโฆษณา</h3>
                <p><span class="label">Email :</span>
                    <span class="value">67219010032@svc.ac.th</span>
                </p>
                <p><span class="label">โทรศัพท์ :</span>
                    <span class="value">099-272-6700</span>
                </p>
            </div>

            <!-- RIGHT : MAP -->
            <div class="contact-map">
                <div class="map-title">แผนที่ Google Map</div>

                <div class="map-frame">
                    <iframe 
                        src="https://www.google.com/maps?q=สุราษฎร์ธานี&output=embed"
                        loading="lazy">
                    </iframe>
                </div>
            </div>

        </div>
    </div>
</section>

</body>
</html>
