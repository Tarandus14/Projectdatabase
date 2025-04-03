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
    <link rel="stylesheet" href="../css_use/about_page_style.css" />
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

        <section class="about">
            <div class="section__container about__container">
                <div class="about__image about__image-2" id="about">
                <img src="../assets/logo2.png" alt="about" />
                </div>
                <div class="about__content about__content-1">
                    <h3 class="section__subheader">About Us</h3>
                    <h2 class="section__header">เพราะสุขภาพจิตสำคัญ</h2>
                    <p>
                    เราเชื่อว่าความสุขไม่ได้ขึ้นอยู่กับอายุ แต่เป็นผลลัพธ์ของสุขภาพจิตที่ดีและการใช้ชีวิตที่เต็มไปด้วยความหมาย นี่จึงเป็นที่มาของการก่อตั้งองค์กรของเรา ที่มุ่งเน้นการส่งเสริมสุขภาพจิตผู้สูงอายุผ่านกิจกรรมที่หลากหลาย ทั้งการสร้างความสนุก 
                    การเรียนรู้ และการสร้างความสัมพันธ์ที่ดีในชุมชน เรามีทีมงานที่เปี่ยมด้วยความรักและความใส่ใจ พร้อมสร้างพื้นที่ที่เต็มไปด้วยความอบอุ่นและปลอดภัย เพื่อให้ผู้สูงอายุสามารถค้นพบความสุข ความมั่นใจ และแรงบันดาลใจในทุกๆ วัน เพราะเราเชื่อว่าวัยเกษียณไม่ใช่จุดสิ้นสุด แต่คือช่วงเวลาที่ดีที่สุดในการเติมเต็มชีวิต
                    </p>
                </div>
                <div class="about__content about__content-1">
                    <h3 class="section__subheader">History</h3>
                    <h2 class="section__header">ร่วมสร้างความเปลี่ยนแปลงเพื่อผู้สูงวัย: นี่คือเรื่องราวของเรา</h2>
                    <p>
                    เราเริ่มต้นจากความตั้งใจที่จะเห็นผู้สูงอายุในสังคมไทยมีคุณภาพชีวิตที่ดีและมีสุขภาพจิตที่แข็งแรง องค์กรของเราก่อตั้งขึ้นในปี 2025 โดยกลุ่มผู้เชี่ยวชาญด้านสุขภาพจิต ศิลปะ และกิจกรรมชุมชน เราได้นำประสบการณ์และความเข้าใจในความต้องการของผู้สูงอายุมาผสมผสานเพื่อพัฒนากิจกรรมที่หลากหลายและเหมาะสม
                    เป้าหมายของเราคือการเป็นพื้นที่ที่ผู้สูงอายุสามารถเติมเต็มความสุข เรียนรู้สิ่งใหม่ๆ และสร้างความสัมพันธ์ที่ดีในสังคม ไม่ว่าจะเป็นกิจกรรมศิลปะ ดนตรี งานฝีมือ หรือการให้คำปรึกษาสุขภาพจิต เราพร้อมมอบบริการที่เต็มเปี่ยมด้วยคุณภาพและความจริงใจ เพื่อให้ทุกคนได้สัมผัสถึงความสุขในทุกๆ วัน
                    </p>
                </div>
            </div>
        </section>

        
        

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