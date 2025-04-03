<?php
session_start();
include('server.php');

// Assuming you want to get the username of a specific user, e.g., with id 1
$User_ID = $_SESSION['User_ID'];

$sql = "SELECT u.Email, u.Username, u.Name_Custumer, p.Phone_Number ,u.Password
        FROM user u
        LEFT JOIN user_phone p ON u.User_ID = p.User_ID 
        WHERE u.User_ID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $User_ID);
$stmt->execute();
$stmt->bind_result($Email, $Username, $Name_Custumer, $Phone_Number, $Password);
$stmt->fetch();
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
<body>

<div class="language-selector">
</div>

</body>
</html>

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
<header>

    <div class="navbar">
    <div class="nav-container">
            <a href="index.php">
                <img src="logo_bonnana.png" class="logonav">                   
            </a>

            <div class="nav-right">
                <!-- Profile Dropdown -->
                <div class="profile-dropdown">
                    <div class="fa-regular fa-user"></div>
                    <div class="profile-dropdown-content">
                        <div class="role">
                        <a href="#" class="active">User : <?php echo htmlspecialchars($Username); ?></a>
                        </div>
                        <a href="profile.php">Edit Profile</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
</header>
<!-- header section end -->

<!-- home section starts -->
<section class="home" id="home">
    <div class="content">
        <h3>Profile</h3>
        <h2>User : <?php echo htmlspecialchars($Username); ?></h2>
    </div>
    </section>
    <!-- home section end -->


<!-- Profile Form -->
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
            <label for="Name_Custumer">Full Name</label>
            <input type="text" id="Name_Custumer" name="Name_Custumer" value="<?php echo htmlspecialchars($Name_Custumer); ?>">
        </div>
        <div class="form-group">
            <label for="Phone_Number">Phone</label>
            <input type="text" id="Phone_Number" name="Phone_Number" value="<?php echo htmlspecialchars($Phone_Number); ?>">
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" id="Password" name="Password" value="<?php echo htmlspecialchars($Password); ?>">
        </div>
        <input type="hidden" name="User_ID" value="<?php echo htmlspecialchars($User_ID); ?>">
        <input type="hidden" name="old_password" value="<?php echo htmlspecialchars($Password); ?>">
        <input type="submit" value="Update Profile" >
    </form>
    
</div>
