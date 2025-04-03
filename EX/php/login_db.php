<?php
    session_start();
    include('./server.php');

    $errors = array();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $sql = "SELECT id, password FROM users WHERE email = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();
    
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            echo "Login successful!";
            header('location: ../home_page_02.php');
        } else {
            echo "<script>
                    alert('Invalid username or password.');
                    window.location.href = '../html/login.html';
                </script>";
                
        }
        
        $stmt->close();
        $conn->close();
    }

?>
