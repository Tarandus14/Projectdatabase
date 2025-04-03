<?php
session_start();
include('../php/server.php');

// Assuming you want to get the username of a specific user, e.g., with id 1
$userId = $_SESSION['user_id'];
$sql = "SELECT username FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
        rel="stylesheet"
    />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../css_use/contact_page_style.css" />
    <title>Web Design Mastery | MNTN</title>
</head>
<body>
        <header class="header" id="home">
        <nav>
            <div class="nav__bar">
                <div class="logo nav__logo">
                    <a href="#">Harmony Space</a>
                </div>
                <ul class="nav__links" id="nav-links">
                    <li><a href="./home_page.php">Home</a></li>
                    <li><a href="./about_page.php">About</a></li>
                    <li><a href="./activity_page.php">Activity</a></li>
                    <li><a href="./course_page.php">Course</a></li>
                    <li><a href="./contact_page.php">Contact</a></li>
                </ul>
                <div class="nav__menu__btn" id="menu-btn">
                    <i class="ri-menu-line"></i>
                </div>
                    <div class="nav__action__btn">
                        <button class="btn">
                        <div class="nav-right">
                        <!-- Profile Dropdown -->
                        <div class="profile-dropdown">
                            <span><i class="ri-user-line"></i> Account</span>
                            <div class="profile-dropdown-content">
                                <div class="role">
                                <a href="#" class="active">User : <?php echo htmlspecialchars($username); ?></a>
                                </div>
                                <a href="./profile.php">Edit Profile</a>
                                <a href="../html/register&login.html">Logout</a>
                            </div>
                        </div>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
        
        
        <div class="wrapper">
            <h1>Our Services</h1>
            <div class="content-box">
                <div class="card">
                    <i class="bx bx-bar-chart-alt bx-md"></i>
                    <h2>บริการด้านการตลาด</h2>

                </div>
                <div class="card">
                    <i class="bx bx-laptop bx-md"></i>
                    <h2>การพัฒนาเว็บไซต์</h2>
                </div>
                <div class="card">
                    <i class='bx bx-user bx-md'></i>

                    <h2> บริการคอลเซ็นเตอร์</h2>
                </div>
                <div class="card">
                    <i class="bx bx-mail-send bx-md"></i>
                    <h2>โซเชียลมีเดีย</h2>
                </div>
                <div class="card">
                    <i class="bx bx-bar-chart-alt bx-md"></i>
                    <h2>
                    ธุรกิจองค์กร</h2>
                </div>
                <div class="card">
                    <i class="bx bx-paint bx-md"></i>
                    <h2>ที่ปรึกษา</h2>
                    
                </div>
            </div>
    </div>

        
        

        <footer class="footer">
        <div class="section__container footer__container">
            <div class="footer__col">
            <div class="logo footer__logo">
                <a href="#">Harmony Space</a>
            </div>
            <p>
                ให้เราได้ดูแลคูณ จากนี้และตลอดไป!
            </p>
            </div>
            <div class="footer__col">
            <h4>More on The Blog</h4>
            <ul class="footer__links">
                <li><a href="#">About HS</a></li>
                <li><a href="#">Contributors & Writers</a></li>
                <li><a href="#">Write For Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
            </div>
            <div class="footer__col">
            <h4>More on Harmony Space</h4>
            <ul class="footer__links">
                <li><a href="#">The Team</a></li>
                <li><a href="#">Jobs</a></li>
                <li><a href="#">Press</a></li>
            </ul>
            </div>
        </div>
        <div class="footer__bar">
            © 2025. This website made by Jirawat.
        </div>
        </footer>

        <script src="https://unpkg.com/scrollreveal"></script>
        <script src="./js/main.js"></script>
</body>
</html>