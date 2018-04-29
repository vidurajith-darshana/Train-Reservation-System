<?php

$connection=mysqli_connect('localhost','root','vidura','train_reservation');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Train Gallery</title>
<!--    <link rel="stylesheet" href="css/selectbox-style.css">-->
    <link rel="stylesheet" href="css/validate-style.css">
    <?php

    include 'header.php';

    ?>

    <div style="background-color: gray;height: auto;margin-top: 40%;opacity: 0.9">

        <div style="background-color: black;border-radius: 10px;box-shadow: 2px 2px 2px 2px white;padding-left: 30%;padding-right: 30%">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Start Station</label>
                <select class="form-control" id="from">
                    <?php

                    $resultset=mysqli_query($connection,"select name from station");
                    while($row=mysqli_fetch_array($resultset)){
                        ?>
                        <option><?=$row['name']?></option>
                        <?php
                    }


                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">End Station</label>
                <select class="form-control" id="to">
                    <?php

                    $resultset=mysqli_query($connection,"select name from station");
                    while($row=mysqli_fetch_array($resultset)){
                        ?>
                        <option><?=$row['name']?></option>
                        <?php
                    }


                    ?>
                </select>
            </div>

            <div class="form-group col-md-6">

                <button id="cal-btn" type="button" class="btn btn-outline-warning">Calculate</button>
            </div>

            <form id="lug-form">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Distance</label>
                    <input name="distance-name" id="distance" class="form-control" type="text" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Total Price</label>
                    <input name=distance-price id="price" class="form-control" type="text" readonly>
                </div>
                <div class="form-group col-md-6">

                    <button id="btn-pay" type="button" class="btn btn-outline-danger">Payment</button>
                </div>
            </form>
        </div>

    </div>

    <?php

    include 'footer.php';

    ?>

    <script src="js/selectbox-controller.js"></script>
    <script>
        $("#cal-btn").click(function () {

            $("#distance").removeClass('error');
            $("#price").removeClass('error');

            var from = $('#from').find(":selected").text();
            var to = $('#to').find(":selected").text();

            var request1=new XMLHttpRequest();
            request1.onreadystatechange=function () {

                if(request1.readyState===4  && request1.status===200){
                    var val1=parseInt(this.responseText);
                    var total;
                    var request2=new XMLHttpRequest();
                    request2.onreadystatechange=function () {

                        if(request2.readyState===4  && request2.status===200){
                            var val2=parseInt(request2.responseText);
                            if(val1>val2){
                                total=val1-val2;
                            }else{
                                total=val2-val1;
                            }
                            $("#distance").val(total);
                            $("#price").val(total*75.00);
                        }

                    }

                    request2.open('GET','getDistance.php?name='+to,true);
                    request2.send();
                }
            }
            request1.open('GET','getDistance.php?name='+from,true);
            request1.send();
        });
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $("#btn-pay").click(function () {

            if($("#distance").val().length>0 && $("#price").val().length>0){
                var val=parseInt($("#price").val());
                if(val===0){
                    swal("Ooops!", "You must select valid stations!", "error");
                }else{
                    var request=new XMLHttpRequest();

                    request.onreadystatechange=function () {
                        if(this.status===200 && this.readyState===4){

                            if(request.responseText==='Success'){
                                swal("Nice Work!", "Luggage is reserved!", "success");

                            }else{
                                swal("Ooops!", "You must be logged here!", "error");
                            }
                        }
                    };

                    var jsArray=$("#lug-form").serializeArray();
                    var json=JSON.stringify(jsArray);

                    // request.setRequestHeader('Content-type','application/json');

                    request.open('POST','luggagePayment.php',true);
                    request.send(json);
                }


            }else{
                $("#distance").addClass('error');
                $("#price").addClass('error');

            }

        });
    </script>
    </body>
</html>

