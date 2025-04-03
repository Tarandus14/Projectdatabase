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
    <link rel="stylesheet" href="../css_use/home_page_02.css" />
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
                    <li><a href="#home">Home</a></li>
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
                                <a href="../assets/profile.php">Edit Profile</a>
                                <a href="../html/register&login.html">Logout</a>
                            </div>
                        </div>
                        </button>
                    </div>
                </div>
            </div>
            
        </nav>
        <div class="section__container header__container" id="home">
            <div class="header__content">
            <h3 class="section__subheader">Harmony Space</h3>
            <h1 class="section__header">
                พื้นที่ส่งเสริมสุขภาพและจิตใจ!
            </h1>
            <div class="scroll__btn">
                <a href="#about">
                เลื่อนลง
                <span><i class="ri-arrow-down-line"></i></span>
                </a>
            </div>
        </div>

        
        
        </header>
        <section class="about">
            <div class="section__container about__container">
                <div class="about__image about__image-2" id="about">
                <img src="../assets/Contact1.jpg" alt="about" />
                </div>
                <div class="about__content about__content-1">
                    <h3 class="section__subheader">About Us</h3>
                    <h2 class="section__header">อยากร่วมเป็นส่วนหนึ่งกับเราไหม?</h2>
                    <p>
                        เรามีกิจกรรมที่ตอบโจทย์ทุกความต้องการ ไม่ว่าจะเป็นด้านสุขภาพ และ ด้านจิตใจ และมีศูนย์กิจกรรมที่เป็นจุดเชื่อมต่อผู้สูงอายุที่มีความสนใจเหมือนกัน ช่วยสร้างมิตรภาพใหม่และความสัมพันธ์ที่ดีในชุมชน
                        มาร่วมกันสร้างสุขภาพที่ดีและคลายความกังวลในบรรยากาศที่อบอุ่น พร้อมกิจกรรมที่ช่วยเสริมสุขภาพกายและใจ เพื่อชีวิตที่สดใสและมีคุณภาพ!!
                    </p>
                    <div class="about__btn">
                        <a href="./about_page.php">
                        ดูเพิ่มเติม
                        <span><i class="ri-arrow-right-line"></i></span>
                        </a>
                    </div>
                </div>
                <div class="about__image about__image-2" id="activity">
                    <div class="destination__grid about__grid">
                        <div class="destination__card">
                            <img src="../assets/aa1.PNG" alt="destination" />
                            
                        </div>
                        <div class="destination__card">
                            <img src="../assets/aa3.JPG" alt="destination" />
                            <div class="card__content">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about__content about__content-2">
                    <h3 class="section__subheader">Activity</h3>
                    <h2 class="section__header">มาร่วมสร้างความสุข และเติมเต็มพลังใจ!</h2>
                    <p> 
                        กิจกรรมของเราถูกออกแบบมาเพื่อส่งเสริมสุขภาพจิตใจของผู้สูงอายุในทุกมิติ ไม่ว่าจะเป็นการผ่อนคลายความเครียด เพิ่มความมั่นใจในตัวเอง หรือสร้างความสัมพันธ์ในชุมชน 
                        เรานำเสนอทั้งกิจกรรมกลุ่มที่อบอุ่นและกิจกรรมออนไลน์ที่สะดวกสบาย เพื่อตอบโจทย์ทุกความต้องการของคุณ ร่วมเดินทางไปสู่ชีวิตที่สมดุลและมีความสุขกับเรา!
                    </p>
                    <div class="about__btn">
                        <a href="./activity_page.php">
                        ดูเพิ่มเติม
                        <span><i class="ri-arrow-right-line"></i></span>
                        </a>
                    </div>
                </div>
                <div class="about__image about__image-2" id="course">
                    <div class="destination__grid about__grid">
                            <img src="../assets/9.png" alt="destination" />
                            <img src="../assets/11.png" alt="destination" />
                    </div>
                </div>
                <div class="about__content about__content-3">
                    <h3 class="section__subheader">Course</h3>
                    <h2 class="section__header">เริ่มต้นการเรียนรู้ครั้งใหม่ที่จะเติมเต็มความสุขและพลังใจให้คุณ!</h2>
                    <p>
                        หลักสูตรของเราถูกออกแบบมาอย่างพิถีพิถันเพื่อตอบโจทย์ความต้องการของผู้สูงอายุ ทั้งในด้านการส่งเสริมสุขภาพจิต พัฒนาทักษะใหม่ๆ 
                        และสร้างความสัมพันธ์ที่ดีในชุมชน ด้วยเนื้อหาที่หลากหลาย เช่น ศิลปะบำบัด โยคะเพื่อสุขภาพ การเล่าเรื่องสร้างแรงบันดาลใจ หรือการเรียนรู้งานฝีมือ 
                        หลักสูตรเหล่านี้ไม่เพียงมอบความรู้ แต่ยังช่วยเติมเต็มความสุขในทุกๆ วันของคุณ ทุกบทเรียนเน้นความสนุกและการเรียนรู้ที่เหมาะสมกับทุกคน ไม่ว่าคุณจะอยู่ที่ไหน เรามีทั้งรูปแบบออนไลน์และออฟไลน์เพื่อความสะดวกของคุณ!
                    </p>
                    <div class="about__btn">
                        <a href="./course_page.php">
                        ดูเพิ่มเติม
                        <span><i class="ri-arrow-right-line"></i></span>
                        </a>
                    </div>
                </div>
                <div class="about__image about__image-2" id="contact">
                    <img src="../assets/tt5.PNG" alt="about" />
                </div>
                <div class="about__content about__content-4">
                    <h3 class="section__subheader">Contact</h3>
                    <h2 class="section__header">พร้อมจะเริ่มต้นเส้นทางแห่งความสุขและสุขภาพจิตที่ดีไปกับเราแล้วหรือยัง?</h2>
                    <p>
                        หากคุณมีคำถาม ข้อสงสัย หรือต้องการข้อมูลเพิ่มเติม ทีมงานของเรายินดีให้คำปรึกษาและดูแลคุณทุกขั้นตอน ติดต่อเราได้ง่ายๆ 
                        ผ่านช่องทางที่สะดวกที่สุดสำหรับคุณ เพราะเราเชื่อว่าการเริ่มต้นที่ดีคือการได้พูดคุยและเข้าใจกัน มาร่วมสร้างความสุขและเชื่อมต่อกับชุมชนที่อบอุ่นไปด้วยกัน!
                    </p>
                    <div class="about__btn">
                        <a href="./contact_page.php">
                        ดูเพิ่มเติม
                        <span><i class="ri-arrow-right-line"></i></span>
                        </a>
                    </div>
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