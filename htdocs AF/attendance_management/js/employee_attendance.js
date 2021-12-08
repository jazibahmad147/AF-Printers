


$("#employee_attendance").unbind('submit').bind('submit', function (e) {
    e.preventDefault();
    // event.preventDefault();
    // console.log("wee");
    var form = $(this);
    console.log(form);
    // $("#employee_registerBtn")
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: form.serialize(),
        dataType: 'json',
        success:function(response){
            // console.log(response);
            alert(response.messages);
        },
        error:function(e){
            console.log(e);
        }
    })
    

    
})