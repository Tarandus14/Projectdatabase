<?php
session_start();
include('server.php');
$_SESSION['User_ID'] = $User_ID;
$_SESSION['Email'] = $Email;
$_SESSION['Username'] = $Username;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    // เตรียม SQL Query
    $sql = "SELECT User_ID, Email, Password FROM user WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $Email);
    $stmt->execute();
    $stmt->store_result(); // ต้องมีเพื่อใช้ num_rows

    // ตรวจสอบว่าพบผู้ใช้หรือไม่
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($User_ID, $Email, $hashed_password);
        $stmt->fetch();

        // ตรวจสอบรหัสผ่าน
        if (password_verify($Password, $hashed_password)) {
            $_SESSION['User_ID'] = $User_ID;
            $_SESSION['Email'] = $Email;

            // Redirect ไปหน้า index.php
            header("Location: index.php");
            exit();
        } else {
            echo "<script>
                    alert('รหัสผ่านไม่ถูกต้อง');
                    window.location.href = 'register&login.html';
                </script>";
        }
    } else {
        echo "<script>
                alert('ไม่พบบัญชีนี้ในระบบ');
                window.location.href = 'register&login.html';
            </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
