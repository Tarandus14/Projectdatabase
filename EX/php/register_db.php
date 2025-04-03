<?php 
    session_start();
    include('server.php');
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    // ตรวจสอบว่าอีเมลนี้มีอยู่ในระบบหรือยัง
    $checkEmail = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $result = $checkEmail->get_result();

    $sql = "INSERT INTO users (id, username, email, password, status, role, created_at) VALUES (?, ?, ?, ?,'Active','User',NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $id, $username, $email, $password);

    if ($result->num_rows > 0) {
        // ถ้าอีเมลมีอยู่แล้ว
        echo "<script>
                alert('อีเมลนี้มีอยู่ในระบบแล้ว กรุณาใช้อีเมลอื่น');
                window.location.href = '../html/register&login.html'; // เปลี่ยนเส้นทางกลับไปที่หน้าลงทะเบียน
            </script>";
        exit();
    }
    
    if ($stmt->execute()) {
        echo "<script>
                alert('สมัครสมาชิกแล้ว!');
                window.location.href = '../html/register&login.html';
            </script>";
    } else {
        echo "<script>
                alert('เกิดข้อผิดพลาดในการสมัครสมาชิก');
                window.location.href = '../html/register&login.html';
            </script>";
    }
    
    $stmt->close();
    $conn->close();
    

?>