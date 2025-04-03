<?php
session_start();
include('./server.php');

// Assuming you want to get the username of a specific user, e.g., with id 1
$userId = 1;
$sql = "SELECT email, username, fullname, gender, age, phone, password, activity, role FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($email, $username, $fullname, $gender, $age, $phone , $password ,$activity ,$role);
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The wellness</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css_use/styleprofile.css">
</head>
<body>
<header>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>
    <a href="#" class="Logo">wellness<span>.</span></a>
    <nav class="navbar">
        <a href="Index.php#home" id="home">Home</a>
        <a href="Index.php#about" id="about">about</a>
        <a href="Index.php#course" id="course">course</a>
        <a href="Index.php#concet" id="concet">contact</a>
    </nav>
    <div class="navbar">
            <div class="nav-right">
                <!-- Profile Dropdown -->
                <div class="profile-dropdown">
                    <div class="fa-regular fa-user"></div>
                    <div class="profile-dropdown-content">
                        <div class="role">
                        <a href="#" class="active">User : <?php echo htmlspecialchars($username); ?></a>
                        </div>
                        <a href="./profile.php">Edit Profile</a>
                        <a href="../html/login.html">Logout</a>
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
        <h2>User : <?php echo htmlspecialchars($username); ?></h2>
            <p>ศูนย์ส่งเสริมสุขภาพผู้สูงอายุในหลายด้านและมีกิจกรรมอีกมากหมาย</p>
    </div>
    </section>
    <!-- home section end -->


<!-- Profile Form -->
<div class="container">
    <h1>User Profile</h1>
    <form action="./update_profile.php" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>">
        </div>
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" name="gender">
                <option value="male" selected>Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($password); ?>">
        </div>
        <div class="form-group">
            <label for="activity">Favorite Activity</label>
            <select id="activity" name="activity" required>
                <option value="">Select an Activity</option>
                <option value="Health">Health</option>
                <option value="Entertainment">Entertainment</option>
                <option value="Knowledge">Knowledge</option>
                <input type="hidden" name="id" value="<?php echo $userId; ?>">
            </select>
        </div>
        <input type="submit" value="Update Profile" >
    </form>
    
</div>
