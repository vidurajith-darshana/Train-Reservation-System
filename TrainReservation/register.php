<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration</title>
    <link href="https://www.jqueryscript.net/demo/Stylish-jQuery-Accordion-Content-Toggle-Plugin-ziehharmonika/ziehharmonika.css" rel="stylesheet">


    <?php

    include 'header.php';

    ?>

    <div style="background-color: black;height:900px;margin-top: 40%;opacity: 0.93">

        <div class="container">
            <h1>jQuery ziehharmonika Plugin Example</h1>
            <div class="ziehharmonika">
                <h3>Hey Guys...Join With Us</h3>
                <div>
                    <p style="font: bold">You Must be a registered Customer for get any train Service.Thank you!.<img src="image/340px-Ceylon_Government_Railways_logo.gif" width="50px" height="50px"></p>
                    <h4 style="margin-left: 20%">Registration</h4>
                    <div>
                        <form id="reg-form">

                            <div class="form-group">
                                <label for="inputAddress">Name</label>
                                <input name="name" type="text" class="form-control" id="cust-name" placeholder="Jhon Smith">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input name="address" type="text" class="form-control" id="cust-address" placeholder="1234 Main St">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Contact</label>
                                <input name="contact" type="text" class="form-control" id="cust-tp" placeholder="+94 76 663 887">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input name="email" type="email" class="form-control" id="cust-mail" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input name="password" type="password" class="form-control" id="cust-password" placeholder="Password">
                                </div>
                            </div>

                            <button id="reg-btn" type="button" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
                <h3>Ready to Superb Journey...</h3>
                <div>
                    <p style="font: bold">You must login to get your services from us.Thank you!.<img src="image/340px-Ceylon_Government_Railways_logo.gif" width="50px" height="50px"></p>
                    <h4 style="margin-left: 20%">Sign UP</h4>
                    <div>
                        <form id="log-form">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <labelfor="exampleInputPassword1">Password</label>
                                <input id="password"  name="password" type="password" class="form-control"  placeholder="Password">
                            </div>
                            <button id="btn-log" type="button" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
                <h3>Do you want to Update your Profile???</h3>
                <div>
                    <p style="font: bold">Use this form and change everything as your self.Thank you!.<img src="image/340px-Ceylon_Government_Railways_logo.gif" width="50px" height="50px"></p>
                    <h4 style="margin-left: 20%">Update</h4>
                    <div>
                        <form id="update-form">

                            <div class="form-group">
                                <label for="inputAddress">Name</label>
                                <input name="name" type="text" class="form-control" id="cust-name" placeholder="Jhon Smith">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input name="address" type="text" class="form-control" id="cust-address" placeholder="1234 Main St">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Contact</label>
                                <input name="contact" type="text" class="form-control" id="cust-tp" placeholder="+94 76 663 887">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input name="email" type="email" class="form-control" id="cust-mail1" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input name="password" type="password" class="form-control" id="cust-password" placeholder="Password">
                                </div>
                            </div>

                            <button id="reg-btn" type="button" class="btn btn-primary">Change Profile</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <?php

    include 'footer.php';

    ?>

    <link rel="stylesheet" href="css/validate-style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://www.jqueryscript.net/demo/Stylish-jQuery-Accordion-Content-Toggle-Plugin-ziehharmonika/ziehharmonika.js"></script>
    <script>
        $(document).ready(function() {
            $('.ziehharmonika').ziehharmonika({
                collapsible: true,
                prefix: '★'
            });
        });
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/reg-controller.js"></script>
    <script>
        $("#btn-log").click(function () {

            if($('#password').val().length>0 && $("#exampleInputEmail1").val().length>0){

                var fromPage="<?=$_SESSION['page']?>";

                var searchCustomerRequest=new XMLHttpRequest();

                searchCustomerRequest.onreadystatechange=function () {
                    if(searchCustomerRequest.readyState===4 && searchCustomerRequest.status===200){
                        console.log(searchCustomerRequest.responseText);
                        if(searchCustomerRequest.responseText==='found'){

                            if(fromPage==='res'){
                                var request=new XMLHttpRequest();
                                request.onreadystatechange=function () {
                                    if(request.readyState===4 && request.status===200){
                                        //   swal("Hai!", "Now you are logged in here!", "success");
                                        window.location.replace("reservation.php?session=click");
                                    }
                                };

                                request.open('GET','reservation.php?session=click',true);
                                request.send();
                            }
                        }else{
                            swal("Ooops!", "Wrong Combination.Try Again!", "error");
                        }
                    }
                };

                var array=$("#log-form").serializeArray();
                var jsonArray=JSON.stringify(array);

                searchCustomerRequest.open('POST','search-login.php',true);

                searchCustomerRequest.send(jsonArray);

            }else if($('#password').val().length>0 && $("#exampleInputEmail1").val().length===0){

                $("#exampleInputEmail1").addClass('error');
            }else if($('#password').val().length===0 && $("#exampleInputEmail1").val().length>0){

                $("#password").addClass('error');
            }else{
                $("#exampleInputEmail1").addClass('error');
                $("#password").addClass('error');
            }

        });
    </script>

    <script>
        $("#exampleInputEmail1").keydown(function (e) {
            $("#exampleInputEmail1").removeClass('error');
            $("#password").removeClass('error');
        });

        $("#password").keydown(function (e) {
            $("#exampleInputEmail1").removeClass('error');
            $("#password").removeClass('error');
        });
    </script>

    <script>
        $("#cust-tp").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl/cmd+A
                (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: Ctrl/cmd+C
                (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: Ctrl/cmd+X
                (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
            if($("#cust-tp").val().length>9){
                e.preventDefault();
            }
        });

    </script>

    </body>
</html>

