$(document).ready(function(){
    var DOMAIN = "http://localhost";


    // $("#strtDate").datepicker();

    // Manage Category
    manageCategory(1);
    function manageCategory(pn){
        $.ajax({
            url : DOMAIN+"/includes/process.php",
            method : "POST",
            data : {manageCategory:1,pageno:pn},
            success : function(data){
                $("#get_category").html(data);
                // alert (data);
            }
        })
    }
    
    $("body").delegate(".page-link","click",function(){
        var pn = $(this).attr("pn");
        manageCategory(pn);
    })

    // Delete Category
    $("body").delegate(".del_cat","click",function(){
        var did = $(this).attr("did");
        if (confirm("Are you sure? You want to delete...!")) {
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data : {deleteCategory:1,id:did},
                success : function(data){
                    if (data == "DEPENDENT_CATEGORY") {
                        alert ("Sorry! You can not delete this category");
                    }else if(data == "CATEGORY_DELETED"){
                        alert ("Category Deleted Successfully..");
                        manageCategory(1);
                    }else if("DELETED"){
                        alert ("Deleted Successfully");
                        manageCategory(1);
                    }else{
                        alert (data);
                    }
                    
                }
            })
        }else{
            alert ("No");
        }
    })

// Manage Clients
    manageClient(1);
    function manageClient(pn){
        $.ajax({
            url : DOMAIN+"/includes/process.php",
            method : "POST",
            data : {manageClient:1,pageno:pn},
            success : function(data){
                $("#get_client").html(data);
                // alert (data);
            }
        })
    }

    $("body").delegate(".page-link","click",function(){
        var pn = $(this).attr("pn");
        manageClient(pn);
    })

    // Delete Client
    $("body").delegate(".del_client","click",function(){
        var did = $(this).attr("did");
        if (confirm("Are you sure? You want to delete...!")) {
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data : {deleteClient:1,id:did},
                success : function(data){
                    if (data == "DELETED") {
                        alert ("Deleted Successfully");
                        manageClient(1);
                    }else{
                        alert (data);
                    }
                    
                }
            })
        }
    })


    // Manage Products
    manageProduct(1);
    function manageProduct(pn){
        $.ajax({
            url : DOMAIN+"/includes/process.php",
            method : "POST",
            data : {manageProduct:1,pageno:pn},
            success : function(data){
                $("#get_product").html(data);
                // alert (data);
            }
        })
    }

    $("body").delegate(".page-link","click",function(){
        var pn = $(this).attr("pn");
        manageProduct(pn);
    })

    // Delete Products
    $("body").delegate(".del_product","click",function(){
        var did = $(this).attr("did");
        alert (did);
        if (confirm("Are you sure? You want to delete...!")) {
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data : {deleteProduct:1,id:did},
                success : function(data){
                    if (data == "DELETED") {
                        alert ("Deleted Successfully");
                        manageProduct(1);
                    }else{
                        alert (data);
                    }
                    
                }
            })
        }
    })


    // Manage Order
    manageOrder(1);
    function manageOrder(pn){
        $.ajax({
            url : DOMAIN+"/includes/process.php",
            method : "POST",
            data : {manageOrder:1,pageno:pn},
            success : function(data){
                $("#get_order").html(data);
                // alert (data);
            }
        })
    }
    
    $("body").delegate(".page-link","click",function(){
        var pn = $(this).attr("pn");
        manageOrder(pn);
    })
    
    // Delete Order
    $("body").delegate(".del_order","click",function(){
        var did = $(this).attr("did");
        if (confirm("Are you sure? You want to delete...!")) {
            $.ajax({
                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data : {deleteOrder:1,id:did},
                success : function(data){
                    if (data == "DELETED") {
                        alert ("Deleted Successfully");
                        manageOrder(1);
                    }else{
                        alert (data);
                    }
                    
                }
            })
        }
    })

})