
$(document).ready(function(){
    var DOMAIN = "http://localhost";

    addNewRow();

    $("#add").click(function(){
        addNewRow();
    })

    function addNewRow() {
        $.ajax({
            url : DOMAIN+"/includes/quote_process.php",
            method : "POST",
            data : {getNewQuoteItem:1},
            success : function(data){
                $("#quote_item").append(data);
                var n = 0;
                $(".number").each(function() {
                    $(this).html(++n);
                })
            }
        })
    }


    $("#remove").click(function(){
        $("#quote_item").children("tr:last").remove();
        calculate(0,0);
    })

    $("#quote_item").delegate(".pid","change",function() {
        var pid = $(this).val();
        var tr = $(this).parent().parent();
        $.ajax({
            url : DOMAIN+"/includes/quote_process.php",
            method : "POST",
            data : {getPriceAndQty:1,id:pid},
            dataType : "json",
            success : function(data){
                tr.find(".pro_name").val(data["product_name"]);
                tr.find(".cat_name").val(data["category_name"]);
                tr.find(".qty").val(1);
                tr.find(".price").val(1);
                tr.find(".amt").html( tr.find(".qty").val() * tr.find(".price").val());
                calculate(0,0);
                // calculateTax(0,0);

            }
        })
    })

    
    $("#quote_item").delegate(".price","keyup",function() {
        var price = $(this);
        var tr = $(this).parent().parent();
        var td = $(this).parent();

        if(isNaN(price.val())){
            alert ("Please Enter Valid Quantity Value..");
            price.val(1);
        }
        else{
            var ans = tr.find(".qty").val() * tr.find(".price").val();
            tr.find($(".amt")).val(ans);
            calculate(0,0);
            // calculateTax(0,0);
            
        }
    })


    function calculate(dis,paid){
        var sub_total = 0;
        var gst = 0;
        var net_total = 0;
        var discount = Number(dis);
        var paid_amt = Number(paid);
        var due = 0;


        $(".amt").each(function() {
            sub_total = sub_total + ($(this).val() * 1);
        })
        
        gst = 0.17 *sub_total;
        $("#gst").val(gst);

        var balance = 0;
        net_total =Number(sub_total)+Number(balance)+Number(gst);
        // console.log(net_total);

        // ------------------------Count Discount------------------------
        $("#sub_total").val(sub_total);
        if(discount != 0){
            sub_total=sub_total+gst;
            net_total = net_total - ((sub_total / 100) * discount);
            $("#discount").val(discount);
        }
        // ------------------------Count Charges------------------------
        // if(charges != 0){
        //     net_total = net_total - charges;
        //     $("#gst").val(charges);
        // }
        
        // ------------------------Count Dues------------------------
        
        due = net_total - paid_amt;
        $("#due").val(due);
        
        $("#net_total").val(net_total);
        
    }

    $("#gst").keyup(function() {
        var gst = $(this).val();
        calculate();
    })

    $("#discount").keyup(function() {
        var discount = $(this).val();
        calculate(discount,0);
    })

    $("#paid").keyup(function() {
        var paid = $(this).val();
        var discount = $("#discount").val();
        calculate(discount,paid);
    })

// Fetching name and old balance from clients table...
    autocomplete(document.getElementById("cust_name"),document.getElementById("old-balance"));

    // Order Accepting
    $("#quote_form").click(function() {
        var quote = $("#get_quote_data").serialize();

        if($("#cust_name").val() == ""){
            alert ("Please Select Customer Name");
        }else if($("#paid").val() == ""){
            alert ("Please Enter Paid Amount");
        }else{
            $.ajax({
                url : DOMAIN+"/includes/quote_process.php",
                method : "POST",
                data : $("#get_quote_data").serialize(),
                success : function(data){
                    if(data < 0){
                        alert (data);
                    }else{
                        $("#get_quote_data").trigger("reset");
                        if(confirm("Do you want to print quote?")){
                        window.location.href = DOMAIN+"/includes/quote_bill.php?quote_no="+data+"&"+quote;
                        console.log(data);
                        }
                    }
                }
            })
        }
        
    })

    

   
})
