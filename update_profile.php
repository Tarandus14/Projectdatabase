<?php
include('server.php');

session_start();
include('server.php');

if (!isset($_SESSION['User_ID'])) {
    header("Location: register&login.html");
    exit();
}

$User_ID = $_SESSION['User_ID'];
$sql = "SELECT Username, Email, Name_Custumer FROM user WHERE User_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $User_ID);
$stmt->execute();
$stmt->bind_result($Username, $Email, $Name_Custumer);
$stmt->fetch();
$stmt->close();

// ดึงเบอร์โทรศัพท์จากตาราง user_phone
$sql_phone = "SELECT Phone_Number FROM user_phone WHERE User_ID = ?";
$stmt_phone = $conn->prepare($sql_phone);
$stmt_phone->bind_param("i", $User_ID);
$stmt_phone->execute();
$stmt_phone->bind_result($Phone_Number);
$stmt_phone->fetch();
$stmt_phone->close();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $User_ID = $_POST['User_ID'];
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Name_Custumer = $_POST['Name_Custumer'];
    $Phone_Number = $_POST['Phone_Number'];
    $Password = $_POST['Password'];

    // ตรวจสอบว่ามีการเปลี่ยนรหัสผ่านหรือไม่
    if (!empty($Password)) {
        $hashed_password = password_hash($Password, PASSWORD_BCRYPT);
        $sql = "UPDATE user SET Username = ?, Email = ?, Name_Custumer = ?, Password = ? WHERE User_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $Username, $Email, $Name_Custumer, $hashed_password, $User_ID);
    } else {
        $sql = "UPDATE user SET Username = ?, Email = ?, Name_Custumer = ? WHERE User_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $Username, $Email, $Name_Custumer, $User_ID);
    }

    $sql_check = "SELECT COUNT(*) FROM user_phone WHERE User_ID = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("i", $User_ID);
    $stmt_check->execute();
    $stmt_check->bind_result($count);
    $stmt_check->fetch();
    $stmt_check->close();

if ($count == 0) {
    // ถ้าไม่มี User_ID ใน user_phone ให้ INSERT ใหม่
    $sql_phone = "INSERT INTO user_phone (User_ID, Phone_Number) VALUES (?, ?)";
} else {
    // ถ้ามีอยู่แล้ว ให้ UPDATE
    $sql_phone = "UPDATE user_phone SET Phone_Number = ? WHERE User_ID = ?";
}


    if ($stmt->execute()) {
        // ใช้ INSERT INTO ... ON DUPLICATE KEY UPDATE เพื่อให้แน่ใจว่า User_ID มีอยู่ใน user_phone
        $sql_phone = "INSERT INTO user_phone (User_ID, Phone_Number) VALUES (?, ?) 
                      ON DUPLICATE KEY UPDATE Phone_Number = VALUES(Phone_Number)";
        
        $stmt_phone = $conn->prepare($sql_phone);
        if ($stmt_phone) {
            $stmt_phone->bind_param("is", $User_ID, $Phone_Number);
            $stmt_phone->execute();
            $stmt_phone->close();
        } else {
            echo "Error preparing phone update: " . $conn->error;
        }

        header('location:profile.php');
        exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }


    $stmt->close();
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonnanashop</title>

    <link rel="stylesheet" href="styleprofile.css" >
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <nav>
        <div class="nav-container">
            <a href="index.php">
                <img src="logo_bonnana.png" class="logonav">                  
            </a>           
    </nav>


    <div class="container">
        <h1>User Profile</h1>
        <form action="update_profile.php" method="POST">
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" id="Email" name="Email" value="<?php echo htmlspecialchars($Email); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" id="Username" name="Username" value="<?php echo htmlspecialchars($Username); ?>">
        </div>
        <div class="form-group">
            <label for="Name_Custumer">Name</label>
            <input type="text" id="Name_Custumer" name="Name_Custumer" value="<?php echo htmlspecialchars($Name_Custumer); ?>">
        </div>
        <div class="form-group">
            <label for="Phone_Number">Phone</label>
            <input type="text" id="Phone_Number" name="Phone_Number" value="<?php echo htmlspecialchars($Phone_Number); ?>">
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" id="Password" name="Password">
        </div>
            <input type="submit" value="Update Profile" >
        </form>
    </div>
</body>
</html>