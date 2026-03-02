<?php
include("db.php");

$sql = "SELECT * FROM notebook WHERE 1";

$map = [
    "type" => "IN",
    "brand" => "IN",
    "memory" => "LIKE",
    "processor" => "LIKE",
    "video_graphics" => "LIKE",
    "storage" => "LIKE"
];

foreach ($map as $f => $m) {
    if (!empty($_GET[$f])) {
        $v = array_map([$conn,'real_escape_string'], $_GET[$f]);

        $sql .= $m == "IN"
            ? " AND $f IN ('" . implode("','",$v) . "')"
            : " AND (" . implode(" OR ", array_map(fn($x)=>"$f LIKE '%$x%'", $v)) . ")";
    }
}

$sql .= " AND price <= " . (int)($_GET['max_price'] ?? 300000);

if (!empty($_GET['sort']))
    $sql .= $_GET['sort']=="asc"
        ? " ORDER BY price ASC"
        : " ORDER BY price DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>OGGY</title>

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



    <div style="display:flex; gap:20px; margin:20px 80px;">

        <!-- ซ้าย: Filter -->
        <div style="
            width:20%;
            border:1px solid #ccc;
            padding:20px;
            border-radius:10px;
            background:#f9f9f9;
            height:fit-content;
        ">

            <h2 style="margin-top:0;">ค้นหา</h2>

            <form method="GET" id="filterForm">

                <label><b>TYPE</b></label><br>

                <div style="color:#162456; font-size:15px;">
                    <label>
                        <input type="checkbox" name="type[]" value="เกมมิ่ง"
                        <?php if(isset($_GET['type']) && in_array("เกมมิ่ง", $_GET['type'])) echo "checked"; ?>>
                        เกมมิ่ง
                    </label><br>

                    <label>
                        <input type="checkbox" name="type[]" value="ทำงาน"
                        <?php if(isset($_GET['type']) && in_array("ทำงาน", $_GET['type'])) echo "checked"; ?>>
                        ทำงาน
                    </label><br>
                </div>

                <label><b>Brand</b></label><br>

                <div style="color:#162456; font-size:15px;">
                    <label>
                        <input type="checkbox" name="brand[]" value="ASUS"
                        <?php if(isset($_GET['brand']) && in_array("ASUS", $_GET['brand'])) echo "checked"; ?>>
                        ASUS
                    </label><br>

                    <label>
                        <input type="checkbox" name="brand[]" value="HP"
                        <?php if(isset($_GET['brand']) && in_array("HP", $_GET['brand'])) echo "checked"; ?>>
                        HP
                    </label><br>

                    <label>
                        <input type="checkbox" name="brand[]" value="Acer"
                        <?php if(isset($_GET['brand']) && in_array("Acer", $_GET['brand'])) echo "checked"; ?>>
                        Acer
                    </label><br>

                    <label>
                        <input type="checkbox" name="brand[]" value="MSI"
                        <?php if(isset($_GET['brand']) && in_array("MSI", $_GET['brand'])) echo "checked"; ?>>
                        MSI
                    </label><br>

                    <label>
                        <input type="checkbox" name="brand[]" value="Lenovo"
                        <?php if(isset($_GET['brand']) && in_array("Lenovo", $_GET['brand'])) echo "checked"; ?>>
                        Lenovo
                    </label><br>
                </div>

                <label><b>CPU</b></label><br>

                <div style="color:#162456; font-size:15px;">
                    <label>
                        <input type="checkbox" name="processor[]" value="Intel"
                        <?php if(isset($_GET['processor']) && in_array("Intel", $_GET['processor'])) echo "checked"; ?>>
                        Intel
                    </label><br>

                    <label>
                        <input type="checkbox" name="processor[]" value="AMD"
                        <?php if(isset($_GET['processor']) && in_array("AMD", $_GET['processor'])) echo "checked"; ?>>
                        AMD
                    </label>
                </div>
                
                    <label><b>GPU</b></label><br>

                    <div style="color:#162456; font-size:15px;">
                        <label>
                            <input type="checkbox" name="video_graphics[]" value="NVIDIA"
                            <?php if(isset($_GET['video_graphics']) && in_array("NVIDIA", $_GET['video_graphics'])) echo "checked"; ?>>
                            NVIDIA
                        </label><br>

                        <label>
                            <input type="checkbox" name="video_graphics[]" value="AMD"
                            <?php if(isset($_GET['video_graphics']) && in_array("AMD", $_GET['video_graphics'])) echo "checked"; ?>>
                            AMD
                        </label><br>

                        <label>
                            <input type="checkbox" name="video_graphics[]" value="Intel"
                            <?php if(isset($_GET['video_graphics']) && in_array("Intel", $_GET['video_graphics'])) echo "checked"; ?>>
                            Intel
                        </label>
                    </div>

                <label><b>RAM</b></label><br>

                <div style="color:#162456; font-size:15px;">
                    <label>
                        <input type="checkbox" name="memory[]" value="8"
                        <?php if(isset($_GET['memory']) && in_array("8", $_GET['memory'])) echo "checked"; ?>>
                        8GB
                    </label><br>

                    <label>
                        <input type="checkbox" name="memory[]" value="16"
                        <?php if(isset($_GET['memory']) && in_array("16", $_GET['memory'])) echo "checked"; ?>>
                        16GB
                    </label><br>

                    <label>
                        <input type="checkbox" name="memory[]" value="32"
                        <?php if(isset($_GET['memory']) && in_array("32", $_GET['memory'])) echo "checked"; ?>>
                        32GB
                    </label><br>
                </div>

                <label><b>Storage</b></label><br>

                <div style="color:#162456; font-size:15px;">
                    <label>
                        <input type="checkbox" name="storage[]" value="512"
                        <?php if(isset($_GET['storage']) && in_array("512", $_GET['storage'])) echo "checked"; ?>>
                        512GB
                    </label><br>

                    <label>
                        <input type="checkbox" name="storage[]" value="1 TB"
                        <?php if(isset($_GET['storage']) && in_array("1 TB", $_GET['storage'])) echo "checked"; ?>>
                        1TB
                    </label><br>

                        <input type="checkbox" name="storage[]" value="2 TB"
                        <?php if(isset($_GET['storage']) && in_array("2 TB", $_GET['storage'])) echo "checked"; ?>>
                        2TB
                    </label>
                </div>

                <label><b>ราคาสูงสุด</b></label>

                <div style="color:#162456; font-size:1px; width:100%; margin-top:5px;">
                    <input type="range" 
                        name="max_price"
                        min="10000"
                        max="300000"
                        step="100"
                        value="<?php echo $_GET['max_price'] ?? 300000; ?>"
                        oninput="priceOutput.value = this.value"
                        style="width:100%;">

                    <br>
                    <input type="text" 
                        id="priceOutput" 
                        value="<?php echo $_GET['max_price'] ?? 300000; ?>" 
                        readonly 
                        style="width:100%; padding:5px; margin-top:5px;">
                </div>

    <br>

                <label><b>เรียงตาม</b></label>

                <div style="color:#162456; font-size:1px; width:100%; margin-top:5px;">
                    <select name="sort" style="width:100%; padding:6px; margin-bottom:15px;">
                        <option value="">ค่าเริ่มต้น</option>
                        <option value="asc" <?php if(($_GET['sort'] ?? '')=="asc") echo "selected"; ?>>
                            ราคาน้อย → มาก
                        </option>
                        <option value="desc" <?php if(($_GET['sort'] ?? '')=="desc") echo "selected"; ?>>
                            ราคามาก → น้อย
                        </option>
                    </select>
                </div>


                <button type="button" onclick="resetFilters()" style="
                    width:100%;
                    padding:8px;
                    background:#162456;
                    color:white;
                    border:none;
                    border-radius:5px;
                    cursor:pointer;
                    margin:20px 2px 1px 2px;
                ">
                    รีเซ็ตค่า
                </button>

                <script>
                function resetFilters() {
                    window.location.href = window.location.pathname;
                }
                </script>

        </form>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("filterForm");

            // checkbox ทุกตัว
            document.querySelectorAll('#filterForm input[type="checkbox"]').forEach(el => {
                el.addEventListener("change", function() {
                    form.submit();
                });
            });

            // range ราคา
            const priceRange = document.querySelector('input[name="max_price"]');
            priceRange.addEventListener("change", function() {
                form.submit();
            });

            // sort
            const sortSelect = document.querySelector('select[name="sort"]');
            sortSelect.addEventListener("change", function() {
                form.submit();
            });
        });
        </script>

    </div>

        <!-- ขวา: แสดงสินค้า -->
        <div style="width:80%; border:1px solid #ccc; background:#f9f9f9; padding:20px; ">

            <h2>รายการโน๊ตบุ๊ค</h2>

    <div style="display:flex; flex-wrap:wrap; gap:15px;">

        <?php
        while($row = $result->fetch_assoc()){
        ?>

            <div style="width:23.5%; border:1px solid #ccc;padding:15px; margin:5px 2px 8px 2px; display:flex; flex-direction:column;">

                <div>
                    <a href="detail.php?id=<?php echo $row['id']; ?>">
                        <img src="uploads/<?php echo $row['image']; ?>"
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
        </div>
    </div>
</body>
</html>