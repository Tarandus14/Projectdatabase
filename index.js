var product = [
    { id: 1, img: 'https://down-th.img.susercontent.com/file/th-11134207-7r98r-lxhxfwcrrir476', name: 'บอนนาน่า ชีส', price: 150, description:'บอนนาน่า ชีส M ', type: 'cake-size m', quantity: 10 },
    { id: 2, img: 'https://down-th.img.susercontent.com/file/th-11134207-7r98u-lxhxfxv5ebpr43', name: 'บอนนาน่า นูเทลล่าชีส', price: 150, description:'บอนนาน่า นูเทลล่าชีส M ', type: 'cake-size m', quantity: 8 },
    { id: 3, img: 'https://down-th.img.susercontent.com/file/th-11134207-7rasc-m5sw3flqj12ie1', name: 'บอนนาน่า สตรอว์เบอร์รี่ชีส', price: 180, description:'บอนนาน่า สตรอว์เบอร์รี่ชีส M ', type: 'cake-size m', quantity: 12 },
    { id: 4, img: 'https://down-th.img.susercontent.com/file/th-11134207-7ras9-m5ol4ftmxa5y98', name: 'บอนนาน่า มัทฉะชีส', price: 190, description:'บอนนาน่า มัทฉะชีส M ', type: 'cake-size m', quantity: 15 },
    { id: 5, img: 'https://down-th.img.susercontent.com/file/th-11134207-7rase-m5ol7javsdgq0b', name: 'บอนนาน่า ดาร์คช็อร์ค', price: 180, description:'บอนนาน่า ดาร์คช็อร์ค M ', type: 'cake-size m', quantity: 20 },
    { id: 6, img: 'https://down-th.img.susercontent.com/file/th-11134207-7r98t-lxgvkm25qze877', name: 'บอนนาน่า ชีส', price: 250, description:'บอนนาน่า ชีส L ', type: 'cake-size l', quantity: 5 },
    { id: 7, img: 'https://down-th.img.susercontent.com/file/th-11134207-7r992-lxgvkp5p7r8we2', name: 'บอนนาน่า นูเทลล่าชีส', price: 250, description:'บอนนาน่า นูเทลล่าชีส L ', type: 'cake-size l', quantity: 10 }
];


function renderProducts(products) {
    let productList = document.getElementById('productlist');
    productList.innerHTML = '';

    if (products.length === 0) {
        productList.innerHTML = "<p style='color: red;'>ไม่พบสินค้า</p>";
        return;
    }

    products.forEach((item, index) => {
       productList.innerHTML += `
           <div class="product-item ${item.type}" onclick="openProductDetail(${index})">
               <img src="${item.img}" alt="${item.name}" style="width: 150px; height: 150px; object-fit: cover; border: 2px solid #000; border-radius: 10px;">
               <p>${item.name}</p>
              <p>${item.price} บาท</p>
              <p>จำนวนในสต็อก: ${item.quantity} ชิ้น</p> 
            </div>

        `;
    })
}
 document.addEventListener("DOMContentLoaded", function() {
    renderProducts(product); // เรียกใช้ฟังก์ชัน renderProducts เมื่อหน้าเว็บโหลดเสร็จ
});



function searchProduct(category, element) {
    let filteredProducts = (category === 'all') ? product : product.filter(item => item.type.toLowerCase() === category.toLowerCase());
    renderProducts(filteredProducts);

    document.querySelectorAll('.sidebar-items').forEach(item => item.classList.remove('active'));
    element.classList.add('active');
}

function searchSomething(input) {
    let keyword = input.value.toLowerCase();
    let filteredProducts = product.filter(item => item.name.toLowerCase().includes(keyword));
    renderProducts(filteredProducts);
}

//[{},{},{}]// loength = 3

