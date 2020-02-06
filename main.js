function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}

function keyset(key, e) {

    if (e.keyCode == 13) {
        document.getElementById(key).focus();
    }
}

function got_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000066";

}

function lost_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000000";

}

$(document).ready(function () {
    cat();
    brand();
    product();
    function cat() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {category: 1},
            success: function (data) {
                $("#get_category").html(data);
            }
        })
    }
    function brand() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {brand: 1},
            success: function (data) {
                $("#get_brand").html(data);
            }
        })
    }
    function product() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {getProduct: 1},
            success: function (data) {
                $("#get_product").html(data);
            }
        })
    }
    $("body").delegate(".category", "click", function (event) {
        $("#get_product").html("<h3>Loading...</h3>");
        event.preventDefault();
        var cid = $(this).attr('cid');
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {get_seleted_Category: 1, cat_id: cid},
            success: function (data) {
                $("#get_product").html(data);
                if ($("body").width() < 480) {
                    $("body").scrollTop(683);
                }
            }
        })

    })
    $("body").delegate(".selectBrand", "click", function (event) {
        event.preventDefault();
        $("#get_product").html("<h3>Loading...</h3>");
        var bid = $(this).attr('bid');
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {selectBrand: 1, brand_id: bid},
            success: function (data) {
                $("#get_product").html(data);
                if ($("body").width() < 480) {
                    $("body").scrollTop(683);
                }
            }
        })

    })
    $("#search").keyup(function () {
//        $("#get_product").html("<h3>Loading...</h3>");
        var keyword = $("#search").val();
        if (keyword != "") {
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {search: 1, keyword: keyword},
                success: function (data) {
                    $("#get_product").html(data);
                    if ($("body").width() < 480) {
                        $("body").scrollTop(683);
                    }
                }
            })
        }
    })

    $("#signup_button").click(function (event) {
        event.preventDefault();
        $.ajax({
            url: "register.php",
            method: "POST",
            data: $("form").serialize(),
            success: function (data) {
                $("#signup_msg").html(data);
                window.location.href = "profile.php";
            }
        })

    })
    $("#signup_button1").click(function (event) {
        event.preventDefault();
//        var files = $('#product_image')[0].files; //where files would be the id of your multi file input
////or use document.getElementById('files').files;
//        var name = $("product_image").val();
//        alert(files);
//        t = 0;
//        var data = new FormData();
//        for (var i = 0, f; f = files[i]; i++) {
//            var alpha = name.files[0];
//            if (alpha == "") {
//                t = 0;
//            } else {
//                t = 1;
//            }
//            data.append('file', alpha);
//        }
//
//        if (t == 0) {
//            data.append('img', $("doldimg").val());
//        }
        $.ajax({
            url: "item_add.php",
            method: "POST",
            data: $("form").serialize(),
            success: function (data) {
                $("#signup_msg1").html(data);
                setTimeout(function () {// wait for 5 secs(2)
                    window.location.href = "item.php";
                }, 1000);
            }
        })

    })

    $("#login").click(function (event) {
        event.preventDefault();
        var email = $("#email").val();
        var pass = $("#password").val();
        $.ajax({
            url: "login.php",
            method: "POST",
            data: {userLogin: 1, userEmail: email, userPassword: pass},
            success: function (data) {
                if (data == "true") {
                    window.location.href = "profile.php";
                }
            }
        })
    })
    cart_count();
    $("body").delegate("#product", "click", function (event) {
        event.preventDefault();
        var p_id = $(this).attr('pid');
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {addToProduct: 1, proId: p_id},
            success: function (data) {
                $("#product_msg").html(data);
                cart_count();
            }
        })
    })
    cart_container();
    function cart_container() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {get_cart_product: 1},
            success: function (data) {
                $("#cart_product").html(data);
            }
        })

    }
    ;
    function cart_count() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {cart_count: 1},
            success: function (data) {
                $(".badge").html(data);
            }
        })
    }

    $("#cart_container").click(function (event) {
        event.preventDefault();
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {get_cart_product: 1},
            success: function (data) {
                $("#cart_product").html(data);
            }
        })

    })
    cart_checkout();
    function cart_checkout() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {cart_checkout: 1},
            success: function (data) {
                $("#cart_checkout").html(data);
            }
        })
    }
    $("body").delegate(".qty", "keyup", function () {
        var pid = $(this).attr("pid");
        var qty = $("#qty-" + pid).val();
        var price = $("#price-" + pid).val();
        var total = qty * price;
        $("#total-" + pid).val(total);
    })
    $("body").delegate(".remove", "click", function (event) {
        event.preventDefault();
        var pid = $(this).attr("remove_id");
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {removeFromCart: 1, removeId: pid},
            success: function (data) {
                $("#cart_msg").html(data);
                cart_checkout();
                window.location.href = "profile.php";
            }
        })
    })
    $("body").delegate(".update", "click", function (event) {
        event.preventDefault();
        var pid = $(this).attr("update_id");
        var qty = $("#qty-" + pid).val();
        var price = $("#price-" + pid).val();
        var total = $("#total-" + pid).val();
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {updateProduct: 1, updateId: pid, qty: qty, price: price, total: total},
            success: function (data) {
                $("#cart_msg").html(data);
                cart_checkout();
            }
        })
    })
    page();
    function page() {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {page: 1},
            success: function (data) {
                $("#pageno").html(data);
            }
        })
    }
    $("body").delegate("#page", "click", function () {
        var pn = $(this).attr("page");
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {getProduct: 1, setPage: 1, pageNumber: pn},
            success: function (data) {
                $("#get_product").html(data);
            }
        })
    })
})


function save_item() {
//     if (document.getElementById('product_title').value == "") {
//        document.getElementById('signup_msg1').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Product Title Field Is Empty!</span></div>";
//        return false;
//    }
//    if (document.getElementById('product_price').value == "") {
//        document.getElementById('signup_msg1').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Product Price Filed Is Empty!</span></div>";
//        return false;
//    }
   
    var files = $('#file')[0].files;
    var size = files.length;
    
    

    if (size == 0) {
        document.getElementById('signup_msg1').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>Image Not Choosen Please Select A Image!</span></div>";
        return false;
    }
   
    

    for (var i = 0, f; f = files[i]; i++) {
        var name = document.getElementById('file');
        var alpha = name.files[i];
        console.log(alpha.name);
        var data = new FormData();
         

        data.append('Command', "save_item");
      
        var product_title = document.getElementById('product_title').value;
        var product_cat = document.getElementById('product_cat').value;
        var product_brand = document.getElementById('product_brand').value;
        var product_price = document.getElementById('product_price').value;
        data.append('product_title', product_title);
        data.append('product_cat', product_cat);
        data.append('product_brand', product_brand);
        data.append('product_price', product_price);
        data.append('file', alpha);
        $.ajax({
            url: 'add_product.php',
            data: data,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (msg) {
                if (msg == "Saved") {
                    document.getElementById('signup_msg1').innerHTML = "<div class='alert alert-success' role='alert'><span class='center-block'>Saved</span></div>";
//                    newent();

                } else {
                    document.getElementById('signup_msg1').innerHTML = "<div class='alert alert-warning' role='alert'><span class='center-block'>" + msg + "</span></div>";
                }
            }
        });
//        newent();
    }
}



















