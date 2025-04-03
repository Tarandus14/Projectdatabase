<?php 
    session_start();
    include('server.php');
    
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT); 

    // ตรวจสอบว่าอีเมลนี้มีอยู่ในระบบหรือยัง
    $checkEmail = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $checkEmail->bind_param("s", $Email);
    $checkEmail->execute();
    $result = $checkEmail->get_result();

    $sql = "INSERT INTO user (User_ID, Username, Name_Custumer, Password, Email) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $User_ID, $Username, $Name_Custumer, $Password, $Email);

    if ($stmt->execute()) 
        // ดึง User_ID ล่าสุด
        $User_ID = $conn->insert_id;

        // เพิ่มข้อมูลในตาราง user_phone
        $sql_phone = "INSERT INTO user_phone (User_ID, Phone_Number) VALUES (?, ?)";
        $stmt_phone = $conn->prepare($sql_phone);
        $stmt_phone->bind_param("is", $User_ID, $Phone_Number);
        $stmt_phone->execute();
        $stmt_phone->close();


    if ($result->num_rows > 0) {
        // ถ้าอีเมลมีอยู่แล้ว
        echo "<script>
                alert('อีเมลนี้มีอยู่ในระบบแล้ว กรุณาใช้อีเมลอื่น');
                window.location.href = 'register&login.html'; // เปลี่ยนเส้นทางกลับไปที่หน้าลงทะเบียน
            </script>";
        exit();
    }
    
    if ($stmt->execute()) {
        // ลงทะเบียนสำเร็จ → เปลี่ยนเส้นทางไป index.html
        echo "<script>
                alert('ลงทะเบียนสำเร็จ!');
                window.location.href = 'index.php';
            </script>";
    } else {
        echo "เกิดข้อผิดพลาด: " . $stmt->error;
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $stmt->close();
    $conn->close();
    
    
?>