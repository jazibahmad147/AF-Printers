$(document).ready(function(){
    var DOMAIN = "http://localhost";
    $("#register_form").on("submit",function(){
        var status = false;
        var name = $("#username");
        var email = $("#email");
        var pass1 = $("#password1");
        var pass2 = $("#password2");
        var PIN = $("#Master_PIN");
        var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        if(PIN.val()!="Fighter008///" || PIN.val()==""){
            PIN.addClass("border-danger");
            $("#pin_error").html("<span class='text-danger'>Master PIN is incorrect</span>");
            status = false;
        }else{
            PIN.removeClass("border-danger");
            $("#pin_error").html("");
            status = true;
        }
        if(name.val()=="" || name.val().length < 6){
            name.addClass("border-danger");
            $("#u_error").html("<span class='text-danger'>Please Enter Name and name should be more than 6 char.</span>");
            status = false;
        }else{
            name.removeClass("border-danger");
            $("#u_error").html("");
            status = true;
        }
        if(!e_patt.test(email.val())){
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Please Enter Valid Email Address.</span>");
            status = false;
        }else{
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true;
        }
        if(pass1.val() == "" || pass1.val().length < 8 ){
            pass1.addClass("border-danger");
            $("#p1_error").html("<span class='text-danger'>Please Enter More than 8 Digit Password.</span>");
            status = false;
        }else{
            pass1.removeClass("border-danger");
            $("#p1_error").html("");
            status = true;
        }
        if(pass2.val() == "" || pass2.val().length < 8 ){
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>Please Enter More than 8 Digit Password.</span>");
            status = false;
        }else{
            pass2.removeClass("border-danger");
            $("#p2_error").html("");
            status = true;
        }
        if((pass2.val() == pass1.val()) && status == true){
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data : $("#register_form").serialize(),
                success : function(data){
                    if(data == "EMAIL_ALREADY_EXISTS"){
                        alert("It seems like your email is already used.");
                    }else if(data == "SOME_ERROR"){
                        alert("Something Wrong");
                    }else{
                        window.location.href = encodeURI(DOMAIN+"/index.php?msg=You are registered successfully Now login to your account");
                    }
                }
            })
        }else{
            pass2.removeClass("border-danger");
            $("#p2_error").html("");
            status = true;
        }
    })

// For Login Part
$("#login_form").on("submit",function(){
    var email = $("#log_email");
    var pass = $("#log_password");
    var status = false;
    if(email.val() == ""){
        email.addClass("border-danger");
        $("#e_error").html("<span class='text-danger'>Please Enter Email Address.</span>");
        status = false;
    }else{
        email.removeClass("border-danger");
        $("#e_error").html("");
        status = true;
    }
    if(pass.val() == ""){
        pass.addClass("border-danger");
        $("#p_error").html("<span class='text-danger'>Please Enter Password.</span>");
        status = false;
    }else{
        pass.removeClass("border-danger");
        $("#p_error").html("");
        status = true;
    }
    if(status){
        $.ajax({
            url : DOMAIN+"/includes/process.php",
            method : "POST",
            data : $("#login_form").serialize(),
            success : function(data){
            if(data == "NOT_REGISTERD"){
                email.addClass("border-danger");
                $("#e_error").html("<span class='text-danger'>It seems like you are not registered.</span>");
            }else if(data == "PASSWORD_NOT_MATCHED"){
                pass.addClass("border-danger");
                $("#p_error").html("<span class='text-danger'>Please Enter Valid Password.</span>");
            }else{
                console.log(data);
                window.location.href = encodeURI(DOMAIN+"/dashboard.php");
            }
            }
        })
    }
})

    // Fetch Category
    fetch_category();
    function fetch_category(){
        $.ajax({
            url : DOMAIN+"/includes/process.php",
            method : "POST",
            data : {getCategory:1},
            success : function(data){
                var root = "<option value='0'>Root</option>";
                $("#parent_cat").html(root+data);
            }
        })
    }

    // To Add Category
    $("#category_form").on("submit",function(){
        if($("#category_name").val() == ""){
            $("#category_name").addClass("border-danger");
            $("#cat_error").html("<span class='text-danger'>Please Enter Category Name.</span>");
            // status = false;
        }else{
            $.ajax({
            url : DOMAIN+"/includes/process.php",
            method : "POST",
            data : $("#category_form").serialize(),
            success : function(data){
                if(data == "CATEGORY_ADDED"){
                    $("#category_name").removeClass("border-danger");
                    $("#cat_error").html("<span class='text-success'>New Category Added Successfully.</span>");
                    $("#category_name").val("");
                }else{
                    alert (data);
                }
            }
            })
        }
    })
// To Add Product
    $("#product_form").on("submit",function(){
        if($("#product_name").val() == ""){
            $("#product_name").addClass("border-danger");
            $("#p_error").html("<span class='text-danger'>Please Enter Product Name.</span>");
            // status = false;
        }else{
            $.ajax({
            url : DOMAIN+"/includes/process.php",
            method : "POST",
            data : $("#product_form").serialize(),
            success : function(data){
                if(data == "PRODUCT_ADDED"){
                    $("#product_name").removeClass("border-danger");
                    $("#p_error").html("<span class='text-success'>New Product Added Successfully.</span>");
                    $("#product_name").val("");
                }else{
                    alert (data);
                }
            }
            })
        }
    })
// Add Clients
    $("#client_form").on("submit",function(){
        var company = $("#company_name");
        var client = $("#client_name");
        var contact = $("#contact_number");
        var status = false;
        if(company.val() == ""){
            company.addClass("border-danger");
            $("#company_error").html("<span class='text-danger'>Please Enter Company Name.</span>");
            status = false;
        }else{
            company.removeClass("border-danger");
            $("#company_error").html("");
            status = true;
        }
        if(client.val() == ""){
            client.addClass("border-danger");
            $("#client_error").html("<span class='text-danger'>Please Enter Client Name.</span>");
            status = false;
        }else{
            client.removeClass("border-danger");
            $("#client_error").html("");
            status = true;
        }
        // if(contact.val() == ""){
        //     contact.addClass("border-danger");
        //     $("#contact_error").html("<span class='text-danger'>Please Enter Contact Number.</span>");
        //     status = false;
        // }else{
        //     contact.removeClass("border-danger");
        //     $("#contact_error").html("");
        //     status = true;
        // }
        if(status){
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data : $("#client_form").serialize(),
                success : function(data){
                    
                    if(data == "COMPANY_ALREADY_REGISTERED"){
                        alert("It seems like company is already registered.");
                    }else if(data == "SOME_ERROR"){
                        alert("Something Wrong");
                    }else{
                        alert ("Company Registered Successfully!");
                        $("#company_name").val("");
                        $("#client_name").val("");
                        $("#contact_number").val("");
                        $("#old_balance").val("");
                    }
                }
            })
        }
    })

})

// // To update payment
// $("#balance_update_form").on("submit",function(){
//     if($("#cust_name").val() == ""){
//         $("#cust_name").addClass("border-danger");
//         $("#company_error").html("<span class='text-danger'>Please Enter Company Name.</span>");
//         // status = false;
//     }else{
//         $.ajax({
//         url : DOMAIN+"/includes/process.php",
//         method : "POST",
//         data : $("#balance_update_form").serialize(),
//         success : function(data){
//             if(data == "BALANCE_UPDATED"){
//                 $("#cust_name").removeClass("border-danger");
//                 $("#company_error").html("<span class='text-success'>New Category Added Successfully.</span>");
//                 $("#cust_name").val("");
//             }else{
//                 alert (data);
//             }
//         }
//         })
//     }
// })