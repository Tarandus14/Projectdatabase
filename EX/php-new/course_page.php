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
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../css_use/course_page_style.css" />
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
                Course
            </h1>
            <div class="scroll__btn">
                <a href="#tranding">
                เลื่อนลง
                <span><i class="ri-arrow-down-line"></i></span>
                </a>
            </div>
            </div>
        </div>
        </header>

        <section id="tranding">
            <div class="container">
                <h1 class="text-center section-heading">Course</h1>
            </div>
            <div class="container">
                <div class="swiper tranding-slider">
                <div class="swiper-wrapper">
                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                    <div class="tranding-slide-img">
                        <img src="../assets/9.png" alt="Tranding">
                    </div>
                    <div class="tranding-slide-content">
                        <h1 class="food-price">ฟรี</h1>
                        <div class="tranding-slide-content-bottom">
                        
                        <h3 class="food-rating">
                            <span>4.5</span>
                            <div class="rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            </div>
                        </h3>
                        </div>
                    </div>
                    </div>
                    <!-- Slide-end -->
                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                    <div class="tranding-slide-img">
                        <img src="../assets/10.png" alt="Tranding">
                    </div>
                    <div class="tranding-slide-content">
                        <h1 class="food-price">300-600฿</h1>
                        <div class="tranding-slide-content-bottom">
                        
                        <h3 class="food-rating">
                            <span>4.5</span>
                            <div class="rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            </div>
                        </h3>
                        </div>
                    </div>
                    </div>
                    <!-- Slide-end -->
                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                    <div class="tranding-slide-img">
                        <img src="../assets/11.png" alt="Tranding">
                    </div>
                    <div class="tranding-slide-content">
                        <h1 class="food-price">ฟรี</h1>
                        <div class="tranding-slide-content-bottom">
                        
                        <h3 class="food-rating">
                            <span>4.5</span>
                            <div class="rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            </div>
                        </h3>
                        </div>
                    </div>
                    </div>
                    <!-- Slide-end -->
                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                    <div class="tranding-slide-img">
                        <img src="../assets/12.png" alt="Tranding">
                    </div>
                    <div class="tranding-slide-content">
                        <h1 class="food-price">250-400฿</h1>
                        <div class="tranding-slide-content-bottom">
                        
                        <h3 class="food-rating">
                            <span>4.5</span>
                            <div class="rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            </div>
                        </h3>
                        </div>
                    </div>
                    </div>
                    <!-- Slide-end -->
                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                    <div class="tranding-slide-img">
                        <img src="../assets/13.png" alt="Tranding">
                    </div>
                    <div class="tranding-slide-content">
                        <h1 class="food-price">300-500฿</h1>
                        <div class="tranding-slide-content-bottom">
                        
                        <h3 class="food-rating">
                            <span>4.5</span>
                            <div class="rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            </div>
                        </h3>
                        </div>
                    </div>
                    </div>
                    <!-- Slide-end -->
                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                    <div class="tranding-slide-img">
                        <img src="../assets/14.png" alt="Tranding">
                    </div>
                    <div class="tranding-slide-content">
                        <h1 class="food-price">300-500฿</h1>
                        <div class="tranding-slide-content-bottom">
                        <h3 class="food-rating">
                            <span>4.5</span>
                            <div class="rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            </div>
                        </h3>
                        </div>
                    </div>
                    </div>
                    <!-- Slide-end -->
                    <!-- Slide-start -->
                    <div class="swiper-slide tranding-slide">
                    <div class="tranding-slide-img">
                        <img src="../assets/15.png" alt="Tranding">
                    </div>
                    <div class="tranding-slide-content">
                        <h1 class="food-price">300-500 ฿</h1>
                        <div class="tranding-slide-content-bottom">
                            
                            <h3 class="food-rating">
                                <span>4.5</span>
                                <div class="rating">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                </div>
                            </h3>
                        </div>
                    </div>
                    </div>
                    <!-- Slide-end -->
                </div>

                <div class="tranding-slider-control">
                    <div class="swiper-button-prev slider-arrow">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                    </div>
                    <div class="swiper-button-next slider-arrow">
                    <ion-icon name="arrow-forward-outline"></ion-icon>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                </div>
            </div>
        </section>

        <section class="product"> 
            <h2 class="product-category">Membership</h2>
            <button class="pre-btn"><img src="../assets/arrow.png" alt=""></button>
            <button class="nxt-btn"><img src="../assets/arrow.png" alt=""></button>
            <div class="product-container">
                <div class="product-card">
                    <div class="product-image">
                        <img src="../assets/16.png" class="product-thumb" alt="">
                        <button class="card-btn">เพิ่งลงตะกร้า</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">แพ็กเกจรายเดือน</h2>
                        <p class="product-short-description">เลือกกิจกรรมได้ 3-6 ครั้ง</p>
                        <span class="price">3,500฿</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="../assets/17.png" class="product-thumb" alt="">
                        <button class="card-btn">เพิ่งลงตะกร้า</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">แพ็กเกจรายปี</h2>
                        <p class="product-short-description">เลือกได้ทุกกิจกรรม</p>
                        <span class="price">8,000฿</span>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <section class="product"> 
            <h2 class="product-category">best Course</h2>
            <button class="pre-btn"><img src="../assets/arrow.png" alt=""></button>
            <button class="nxt-btn"><img src="../assets/arrow.png" alt=""></button>
            <div class="product-container">
                <div class="product-card">
                    <div class="product-image">
                        <img src="../assets/9.png" class="product-thumb" alt="">
                        <button class="card-btn">เพิ่งลงตะกร้า</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">สุขใจไม่เหงา</h2>
                        <p class="product-short-description">บริการให้คำปรึกษาใจถึงใจ</p>
                        <span class="price">ฟรี</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="../assets/10.png" class="product-thumb" alt="">
                        <button class="card-btn">เพิ่งลงตะกร้า</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">ร้องเพลงวัยหวาน</h2>
                        <p class="product-short-description"> ร้องเพลงยุคทองของผู้สูงอายุ</p>
                        <span class="price">300-600฿</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        
                        <img src="../assets/11.png" class="product-thumb" alt="">
                        <button class="card-btn">เพิ่งลงตะกร้า</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">ย้อนวันวานกับเรื่องเล่า</h2>
                        <p class="product-short-description">ให้ผู้สูงอายุแบ่งปันเรื่องราวในอดีต </p>
                        <span class="price">ฟรี</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        
                        <img src="../assets/12.png" class="product-thumb" alt="">
                        <button class="card-btn">เพิ่งลงตะกร้า</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">สุขภาพดี ไม่มีอายุ</h2>
                        <p class="product-short-description">สอนโยคะเบื้องต้น การยืดเส้น หรือการเต้นเบาๆ</p>
                        <span class="price">250-400฿</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        
                        <img src="../assets/13.png" class="product-thumb" alt="">
                        <button class="card-btn">เพิ่งลงตะกร้า</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">ระบายสีตามธีมธรรมชาติ</h2>
                        <p class="product-short-description">ให้ผู้สูงอายุวาดภาพ ระบายสี หรือสร้างงานประดิษฐ์เพื่อแสดงความรู้สึก</p>
                        <span class="price">300-500฿</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        
                        <img src="../assets/14.png" class="product-thumb" alt="">
                        <button class="card-btn">เพิ่งลงตะกร้า</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">กิจกรรมธรรมชาติบำบัด</h2>
                        <p class="product-short-description">การเดินชมธรรมชาติในสวน หรือการนั่งสมาธิท่ามกลางความสงบของธรรมชาติ เพื่อเติมพลังจิตใจ</p>
                        <span class="price">300-500฿</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        
                        <img src="../assets/15.png" class="product-thumb" alt="">
                        <button class="card-btn">เพิ่งลงตะกร้า</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">คลาสงานฝีมือของวัยเก๋า</h2>
                        <p class="product-short-description">การถักไหมพรม ทำพวงกุญแจ ทำของตกแต่งบ้าน</p>
                        <span class="price">300-500฿</span>
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

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <script src="../js/script_course_1.js"></script>
        <script src="../js/script_course_2.js"></script>
        <script src="https://unpkg.com/scrollreveal"></script>
        <script src="../js/main.js"></script>
</body>
</html>