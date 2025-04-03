<?php
session_start();
include('./server.php');

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
    <link rel="stylesheet" href="../css_use/style.css">
</head>
<body>
  <header>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>
    <a href="#" class="Logo">wellness<span>.</span></a>
    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#about">about</a>
        <a href="#course">course</a>
        <a href="#contact">contact</a>
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
                        <a href="../html/register&login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>
  </header>
<!-- header section end -->


<!-- home section starts -->
<section class="home" id="home">

<div class="content">
  <h3>Thewellness</h3>
  <span>Golden Time</span>
  <p>ศูนย์ส่งเสริมสุขภาพผู้สูงอายุในหลายด้านและมีกิจกรรมอีกมากหมาย</p>
  <a href="#" class="btn">เข้าร่วมกิจกรรม</a>
</div>
</section>
<!-- home section end -->


<!-- about section starts -->
<section class="about" id="about">
  <h1 class="heading"> <span>about</span> us </h1>
  <div class="row">
    <div class="images-container" >
      <img src="../images/หน้าabout.jpeg" alt="" >
    </div>

    <div class="content">
      <h2>ทำไมต้องเลือกเรา ?</h2>
      <p>เรามีกิจกรรมที่ตอบโจทย์ทุกความสนใจ ไม่ว่าจะเป็นการออกกำลังกาย, กิจกรรมดนตรี, บอร์ดเกม, คลาสเรียนรู้เทคโนโลยี หรือการสร้างสรรค์งานฝีมือ เพื่อให้ผู้สูงอายุได้สนุกและเรียนรู้สิ่งใหม่</p>
      <p>ศูนย์กิจกรรมของเราเป็นจุดเชื่อมต่อผู้สูงอายุที่มีความสนใจเหมือนกัน ช่วยสร้างมิตรภาพใหม่และความสัมพันธ์ที่ดีในชุมชน</p>
      <p>เราสร้างสภาพแวดล้อมที่เหมาะสมสำหรับผู้สูงอายุ ด้วยการดูแลอย่างใส่ใจจากทีมงานมืออาชีพ</p>
      <a href="#course" class="btn">เข้าร่วมกิจกรรม</a>

    </div>
  </div>
</section>

<!-- about section end  -->

<!-- course section start  -->
<section class="course" id="course">
  <h1 class="heading">November <span>course</span></h1>
  <div class="card-container">
  <div class="card">
        <img src="../images/1.png" alt="Image 1" >
        <button class="button_coures"><a href="./coures1.php">เต้นแอโรบิค</a></button>
    </div>
    <div class="card">
        <img src="../images/2.png" alt="Image 2">
        <button class="button_coures"><a href="./coures2.php">เพ้นท์แก้วเซรามิค</a></button>
    </div>
    <div class="card">
        <img src="../images/3.png" alt="Image 3">
        <button class="button_coures"><a href="./coures3.php">บอร์ดเกมรถไฟ</a></button>
    </div>
    <div class="card">
        <img src="../images/5.png" alt="Image 4">
        <button class="button_coures"><a href="./coures4.php">จัดทริปง่ายๆ ด้วย google Map</a></button>
    </div>
    <div class="card">
        <img src="../images/6.png" alt="Image 5">
        <button class="button_coures"><a href="./coures5.php">สอนช้อปปิ้งออนไลน์ด้วยแอป Shopee</a></button>
    </div>
    <div class="card">
        <img src="../images/7.png" alt="Image 6">
        <button class="button_coures"><a href="./coures6.php">คลาสเรียนอูคูเลเล่</a></button>
    </div>
  </div>  
</section>
<!-- cost section end  -->

<!-- concet section strats  -->
<section class="contact" id="contact">
  <h1 class="heading">contact <span>us</span></h1>
<div class="row">
  <form action="">
    <input type="text" placeholder="name" class="box">
    <input type="email" placeholder="email" class="box">
    <input type="number" placeholder="number" class="box">
    <textarea name="" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="send message" class="btn" >
  </form>
  <div class="image">
    <img src="../images/Contact1.jpg" alt="">
  </div>
</div>

</section>
<!-- concet section end  -->

<!-- footer section strats  -->
<section class="footer" >
<div class="box-container11">

  <div class="box">
  <h3>quick links</h3>
    <a href="#home">Home</a>
    <a href="#about">about</a>
    <a href="#course">course</a>
    <a href="#contact">contact</a>
  </div>

  <div class="box">
    <h3>contact info</h3>
    <a href="#">+123-456-7890</a>
    <a href="#">exzmple@gmail.com</a>
    <a href="#">Sakon Nakhon</a>
    <img src="../images/pay.png" alt="" width="50%" >
    <div class="footer-bottom">
      <p>&copy; 2025 บริษัทThe wellness Golden Time. สงวนลิขสิทธิ์.</p>
  </div>
  </div>
</div>


</section>