<?php
include("check_admin.php");
include("../db.php");

$id = $_GET['id'] ?? 0;

// ลบรูปภาพก่อน (ถ้ามี)
$stmt = $conn->prepare("SELECT image FROM notebook WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {

    // ลบไฟล์รูปในโฟลเดอร์ uploads
    if (!empty($row['image']) && file_exists("../uploads/" . $row['image'])) {
        unlink("../uploads/" . $row['image']);
    }

    // ลบข้อมูลใน DB
    $delete = $conn->prepare("DELETE FROM notebook WHERE id = ?");
    $delete->bind_param("i", $id);
    $delete->execute();
}

// กลับไปหน้า list
header("Location: list.php");
exit();
?>