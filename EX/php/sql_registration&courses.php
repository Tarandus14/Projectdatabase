<?php
session_start();
include('./server.php');

// ตรวจสอบว่ามีการส่งข้อมูล POST เข้ามา
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id']; // ดึง user_id จากฟอร์ม
    $course_id = $_POST['course_id']; // ดึง course_id จากฟอร์ม
    $course_name = $_POST['course_name']; // ดึง course_name จากฟอร์ม

    // ตรวจสอบว่าผู้ใช้มีอยู่ในระบบ
    $sql_user_check = "SELECT id FROM users WHERE id = ?";
    $stmt_user_check = $conn->prepare($sql_user_check);
    $stmt_user_check->bind_param("i", $user_id);
    $stmt_user_check->execute();
    $result_user = $stmt_user_check->get_result();

    if ($result_user->num_rows == 0) {
        echo "<script>
                alert('User ID ไม่ถูกต้องหรือไม่มีในระบบ');
                window.location.href = './index.php';
            </script>";
        exit;
    }

    // รับข้อมูลผู้ใช้และคอร์ส
    $user_id = $_SESSION['user_id']; // ดึงค่า user_id จาก session
    $course_id = rand(1000, 9999); // สุ่ม course_id
    $course_name = isset($_SESSION['course_name']) ? $_SESSION['course_name'] : 'ERROR'; // ดึงค่า course_name จาก session หรือกำหนดค่าเริ่มต้น
    $register_date = date('Y-m-d H:i:s'); // เวลาเวลาที่ลงทะเบียนปัจจุบัน
    $make_payment = 0; // ค่าเริ่มต้นสำหรับ make_payment

    // ตรวจสอบว่ามีคอร์สอยู่ในตาราง courses หรือไม่
    $checkCourse = $conn->prepare("SELECT course_id FROM courses WHERE course_id = ?");
    $checkCourse->bind_param("i", $course_id);
    $checkCourse->execute();
    $result = $checkCourse->get_result();

    if ($result->num_rows === 0) {
        // เพิ่มข้อมูลคอร์สใหม่ในตาราง courses
        $insertCourse = $conn->prepare("INSERT INTO courses (course_id, course_name, date_of_activity, regis_date) VALUES (?, ?, ?, NOW())");
        $activity_date = date('Y-m-d'); // วันที่กิจกรรมในอนาคต (ตัวอย่าง: อีก 7 วัน)
        $insertCourse->bind_param("iss", $course_id, $course_name, $activity_date);
        $insertCourse->execute();
    }

    // เพิ่มข้อมูลลงในตาราง registration
    $insertRegis = $conn->prepare("INSERT INTO registration (user_id, course_id, course_name, register_date, make_payment) VALUES (?, ?, ?, NOW(), ?)");
    $insertRegis->bind_param("iisi", $user_id, $course_id, $course_name, $make_payment);

    if ($insertRegis->execute()) {
        echo "<script>
            alert('ลงทะเบียนสำเร็จ!');
            window.location.href = './index.php';
        </script>";
    } else {
        echo "<script>
            alert('เกิดข้อผิดพลาดในการลงทะเบียน');
            window.location.href = './index.php';
        </script>";
    }

    // ปิดการเชื่อมต่อ
    $checkCourse->close();
    $insertCourse->close();
    $insertRegis->close();
    $conn->close();
}

?>