$(document).ready(function(){
    var DOMAIN = "http://localhost";

    var start = document.getElementById("start_date");
    var end = document.getElementById("end_date");
    
 
    $('#filter').click(function(){
        // var form = $("#date_filter").serialize();
        var form = $(this);
        $.ajax({
            url : DOMAIN+"/includes/getOrderReport.php",
            method : "POST",
            data : form.serialize(),
            dataType : "text",
            success : function(response){
                console.log(data);
                
                var mywindow =  window.open('', 'AF Printers', 'height=400,width=600');
                mywindow.document.write('<html><head><title>Order Report Slip</title>');        
                mywindow.document.write('</head><body>');
                mywindow.document.write(response);
                mywindow.document.write('</body></html>');

                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10

                mywindow.print();
                mywindow.close();
                
            }
        })
        return false;
                // var start_date = $('#start_date').val();
                // var end_date = $('#end_date').val();
                // if(start_date != '' && end_date != ''){
                //     $('#order_data').DataTable().destroy();
                //     fetch_data('yes', start_date, end_date);
                // }else{
                //     alert ("Both Date is Required");
                // }
                // console.log(start.value);
                // console.log(end.value);
            });

})
