<?php
session_start();
include('server.php');

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION["User_ID"])) {
    header("Location: login_db.php");
    exit();
}

// ดึงข้อมูลชื่อผู้ใช้จากฐานข้อมูล
$User_ID = $_SESSION['User_ID'];
$sql = "SELECT Username FROM users WHERE User_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $User_ID);
$stmt->execute();
$stmt->bind_result($Username);
$stmt->fetch();

// ปิด Connection
$stmt->close();
$conn->close();

// ตรวจสอบว่าค่าถูกต้องหรือไม่
if (!$Username) {
    $Username = "Guest"; // กำหนดค่าเริ่มต้นหากไม่พบข้อมูล
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonnanashop</title>

    <link rel="stylesheet" href="indexcss.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <nav>
        <div class="nav-container">
            <a href="index.html">
                <img src="logo_bonnana.png" class="logonav">                   
            </a>
            
            <div class="nav-profile" >
                <p class="nav-profile-name">Bearbug</p>
                <div onclick="openCart()"  style="cursor: pointer;" class="nav-profile-cart">
                    <i class="fas fa-cart-plus"></i>
                    <div id="cartcount" class="cartcount" style="display: none;">
                        0
                </div>
            </div>
        
                    <div class="nav__action__btn">
                        <button class="btn">
                        <div class="nav-right">
                        <!-- Profile Dropdown -->
                        <div class="profile-dropdown">
                            <span><i class="ri-user-line"></i> Account</span>
                            <div class="profile-dropdown-content">
                                <div class="role">
                                <a href="#" class="active">User : <?php echo htmlspecialchars($Username); ?></a>
                                </div>
                                <a href="example.html">Edit Profile</a>
                                <a href="register&login.html">Logout</a>
                            </div>
                        </div>
                        </button>
                    </div>
            

            
        </div>
    </nav>

<div class="container">
    <div class="sidebar">
        <input onkeyup="searchSomething(this)" id="txt_search" type="text" placeholder="Search something...">
            <a onclick="searchProduct('all', this)" class="sidebar-items active">All</a>
            <a onclick="searchProduct('cake-size m', this)" class="sidebar-items">Cake-size M</a>
            <a onclick="searchProduct('cake-size l', this)" class="sidebar-items">Cake-size L</a>
        </div>
        <div id="productlist" class="product"></div>
    </div>
        
    </div>
</div>

<div  id="modalDesc" class="modal" style="display: none;">
    <div onclick="closeModal()"  class="modal-bg"></div>
    <div class="modal-page">
        <h2>Detail</h2>
        <br>
        <div class="modaldesc-content">
            <img id="mdd-img" class="modaldesc-img" src="https://down-th.img.susercontent.com/file/th-11134207-7rasf-m5ol6ne6hdbq11" alt="">
            <div class="modaldesc-detail">
                <p id="mdd-name" style="font-size: 1.5vw;">Product name</p>
                <p id="mdd-price" style="font-size: 1.2vw;">500 บาท</p>
                <br>
                <p id="mdd-desc" style="color: #adadad;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro ex iure voluptate. Molestiae consequatur, ullam, deserunt ducimus fuga rerum maiores, exercitationem reiciendis repellat sint mollitia. Est voluptatibus unde illum quaerat nulla. Quisquam aut ut saepe mollitia asperiores alias veniam officiis sed quos repudiandae nesciunt reiciendis, accusantium veritatis voluptate tempora? Porro!</p>
                <br>
                <!-- เพิ่มการแสดงจำนวนสินค้า -->
                <p id="mdd-quantity" style="font-size: 1.2vw; color: #333;">In stock: 10</p>
                <br>
                <div class="btn-control">
                    <button onclick="closeModal()" class="btn">
                        Close
                    </button>
                    <button onclick="addtocart()" class="btn btn-buy">
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
        
    </div>
</div>

<!-- Modal สำหรับแสดงตะกร้า -->
<div id="modalCart" class="modal" style="display: none;">
    <div onclick="closeModal()" class="modal-bg"></div>
    <div class="modal-page">
        <h2>My cart</h2>
        <br>
        <div id="mycart" class="cartlist"></div>
        <div class="btn-control">
            <button onclick="closeModal()" class="btn">Cancel</button>
            <button onclick="showSummary()" class="btn btn-buy">Buy</button>
        </div>
    </div>
</div>

<!-- Modal สำหรับแสดงหน้าสรุป -->
<div id="summaryModal" class="modal" style="display: none;">
    <div onclick="closeSummaryModal()" class="modal-bg"></div>
    <div class="modal-page">
        <h2>Order Summary</h2>
        <br>
        <div id="orderSummary" class="cartlist"></div>
        <p id="totalAmount" style="font-size: 1.5vw;">Total: 0 บาท</p>
        <div class="btn-control">
            <button onclick="showPayment()" class="btn btn-pay">Pay Now</button>
        </div>
    </div>
</div>


<div id="paymentModal" class="modal" style="display: none;">
    <div onclick="closePaymentModal()" class="modal-bg"></div>
    <div class="modal-page">
        <h2>Payment</h2>
        <br>
        <div>
            <p>Please enter your payment details below:</p>
            <!-- ตัวอย่างฟอร์มชำระเงิน -->
            <label for="cardNumber">Card Number:</label>
            <input type="text" id="cardNumber" placeholder="Enter card number"><br>
            <label for="expirationDate">Expiration Date:</label>
            <input type="text" id="expirationDate" placeholder="MM/YY"><br>
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" placeholder="Enter CVV"><br>
        </div>
        <div class="btn-control">
            <button onclick="processPayment()" class="btn btn-confirm-payment">Confirm Payment</button>
            <button onclick="closePaymentModal()" class="btn btn-cancel-payment">Cancel</button>
        </div>
    </div>
</div>


   


</body>
</html>