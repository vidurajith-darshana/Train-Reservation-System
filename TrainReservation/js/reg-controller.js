$("#reg-btn").click(function () {

    if($('#cust-tp').val().length===0 ||$('#cust-address').val().length===0 ||$('#cust-mail').val().length===0 ||$('#cust-name').val().length===0 ||$('#cust-password').val().length===0){
        swal("Ooops!", "You have missed some fields!", "error");
    }else{
        var regCustomerRequest=new XMLHttpRequest();

        regCustomerRequest.onreadystatechange=function () {
            if(regCustomerRequest.readyState===4 && regCustomerRequest.status===200){
                if(regCustomerRequest.responseText==='Success'){
                    swal("Nice Work!", "Customer Registerd Successfully!", "success");

                }else{
                    swal("Ooops!", "Something went wrong!", "error");
                }
            }
        }

        //  regCustomerRequest.setRequestHeader('Content-type','application/json');

        var array=$("#reg-form").serializeArray();
        var jsonArray=JSON.stringify(array);

        regCustomerRequest.open('POST','customer-reg.php',true);

        regCustomerRequest.send(jsonArray);
    }
});