// $(document).ready(()  => {
//     var html = '';
//     for (i = 0; i < product.length; i++) {
//        html  += `<div onclick="openProductDetail(${i})" class="product-item ${product[i].type}">
//             <img class="product-img" src="${product[i].img}" alt="">
//             <p style="font-size: 1.2vw;">${product[i].name}</p>
//             <p style="font-size: 0.9vw;">${product[i].price}บาท</p>
//         </div>`;
//     }
//     $("#productlist").html(html);

// })

function searchsomething(elem) {
   // console.log(elem.id)
    var value =$('#'+elem.id).val()
    console.log(value)


    var html = '';
    for (i = 0; i < product.length; i++) {
        if( product[i].name.includes (value) ) {
            html  += `<div onclick="openProductDetail(${i}) class="product-item ${product[i].type}">
            <img class="product-img" src="${product[i].img}" alt="">
            <p style="font-size: 1.2vw;">${product[i].name}</p>
            <p style="font-size: 0.9vw;">${product[i].price}บาท</p>
        </div>`;
        }
      
    }
    if(html == ''){
        $("#productlist").html(`<p>Not found</p>`);
    } else {
        $("#productlist").html(html);
    }
    
}

function searchproduct(param) {
    console.log(param)
    $(".product-item").css('display', 'none')
    if(param == 'all') {
        $(".product-item").css('display', 'block')
    }
    else {
        $("."+param).css('display', 'block')
    }
}

var productindex = 0;
function openProductDetail(index) {
    productindex = index;
    console.log(productindex)
    $("#modalDesc").css('display', 'flex')
    $("#mdd-img").attr('src', product[index].img);
    $("#mdd-name").text(product[index].name)
    $("#mdd-price").text(product[index].price)
    $("#mdd-desc").text(product[index].description)
}

function closeModal() {
    $(".modal").css('display','none')
}

var cart = [];
function addtocart() {
    var pass = true;

    for (let i = 0; i < cart.length; i++) {
        if(productindex == cart[i].index){
            console.log('found same product')
            cart[i].count++;
            pass = false;
            break;
        }
    }

    if(pass) {
        var obj = {
            index: productindex,
            id: product[productindex].id,
            name: product[productindex].name,
            price: product[productindex].price,
            img: product[productindex].img,
            id: product[productindex],
            count: 1
        };
        //console.log(obj)
        cart.push(obj)
    }
    console.log(cart)

    Swal.fire({
        icon: 'success',
        title: 'Add' + product[productindex].name + 'to cart !'
    })
    $("#cartcount").css('display','flex').text(cart.length)
}

function openCart() {
    $('#modalCart').css('display','flex')
    rendercart();
}


function rendercart() {
    if(cart.length > 0) {
        var html = '';
        for (let i = 0; i < cart.length; i++) {
            let productItem = cart[i];
            // เช็คว่า count ของสินค้าคือ 1 หรือไม่
            if (cart[i].count === 1) {
                html += ` <div class="cartlist-item">
                    <div class="carlist-left">
                        <img src="${productItem.img}" alt="">
                        <div class="cartlist-detail">
                            <p style="font-size: 1.5vw;">${cart[i].name}</p>
                            <p style="font-size: 1.2vw;"> ${cart[i].price * cart[i].count } บาท</p>
                        </div>
                    </div>
                    <div class="cartlist-right">
                        <p onclick="deinitems('-', ${i})" class="btnc">-</p>
                        <p id="countitems${i}" style="margin: 0 20px">${cart[i].count}</p>
                        <p onclick="deinitems('+', ${i})" class="btnc">+</p>
                    </div>
                </div>`;
            } else {
                html += ` <div class="cartlist-item">
                    <div class="carlist-left">
                        <img src="${productItem.img}" alt="">
                        <div class="cartlist-detail">
                            <p style="font-size: 1.5vw;">${cart[i].name}</p>
                            <p style="font-size: 1.2vw;"> ${cart[i].price * cart[i].count } บาท</p>
                        </div>
                    </div>
                    <div class="cartlist-right">
                        <p onclick="deinitems('-', ${i})" class="btnc">-</p>
                        <p id="countitems${i}" style="margin: 0 20px">${cart[i].count}</p>
                        <p onclick="deinitems('+', ${i})" class="btnc">+</p>
                    </div>
                </div>`;
            }
        }
        $("#mycart").html(html);
    }
    else {
        $("#mycart").html(`<p> Not found product list</p>`);
    }
}


function deinitems(action, index) {
    if (action === '-') {
        if (cart[index].count > 1) {
            // ลดจำนวนสินค้า
            cart[index].count--;
            $("#countitems" + index).text(cart[index].count);
            rendercart();
        } else {
            // ถ้าจำนวนสินค้าคือ 1 จะลบสินค้าทันทีโดยไม่ถาม
            cart.splice(index, 1);
            rendercart();
            $("#cartcount").css('display', cart.length > 0 ? 'flex' : 'none').text(cart.length);
        }
    } else if (action === '+') {
        // เพิ่มจำนวนสินค้า
        cart[index].count++;
        $("#countitems" + index).text(cart[index].count);
        rendercart();
    }
}


// ฟังก์ชันคำนวณยอดรวม
function calculateTotal() {
    let total = 0;
    for (let i = 0; i < cart.length; i++) {
        total += cart[i].price * cart[i].count;
    }
    return total;
}

// ฟังก์ชันสำหรับแสดงผลหน้าสรุป
function showSummary() {
    let summaryHtml = '';
    let totalAmount = calculateTotal();

    // แสดงรายการสินค้าและจำนวนที่เลือก
    for (let i = 0; i < cart.length; i++) {
        let itemTotal = cart[i].price * cart[i].count;
        summaryHtml += `
            <div class="cartlist-item">
                <div class="carlist-left">
                    <img src="${cart[i].img}" alt="">
                    <div class="cartlist-detail">
                        <p style="font-size: 1.5vw;">${product[i].name}</p>
                        <p style="font-size: 1.2vw;">จำนวน: ${cart[i].count}</p>
                        <p style="font-size: 1.2vw;">ราคาต่อรายการ: ${itemTotal} บาท</p>
                    </div>
                </div>
            </div>
        `;
    }

    // แสดงยอดรวม
    $("#orderSummary").html(summaryHtml);
    $("#totalAmount").text(`Total: ${totalAmount} บาท`);

    // ซ่อน Modal ตะกร้าสินค้า
    $("#modalCart").css('display', 'none');
    // แสดงหน้าสรุป
    $("#summaryModal").css('display', 'flex');
}

// ฟังก์ชันปิดหน้าสรุป
function closeSummaryModal() {
    $("#summaryModal").css('display', 'none');
}

// ฟังก์ชันสำหรับแสดงหน้าชำระเงิน
function showPayment() {
    // ซ่อน Modal สรุป
    $("#summaryModal").css('display', 'none');
    // แสดง Modal ชำระเงิน
    $("#paymentModal").css('display', 'flex');
}

// ฟังก์ชันปิดหน้าชำระเงิน
function closePaymentModal() {
    $("#paymentModal").css('display', 'none');
}

// ฟังก์ชันสำหรับดำเนินการชำระเงิน
function processPayment() {
    let cardNumber = $("#cardNumber").val();
    let expirationDate = $("#expirationDate").val();
    let cvv = $("#cvv").val();

    // เช็คข้อมูลการชำระเงิน
    if (cardNumber && expirationDate && cvv) {
        // ในที่นี้จะเป็นการดำเนินการชำระเงิน (เรียก API หรือประมวลผลต่อ)
        alert('Payment processed successfully!');
        
        // ปิดหน้าชำระเงิน
        closePaymentModal();

        // ทำการเคลียร์ตะกร้า (หรือการทำงานอื่น ๆ หลังการชำระเงิน)
        cart = [];
        renderCart();
    } else {
        alert('Please fill in all payment details!');
    }
}




