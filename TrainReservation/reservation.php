<?php

    $connection=mysqli_connect('localhost','root','vidura','train_reservation');

    session_start();

    $session=$_GET['session'];

    if($session=='click'){
        setcookie('user','you',time()+3600,'/');
    }else{
        $_SESSION['page']='res';
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <?php

        if(!isset($_COOKIE['user'])){

            header('Location: register.php');
        }

    ?>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Train Reservation</title>
    <link rel="stylesheet" href="css/schedule-style.css">
    <!--    <link rel="stylesheet" href="css/selectbox-style.css">-->
    <link rel="stylesheet" href="css/reserve-drop-style.css">
    <!--    <link rel="stylesheet" href="css/selectbox-style.css">-->
    <link rel="stylesheet" href="http://codepen.io/username/pen/aBcDef">
    <link href="css/timedropper.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
    <link rel="stylesheet" href="css/delete-row-style.css">


    <?php

    include 'header.php';

    ?>

    <div style="background-color: black;opacity:0.9;height: auto">

        <div style="margin-top:30%;border-radius:10px;background-color: white;box-shadow: 2px 2px 2px 2px black;width: auto;height: auto">

            <div  class="form-row" >
                <div style="margin-left: 10%" class="form-group">
                    <label for="exampleFormControlSelect1">Start Station</label>
                    <select class="form-control" id="from" style="font-size: 15px">
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
                <div  style="margin-left:10%" class="form-group">
                    <label for="exampleFormControlSelect1">End Station</label>
                    <select class="form-control" id="to" style="font-size: 15px">
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
            </div>

            <div class="form-row">
                <div style="margin-left: 10%" class="form-group">
                    <label for="exampleFormControlSelect1">Start Time</label>
                    <input type="text" id="example1" style="background-color: black;color: white;font-size: 15px">
                </div>
                <div style="margin-left: 5%" class="form-group">
                    <label for="exampleFormControlSelect1">End Time</label>
                    <input type="text" id="example2" style="background-color: black;color: white;font-size: 15px">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6" style="margin-top: 5%;margin-left: 10%">
                    <label for="from">Select Date</label>
                    <input type="date" id="date" name="somedate" style="background-color: green;font-size: 15px" min="2018-01-01"/>
                </div>
            </div>
            <div style="margin-left: 20%" class="form-row">
                <button type="button" id="btn-search" class="btn btn-outline-danger">Search</button>
            </div>

        </div>


        <div>
            <h4 style="margin-top: 5%;color: white" id="start-h"></h4>
            <table id="tb1" style="font-size: 15px;" class="table table-hover table-dark">
                <thead>
                <tr>
                    <th scope="col">Train NO</th>
                    <th scope="col">Train Name</th>
                    <th scope="col">Arrival Time</th>
                    <th scope="col">Departure Time</th>
                    <th scope="col">Type</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text" align="center" colspan="4">There are no trains you selected!</td>
                </tr>
                </tbody>
            </table>

            <h4 style="margin-top: 5%;color: white;" id="end-h"></h4>
            <table id="tb2" style="font-size: 15px;" class="table table-hover table-dark">
                <thead>
                <tr>
                    <th scope="col">Train NO</th>
                    <th scope="col">Train Name</th>
                    <th scope="col">Arival Time</th>
                    <th scope="col">Departure Time</th>
                    <th scope="col">Type</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text" align="center" colspan="4">There are no trains you selected!</td>
                </tr>
                </tbody>
            </table>

        </div>

        <div style="margin-top:3%;border-radius:10px;background-color: white;box-shadow: 2px 2px 2px 2px black;width: auto;height: auto">

            <div style="margin-left: 10%;padding-top: 3px" class="form-group">
                <label for="exampleFormControlSelect1">Train Type</label>
                <input id="trtpid" type="text" readonly style="font-size: 15px;width: 10%;border: 1px solid black;">
                </select>
            </div>
            <div style="margin-left: 10%;padding-top: 3px" class="form-group">
                <label for="exampleFormControlSelect1">Place</label>
                <input id="place" type="text" readonly style="margin-left:2.5%;font-size: 15px;width: 20%;border: 1px solid black;">
                </select>
            </div>
            <div  class="form-row" >
                <div style="margin-left: 10%" class="form-group">
                    <label for="exampleFormControlSelect1">Select Train</label>
                    <select class="form-control" id="select-train" style="font-size: 15px;border: 1px solid black;">
                    </select>
                </div>

                <div  style="margin-left:10%" class="form-group">
                    <label for="exampleFormControlSelect1">Select Class</label>
                    <select class="form-control" id="select-class" style="font-size: 15px;border: 1px solid black;">

                    </select>
                </div>
                <div  style="margin-left:10%" class="form-group">
                    <label for="exampleFormControlSelect1">Select Room</label>
                    <select class="form-control" id="select-room" style="font-size: 15px;border: 1px solid black;">

                    </select>
                </div>

                <div  style="margin-left:10%" class="form-group">
                    <label for="exampleFormControlSelect1">Select position</label>
                    <select class="form-control" id="select-position" style="font-size: 15px;border: 1px solid black;">

                    </select>
                </div>
            </div>

            <div style="margin-top: 2%;margin-left: 40%;margin-bottom: 1%" class="form-row">
                <button type="button" id="btn-add" class="btn btn-outline-info">Reserve + </button>
            </div>

        </div>
        <div id="tb-div" style="margin-top: 3%;margin-top: 3%">
            <p style="color: white" id="station-name"></p><br><p><small style="color: red;" id="time"></small></p>
            <table id="res-tb" class="table table-hover table-danger">
                <thead>
                <tr>
                    <th scope="col">Class</th>
                    <th scope="col">Room</th>
                    <th scope="col">place</th>
                    <th scope="col">position</th>
                    <th scope="col">Price</th>
                    <th id="ignoreCol" scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text1" align="center" colspan="5">There are no Reservation!</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div>
            <div class="ui left action input">
                <button class="ui teal labeled icon button">
                    <i class="cart icon"></i>
                    Checkout
                </button>
                <input type="text" id="checkout" value="0.00">
            </div>
        </div>
        <div style="margin-top: 1%;margin-left: 40%;padding-bottom: 12px">
            <button id="finish" class="ui inverted green button">Finish Reservation</button>
        </div>

    </div>


    <?php

    include 'footer.php';

    ?>



    <script src="js/reserve-controller.js"></script>

    <script src="js/timedropper.js"></script>
    <script>
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("somedate")[0].setAttribute('min', today);
    </script>
    <script>$( "#example1" ).timeDropper();</script>
    <script>$( "#example2" ).timeDropper();</script>
    <script src="/path/to/jquery-ui.min.js"></script>
    <script src="/path/to/jquery.mousewheel.js"></script>
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <!--    <script src="js/selectbox-controller.js"></script>-->
    <script src="js/schedule-controller.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>

        $("#btn-search").click(function () {

            $("#select-train").find('option').remove();

            $("#select-position").find('option').remove();

            $("#select-room").find('option').remove();

            $('#select-class').find('option').remove();

            $('#checkout').val('0.00');

            $('#res-tb tbody').empty();
            $('#res-tb tbody').append('<tr>'

                +'<td class="text1" align="center" colspan="5">'+'There are no Reservation!'+'</td>'+

            '</tr>');

            $("#place").val("");
            $("#trtpid").val("");

            var fromStation = $('#from').find(":selected").text();
            var toStation = $('#to').find(":selected").text();

            var fromTime = $("#example1").val();
            var toTime = $("#example2").val();

            var hourFromTime = parseInt(fromTime.substring(0, fromTime.indexOf(":")));
            var hourToTime = parseInt(toTime.substring(0, toTime.indexOf(":")));

            if($('#date').val()===""){
                swal("Ooops!", "You Missed the date!", "error");
            }else{
                if (hourToTime > hourFromTime) {

                    var checkFromTimeAM_PM = fromTime.substring(fromTime.indexOf(":")+4);
                    var checkToTimeAM_PM = toTime.substring(toTime.indexOf(":")+4);

                    console.log(checkFromTimeAM_PM)
                    console.log(checkToTimeAM_PM)

                    var getFromStationReq = new XMLHttpRequest();
                    getFromStationReq.onreadystatechange = function () {
                        if (getFromStationReq.status === 200 && getFromStationReq.readyState === 4) {

                            var fromSid = parseInt(getFromStationReq.responseText);
                            console.log(fromSid)

                            var getToStationReq = new XMLHttpRequest();
                            getToStationReq.onreadystatechange = function () {

                                if (getToStationReq.status === 200 && getToStationReq.readyState === 4) {

                                    var toSid = parseInt(getToStationReq.responseText);

                                    var request1 = new XMLHttpRequest();
                                    request1.onreadystatechange = function () {

                                        if (request1.status === 200 && request1.readyState === 4) {
                                            var fromObject = JSON.parse(request1.responseText);
                                            console.log('request1:'+fromObject)


                                            var request2 = new XMLHttpRequest();
                                            request2.onreadystatechange = function () {
                                                if (request2.status === 200 && request2.readyState === 4) {

                                                    var toObject = JSON.parse(request2.responseText);
                                                    console.log('part 2:'+toObject)

                                                    if (fromObject.length > 0) {
                                                        $(".text").remove();
                                                        $("#start-h").text(fromStation);

                                                        $("#tb1 tbody").empty();

                                                        for (var i = 0; i < fromObject.length; i++) {


                                                            $("#tb1 tbody").append('<tr>' +

                                                                '<td>' + fromObject[i].tid + '</td>' +
                                                                '<td>' + fromObject[i].train_name + '</td>' +
                                                                '<td style="color: green;">' + fromObject[i].arival + '</td>' +
                                                                '<td style="color: red;">' + fromObject[i].depature + '</td>' +
                                                                '<td>' + fromObject[i].name + '</td>' +

                                                                '</tr>')
                                                        }

                                                        for(var i=0;i<fromObject.length;i++){
                                                            $("#select-train").append('<option>'+fromObject[i].train_name+'</option>');
                                                        }
                                                    }

                                                    if (toObject.length > 0) {
                                                        $(".text").remove();
                                                        $("#end-h").text(toStation);

                                                        $("#tb2 tbody").empty();

                                                        for (var i = 0; i < toObject.length; i++) {

                                                            $("#tb2 tbody").append('<tr>' +

                                                                '<td>' + toObject[i].tid + '</td>' +
                                                                '<td>' + toObject[i].train_name + '</td>' +
                                                                '<td style="color: green;">' + toObject[i].arival + '</td>' +
                                                                '<td style="color: red;">' + toObject[i].depature + '</td>' +
                                                                '<td>' + toObject[i].name + '</td>' +

                                                                '</tr>');
                                                        }
                                                    }


                                                }
                                            };

                                            request2.open('GET', 'check-train.php?fromSid=' + toSid + '&fromHour=' + hourFromTime + '&toHour=' + hourToTime + '&am_pm=' + checkToTimeAM_PM, true);
                                            request2.send();

                                        }

                                    };
                                    request1.open('GET', 'check-train.php?fromSid=' + fromSid + '&fromHour=' + hourFromTime + '&toHour=' + hourToTime + '&am_pm=' + checkFromTimeAM_PM, true);
                                    request1.send();

                                }

                            };
                            getToStationReq.open('GET', 'getStation.php?sid=' + toStation, true);
                            getToStationReq.send();

                        }
                        ;
                    };
                    getFromStationReq.open('GET', 'getStation.php?sid=' + fromStation, true);
                    getFromStationReq.send();

                } else {
                    swal("Error!", "End time must be greater than start time!", "error");
                }
            }

        });

    </script>
    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="semantic/dist/semantic.min.js"></script>

    <script>

        $("#select-train").change(function () {

           var train=$("#select-train").val();

           var getTrainIdReq=new XMLHttpRequest();
           getTrainIdReq.onreadystatechange=function () {
                if(getTrainIdReq.readyState===4 && getTrainIdReq.status===200){
                    var trainId=parseInt(getTrainIdReq.responseText);

                    var getClassReq=new XMLHttpRequest();
                    getClassReq.onreadystatechange=function () {
                        if(getClassReq.status===200 && getClassReq.readyState===4){
                              var classObject=JSON.parse(getClassReq.responseText);
                              $("#select-class").find('option').remove();
                              for(var i=0;i<classObject.length;i++){
                                  $("#select-class").append('<option>'+classObject[i].name+'</option>');
                              };

                        };
                    };
                    getClassReq.open('GET','getClass.php?tid='+trainId,true);
                    getClassReq.send();


                    var cmbIndex=parseInt($("#select-train")[0].selectedIndex)+1;

                    var tid=document.getElementById("tb1").rows[cmbIndex].cells[0].innerHTML;
                    var time=document.getElementById("tb1").rows[cmbIndex].cells[2].innerHTML;
                    var type=document.getElementById("tb1").rows[cmbIndex].cells[4].innerHTML;

                    var getTrainTypeIdReq=new XMLHttpRequest();
                    getTrainTypeIdReq.onreadystatechange=function () {

                        if(getTrainTypeIdReq.status===200 && getTrainTypeIdReq.readyState===4){
                            $("#trtpid").val(getTrainTypeIdReq.responseText);
                        };

                    };
                    getTrainTypeIdReq.open('GET','getTrainTypeID.php?tid='+tid+'&time='+time+'&type='+type,true);
                    getTrainTypeIdReq.send();


                }

           };
           getTrainIdReq.open('GET','getTrainID.php?train='+train,true);
           getTrainIdReq.send();

        });

    </script>

    <script>

        $("#select-class").change(function () {

            var className=$("#select-class").val();

            var getClassIdReq=new XMLHttpRequest();
            getClassIdReq.onreadystatechange=function () {

                if(getClassIdReq.status===200 && getClassIdReq.readyState===4){

                    var clid=parseInt(getClassIdReq.responseText);
                    var trtpid=parseInt($("#trtpid").val());

                    var getRoomReq=new XMLHttpRequest();
                    getRoomReq.onreadystatechange=function () {

                        if(getRoomReq.status===200 && getRoomReq.readyState===4){
                            $("#select-room").find('option').remove();
                            var myObject=JSON.parse(getRoomReq.responseText);
                            for(var i=0;i<myObject.length;i++){
                                $("#select-room").append('<option>'+myObject[i].name+'</option>');
                            }

                            var trtpid=$("#trtpid").val();

                            var className=$("#select-class").val();

                            if(className==='1st Class'){
                                var getTrainTypeNameReq=new XMLHttpRequest();
                                getTrainTypeNameReq.onreadystatechange=function () {

                                    if(getTrainTypeNameReq.responseText==='Night Mail'){
                                        $("#place").val('Sub Room');
                                    }
                                };
                                getTrainTypeNameReq.open('GET','getTrainTypeName.php?trtpid='+trtpid,true);
                                getTrainTypeNameReq.send();
                            }else{
                                $("#place").val('Seat');
                            }

                        }
                    };
                    getRoomReq.open('GET','getRoom.php?clid='+clid+'&trtpid='+trtpid);
                    getRoomReq.send();

                };

            };
            getClassIdReq.open('GET','getClassID.php?name='+className,true);
            getClassIdReq.send();

        });

    </script>

    <script>

        $("#select-room").change(function () {

            var selectObj = document.getElementById('select-position');
            var selectParentNode = selectObj.parentNode;
            var newSelectObj = selectObj.cloneNode(false); // Make a shallow copy
            selectParentNode.replaceChild(newSelectObj, selectObj);
           // return newSelectObj;

            var room=$("#select-room").val();
            var clid=$("#select-class").val();
            var trtpid=$("#trtpid").val();
            var place=$("#place").val();

            var cmbIndex=parseInt($("#select-train")[0].selectedIndex)+1;

            var date=$("#date").val();

            for(var i=0;i<document.getElementById('tb2').rows.length;i++){
                if($("#select-train").val()===document.getElementById('tb2').rows[i].cells[1].innerHTML){
                    var train=document.getElementById('tb2').rows[i].cells[1].innerHTML;

                    var time=document.getElementById('tb2').rows[i].cells[2].innerHTML;
                    var type=document.getElementById('tb2').rows[i].cells[4].innerHTML;

                    var endVal=document.getElementById('tb2').rows[i].cells[2].innerHTML;
                    var end=parseInt(endVal.substring(0,endVal.indexOf(':')));

                    var startAM_PM=document.getElementById('tb1').rows[cmbIndex].cells[2].innerHTML;
                    var am_pm=startAM_PM.substring(startAM_PM.indexOf(':')+4);

                    var station=$('#from').val();


                    var startTimeReq=new XMLHttpRequest();
                    startTimeReq.onreadystatechange=function () {
                        if(startTimeReq.status===200 && startTimeReq.readyState===4){

                            var startVal=startTimeReq.responseText;
                            var start=parseInt(startVal.substring(0,startVal.indexOf(':')));

                            var getTrainIdReq=new XMLHttpRequest();

                            getTrainIdReq.onreadystatechange=function () {
                                if(getTrainIdReq.status===200 && getTrainIdReq.readyState===4){

                                    var tid=parseInt(getTrainIdReq.responseText);

                                    var getTrainTypeIdReq=new XMLHttpRequest();
                                    getTrainTypeIdReq.onreadystatechange=function () {
                                        if(getTrainTypeIdReq.status===200 && getTrainTypeIdReq.readyState===4){
                                            var trainTypeId=parseInt(getTrainTypeIdReq.responseText);
                                            if(parseInt($("#trtpid").val())===trainTypeId){

                                                if(place==='Seat'){

                                                    var getSidReq=new XMLHttpRequest();
                                                    getSidReq.onreadystatechange=function () {

                                                        if(getSidReq.status===200 && getSidReq.readyState===4){
                                                            if(parseInt(getSidReq.responseText)>16) {
                                                                var sid = parseInt(getSidReq.responseText) - 1;

                                                                var getAllSeatsReq = new XMLHttpRequest();
                                                                getAllSeatsReq.onreadystatechange = function () {

                                                                    if (getAllSeatsReq.status === 200 && getAllSeatsReq.readyState === 4) {

                                                                        var allSeatObject = JSON.parse(getAllSeatsReq.responseText);

                                                                        var getReservedSeatReq = new XMLHttpRequest();
                                                                        getReservedSeatReq.onreadystatechange = function () {

                                                                            if (getReservedSeatReq.status === 200 && getReservedSeatReq.readyState === 4) {

                                                                                var reservedSeatObject = JSON.parse(getReservedSeatReq.responseText);

                                                                                for (var i = 0; i < allSeatObject.length; i++) {
                                                                                    var count = 0;
                                                                                    for (var j = 0; j < reservedSeatObject.length; j++) {

                                                                                        if (allSeatObject[i].stid === reservedSeatObject[j].stid) {
                                                                                            count = count + 1;
                                                                                        }
                                                                                    }
                                                                                    if (count === 0) {
                                                                                        $('#select-position').append('<option>' + allSeatObject[i].stid + '</option>');
                                                                                    }
                                                                                }

                                                                            }
                                                                            ;
                                                                        };
                                                                        getReservedSeatReq.open('GET', 'getReservedSeats.php?sid=' + sid + '&date=' + date + '&end=' + end + '&start=' + start + '&am_pm=' + am_pm);
                                                                        getReservedSeatReq.send();

                                                                    }
                                                                    ;

                                                                };
                                                                getAllSeatsReq.open('GET', 'getAllSeats.php?clid=' + clid + '&trtpid=' + trtpid + '&room=' + room, true);
                                                                getAllSeatsReq.send();

                                                            }else if(parseInt(getSidReq.responseText)===16){

                                                                var sid = 1;

                                                                var getAllSeatsReq = new XMLHttpRequest();
                                                                getAllSeatsReq.onreadystatechange = function () {

                                                                    if (getAllSeatsReq.status === 200 && getAllSeatsReq.readyState === 4) {

                                                                        var allSeatObject = JSON.parse(getAllSeatsReq.responseText);

                                                                        var getReservedSeatReq = new XMLHttpRequest();
                                                                        getReservedSeatReq.onreadystatechange = function () {

                                                                            if (getReservedSeatReq.status === 200 && getReservedSeatReq.readyState === 4) {

                                                                                var reservedSeatObject = JSON.parse(getReservedSeatReq.responseText);

                                                                                for (var i = 0; i < allSeatObject.length; i++) {
                                                                                    var count = 0;
                                                                                    for (var j = 0; j < reservedSeatObject.length; j++) {

                                                                                        if (allSeatObject[i].stid === reservedSeatObject[j].stid) {
                                                                                            count = count + 1;
                                                                                        }
                                                                                    }
                                                                                    if (count === 0) {
                                                                                        $('#select-position').append('<option>' + allSeatObject[i].stid + '</option>');
                                                                                    }
                                                                                }

                                                                            }
                                                                            ;
                                                                        };
                                                                        getReservedSeatReq.open('GET', 'getReservedSeats.php?sid=' + sid + '&date=' + date + '&end=' + end + '&start=' + start + '&am_pm=' + am_pm);
                                                                        getReservedSeatReq.send();

                                                                    }
                                                                    ;

                                                                };
                                                                getAllSeatsReq.open('GET', 'getAllSeats.php?clid=' + clid + '&trtpid=' + trtpid + '&room=' + room, true);
                                                                getAllSeatsReq.send();

                                                            }else{

                                                                var sid=parseInt(getSidReq.responseText)+1;

                                                                var getAllSeatsReq=new XMLHttpRequest();
                                                                getAllSeatsReq.onreadystatechange=function () {

                                                                    if(getAllSeatsReq.status===200 && getAllSeatsReq.readyState===4){

                                                                        var allSeatObject=JSON.parse(getAllSeatsReq.responseText);

                                                                        var getReservedSeatReq=new XMLHttpRequest();
                                                                        getReservedSeatReq.onreadystatechange=function () {

                                                                            if(getReservedSeatReq.status===200 && getReservedSeatReq.readyState===4){

                                                                                var reservedSeatObject=JSON.parse(getReservedSeatReq.responseText);

                                                                                for(var i=0;i<allSeatObject.length;i++){
                                                                                    var count=0;
                                                                                    for(var j=0;j<reservedSeatObject.length;j++){

                                                                                        if(allSeatObject[i].stid===reservedSeatObject[j].stid){
                                                                                            count=count+1;
                                                                                        }
                                                                                    }
                                                                                    if(count===0){
                                                                                        $('#select-position').append('<option>'+allSeatObject[i].stid+'</option>');
                                                                                    }
                                                                                }

                                                                            };
                                                                        };
                                                                        getReservedSeatReq.open('GET','getReservedSeats.php?sid='+sid+'&date='+date+'&end='+end+'&start='+start+'&am_pm='+am_pm);
                                                                        getReservedSeatReq.send();

                                                                    };

                                                                };
                                                                getAllSeatsReq.open('GET','getAllSeats.php?clid='+clid+'&trtpid='+trtpid+'&room='+room,true);
                                                                getAllSeatsReq.send();

                                                            }

                                                        };


                                                    };
                                                    getSidReq.open('GET','getStation.php?sid='+station,true);
                                                    getSidReq.send();


                                                }else{

                                                    var getSidReq=new XMLHttpRequest();
                                                    getSidReq.onreadystatechange=function () {

                                                        if(getSidReq.status===200 && getSidReq.readyState===4){
                                                            if(parseInt(getSidReq.responseText)>16) {
                                                                var sid = parseInt(getSidReq.responseText) - 1;

                                                                var getAllSubRoomReq = new XMLHttpRequest();
                                                                getAllSubRoomReq.onreadystatechange = function () {

                                                                    if (getAllSubRoomReq.status === 200 && getAllSubRoomReq.readyState === 4) {

                                                                        var allSubObject = JSON.parse(getAllSubRoomReq.responseText);

                                                                        var getReservedSubReq = new XMLHttpRequest();
                                                                        getReservedSubReq.onreadystatechange = function () {

                                                                            if (getReservedSubReq.status === 200 && getReservedSubReq.readyState === 4) {

                                                                                var reservedSubObject = JSON.parse(getReservedSubReq.responseText);

                                                                                for (var i = 0; i < allSubObject.length; i++) {
                                                                                    var count = 0;
                                                                                    for (var j = 0; j < reservedSubObject.length; j++) {

                                                                                        if (allSubObject[i].srid === reservedSubObject[j].srid) {
                                                                                            count = count + 1;
                                                                                        }
                                                                                    }
                                                                                    if (count === 0) {
                                                                                        $('#select-position').append('<option>' + allSubObject[i].srid + '</option>');
                                                                                    }
                                                                                }

                                                                            }
                                                                            ;
                                                                        };
                                                                        getReservedSubReq.open('GET', 'getReservedSubRooms.php?sid=' + sid + '&date=' + date + '&end=' + end + '&start=' + start + '&am_pm=' + am_pm);
                                                                        getReservedSubReq.send();

                                                                    }
                                                                    ;

                                                                };
                                                                getAllSubRoomReq.open('GET', 'getAllSubRooms.php?clid=' + clid + '&trtpid=' + trtpid + '&room=' + room, true);
                                                                getAllSubRoomReq.send();

                                                            }else if(parseInt(getSidReq.responseText)===16){


                                                                var sid = 1;

                                                                var getAllSubRoomReq = new XMLHttpRequest();
                                                                getAllSubRoomReq.onreadystatechange = function () {

                                                                    if (getAllSubRoomReq.status === 200 && getAllSubRoomReq.readyState === 4) {

                                                                        var allSubObject = JSON.parse(getAllSubRoomReq.responseText);

                                                                        var getReservedSubReq = new XMLHttpRequest();
                                                                        getReservedSubReq.onreadystatechange = function () {

                                                                            if (getReservedSubReq.status === 200 && getReservedSubReq.readyState === 4) {

                                                                                var reservedSubObject = JSON.parse(getReservedSubReq.responseText);

                                                                                for (var i = 0; i < allSubObject.length; i++) {
                                                                                    var count = 0;
                                                                                    for (var j = 0; j < reservedSubObject.length; j++) {

                                                                                        if (allSubObject[i].srid === reservedSubObject[j].srid) {
                                                                                            count = count + 1;
                                                                                        }
                                                                                    }
                                                                                    if (count === 0) {
                                                                                        $('#select-position').append('<option>' + allSubObject[i].srid + '</option>');
                                                                                    }
                                                                                }

                                                                            }
                                                                            ;
                                                                        };
                                                                        getReservedSubReq.open('GET', 'getReservedSubRooms.php?sid=' + sid + '&date=' + date + '&end=' + end + '&start=' + start + '&am_pm=' + am_pm);
                                                                        getReservedSubReq.send();

                                                                    }
                                                                    ;

                                                                };
                                                                getAllSubRoomReq.open('GET', 'getAllSubRooms.php?clid=' + clid + '&trtpid=' + trtpid + '&room=' + room, true);
                                                                getAllSubRoomReq.send();

                                                            }else{

                                                                var sid=parseInt(getSidReq.responseText)+1;

                                                                var getAllSubRoomReq=new XMLHttpRequest();
                                                                getAllSubRoomReq.onreadystatechange=function () {

                                                                    if(getAllSubRoomReq.status===200 && getAllSubRoomReq.readyState===4){

                                                                        var allsubObject=JSON.parse(getAllSubRoomReq.responseText);

                                                                        var getReservedSubRoomReq=new XMLHttpRequest();
                                                                        getReservedSubRoomReq.onreadystatechange=function () {

                                                                            if(getReservedSubRoomReq.status===200 && getReservedSubRoomReq.readyState===4){

                                                                                var reservedSubObject=JSON.parse(getReservedSubRoomReq.responseText);

                                                                                for(var i=0;i<allsubObject.length;i++){
                                                                                    var count=0;
                                                                                    for(var j=0;j<reservedSubObject.length;j++){

                                                                                        if(allsubObject[i].srid===reservedSubObject[j].srid){
                                                                                            count=count+1;
                                                                                        }
                                                                                    }
                                                                                    if(count===0){
                                                                                        $('#select-position').append('<option>'+allsubObject[i].srid+'</option>');
                                                                                    }
                                                                                }

                                                                            };
                                                                        };
                                                                        getReservedSubRoomReq.open('GET','getReservedSubRooms.php?sid='+sid+'&date='+date+'&end='+end+'&start='+start+'&am_pm='+am_pm);
                                                                        getReservedSubRoomReq.send();

                                                                    };

                                                                };
                                                                getAllSubRoomReq.open('GET','getAllSubRooms.php?clid='+clid+'&trtpid='+trtpid+'&room='+room,true);
                                                                getAllSubRoomReq.send();

                                                            }

                                                        };


                                                    };
                                                    getSidReq.open('GET','getStation.php?sid='+station,true);
                                                    getSidReq.send();

                                                };


                                            }
                                        };
                                    };
                                    getTrainTypeIdReq.open('GET','getTrainTypeID.php?time='+time+'&type='+type+'&tid='+tid,true);
                                    getTrainTypeIdReq.send();
                                };
                            };
                            getTrainIdReq.open('GET','getTrainID.php?train='+train,true);
                            getTrainIdReq.send();

                        };
                    };
                    startTimeReq.open('GET','getTrainDepartureTime.php?trtpid='+trtpid,true);
                    startTimeReq.send();

                }
            }

        });


    </script>

    <script>

        $('#btn-add').click(function () {


            if($("#select-train").val()===null ||$("#select-class").val()===null ||$("#select-room").val()===null ||$("#select-position").val()===null ) {
                swal("Ooops!", "You must complete the selection!", "error");
            }else if($('#from').val()===$('#to').val()){
                swal("Ooops!", "You must select valid two stations!", "error");
            }else{

                $('.text1').remove();

                var getStartDistanceReq=new XMLHttpRequest();
                getStartDistanceReq.onreadystatechange=function () {

                    if(getStartDistanceReq.status===200 && getStartDistanceReq.readyState===4){

                        var start=parseFloat(getStartDistanceReq.responseText);

                        var getEndDistanceReq=new XMLHttpRequest();
                        getEndDistanceReq.onreadystatechange=function () {
                            if(getEndDistanceReq.status===200 && getEndDistanceReq.readyState===4){
                                var end=parseFloat(getEndDistanceReq.responseText);

                                if(start>end){
                                    var distance=start-end;

                                    var priceReq=new XMLHttpRequest();
                                    priceReq.onreadystatechange=function () {
                                        if(priceReq.status===200 && priceReq.readyState===4){
                                            var price=parseFloat(priceReq.responseText);
                                            var totalPrice=parseFloat(distance*price);
                                            var total=parseFloat(totalPrice);

                                            setTimeout(function () {
                                                $('#res-tb tbody tr').fadeIn(2000);
                                            },600);


                                            $('#res-tb tbody').append('<tr>'+

                                                '<td>'+$('#select-class').val()+'</td>'+
                                                '<td>'+$('#select-room').val()+'</td>'+
                                                '<td>'+$('#place').val()+'</td>'+
                                                '<td>'+$('#select-position').val()+'</td>'+
                                                '<td>'+total+'</td>'+
                                                '<td>'+'<div class=recycle></div>'+'</td>'+

                                                +'</tr>');

                                            var lastTotal=parseFloat($('#checkout').val());
                                            var newTotal=lastTotal+total;

                                            $('#checkout').val(parseFloat(newTotal));


                                            $("#station-name").text($("#from").val()+' from '+$("#to").val()+' Reservation');
                                            $("#time").text($("#example1").val()+' from '+$("#example2").val());

                                        };
                                    };
                                    priceReq.open('GET','getClassPrice.php?clid='+$('#select-class').val().substring(0,1),true);
                                    priceReq.send();

                                }else{
                                    var distance=end-start;

                                    var priceReq=new XMLHttpRequest();
                                    priceReq.onreadystatechange=function () {
                                        if(priceReq.status===200 && priceReq.readyState===4){
                                            var price=priceReq.responseText;
                                            var total=distance*price;

                                            setTimeout(function () {
                                                $('#res-tb tbody tr').fadeIn(2000);
                                            },600);

                                            $('#res-tb tbody').append('<tr>'+

                                                '<td>'+$('#select-class').val()+'</td>'+
                                                '<td>'+$('#select-room').val()+'</td>'+
                                                '<td>'+$('#place').val()+'</td>'+
                                                '<td>'+$('#select-position').val()+'</td>'+
                                                '<td>'+total+'</td>'+
                                                '<td>'+'<div class=recycle></div>'+'</td>'+

                                                +'</tr>');

                                            var lastTotal=parseFloat($('#checkout').val());
                                            var newTotal=lastTotal+total;

                                            $('#checkout').val(parseFloat(newTotal));

                                        };
                                    };
                                    priceReq.open('GET','getClassPrice.php?clid='+$('#select-class').val().substring(0,1),true);
                                    priceReq.send();
                                }
                            }
                        };
                        getEndDistanceReq.open('GET','getDistance.php?name='+$('#to').val(),true);
                        getEndDistanceReq.send();
                    }

                };
                getStartDistanceReq.open('GET','getDistance.php?name='+$('#from').val(),true);
                getStartDistanceReq.send();

            }

        });

    </script>

    <script>
        $("#res-tb").on("click",".recycle",function(){

            //console.log($(this).parents("tr").children('td:nth-child(4)').val())
            var price=($(this).parents("tr").children('td:nth-child(4)').val());

            console.log(price)
            $(this).parents("tr").remove();

            var lastTotal=($('#checkout').val());
            lastTotal=0;
            var newTotal=lastTotal+price;

            console.log(newTotal);
            $('#checkout').val(0);
            $('#checkout').val(newTotal);


            if(document.getElementById('res-tb').rows.length===1){

                document.getElementById('res-tb tbody').append('<tr>'+

                    '<td class="text1" colspan="5" align="center">'+'There are no Reservation!'+'</td>'

                    +'</tr>');
            };
        });
    </script>

<!--    <script src="js/jspdf.js"></script>-->
<!--    <script src="js/from_html.js"></script>-->
<!--    <script src="js/standard_fonts_metrics.js"></script>-->
<!--    <script src="js/split_text_to_size.js"></script>-->
<!--    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
    <script>

        $("#finish").click(function () {

            var payment=parseFloat($('#checkout').val());
            var date=$("#date").val();

            var getStartTimeReq=new XMLHttpRequest();
            getStartTimeReq.onreadystatechange=function () {

                if(getStartTimeReq.status===200 && getStartTimeReq.readyState===4){

                    var startTime=getStartTimeReq.responseText;
                    var start=parseInt(startTime.substring(0,startTime.indexOf(":")));
                    var am_pm=startTime.substring(startTime.indexOf(":")+4);

                    var getToTimeReq=new XMLHttpRequest();
                    getToTimeReq.onreadystatechange=function () {

                        if(getToTimeReq.status===200 && getToTimeReq.readyState===4){

                            var endTime=getToTimeReq.responseText;
                            var end=parseInt(endTime.substring(0,endTime.indexOf(":")));

                            var seatObject=new Array();
                            var rows=$('#res-tb').find('tbody').find('tr');
                            for(var i=1;i<rows.length;i++){
                                seatObject.push({

                                    stid:$(rows[i]).find('td:eq(3)').html()

                                });
                            }
                            var jsSeatObject=JSON.stringify(seatObject);

                            var startStationId=new XMLHttpRequest();
                            startStationId.onreadystatechange=function () {
                                if(startStationId.status===200 && startStationId.readyState===4){

                                    var startSid=parseInt(startStationId.responseText);

                                    var endStationId=new XMLHttpRequest();

                                    endStationId.onreadystatechange=function () {
                                        if(endStationId.status===200 && endStationId.readyState===4){

                                            var endSid=parseInt(endStationId.responseText);

                                            if(startSid>endSid && startSid>=16 && endSid>=16){

                                                var getStationsReq=new XMLHttpRequest();
                                                getStationsReq.onreadystatechange=function () {
                                                    if(getStationsReq.status===200 && getStationsReq.readyState===4){

                                                        var stOb=JSON.parse(getStationsReq.responseText);

                                                        var stationObject=new Array();
                                                        for(var i=0;i<stOb.length;i++){
                                                            stationObject.push({
                                                                statID:stOb[i].sid
                                                            });
                                                        }
                                                        var jsStationObject=JSON.stringify(stationObject);

                                                        var bookingReq=new XMLHttpRequest();
                                                        bookingReq.onreadystatechange=function () {
                                                            if(bookingReq.status===200 && bookingReq.readyState===4){

                                                                if(bookingReq.responseText==='Success'){
                                                                    swal("Nice Work!", "Reserved Successfully!", "success");
                                                                    demoFromHTML();
                                                                    clearAll();
                                                                }else{
                                                                    swal("Ooops!", "Something went wrong!", "error");
                                                                    clearAll();
                                                                }

                                                            };
                                                        };
                                                        bookingReq.open('GET','booking.php?date='+date+'&start='+start+'&end='+end+'&payment='+payment+'&jsSeatObject='+jsSeatObject+'&jsStationObject='+jsStationObject+'&am_pm='+am_pm,true);
                                                        bookingReq.send();


                                                    }
                                                };
                                                getStationsReq.open('GET','getBookedStations.php?start='+endSid+'&end='+startSid+'&trtpid='+$("#trtpid").val(),true);
                                                getStationsReq.send();

                                            }else if(startSid<endSid && startSid>=16 && endSid>=16){

                                                var getStationsReq=new XMLHttpRequest();
                                                getStationsReq.onreadystatechange=function () {
                                                    if(getStationsReq.status===200 && getStationsReq.readyState===4){

                                                        var stOb=JSON.parse(getStationsReq.responseText);

                                                        var stationObject=new Array();
                                                        for(var i=0;i<stOb.length;i++){
                                                            stationObject.push({
                                                                statID:stOb[i].sid
                                                            });
                                                        }
                                                        var jsStationObject=JSON.stringify(stationObject);

                                                        var bookingReq=new XMLHttpRequest();
                                                        bookingReq.onreadystatechange=function () {
                                                            if(bookingReq.status===200 && bookingReq.readyState===4){

                                                                if(bookingReq.responseText==='Success'){
                                                                    swal("Nice Work!", "Reserved Successfully!", "success");
                                                                    demoFromHTML();
                                                                    clearAll();
                                                                }else{
                                                                    swal("Ooops!", "Something went wrong!", "error");
                                                                    clearAll();
                                                                }

                                                            };
                                                        };
                                                        bookingReq.open('GET','booking.php?date='+date+'&start='+start+'&end='+end+'&payment='+payment+'&jsSeatObject='+jsSeatObject+'&jsStationObject='+jsStationObject+'&am_pm='+am_pm,true);
                                                        bookingReq.send();
                                                    }
                                                };
                                                getStationsReq.open('GET','getBookedStations.php?start='+startSid+'&end='+endSid+'&trtpid='+$("#trtpid").val(),true);
                                                getStationsReq.send();

                                            }else if(startSid>endSid && startSid<16 && endSid<16){

                                                var getStationsReq=new XMLHttpRequest();
                                                getStationsReq.onreadystatechange=function () {
                                                    if(getStationsReq.status===200 && getStationsReq.readyState===4){

                                                        var stOb=JSON.parse(getStationsReq.responseText);

                                                        var stationObject=new Array();
                                                        for(var i=0;i<stOb.length;i++){
                                                            stationObject.push({
                                                                statID:stOb[i].sid
                                                            });
                                                        }
                                                        var jsStationObject=JSON.stringify(stationObject);

                                                        var bookingReq=new XMLHttpRequest();
                                                        bookingReq.onreadystatechange=function () {
                                                            if(bookingReq.status===200 && bookingReq.readyState===4){

                                                                if(bookingReq.responseText==='Success'){
                                                                    swal("Nice Work!", "Reserved Successfully!", "success");
                                                                    demoFromHTML();
                                                                    clearAll();
                                                                }else{
                                                                    swal("Ooops!", "Something went wrong!", "error");
                                                                    clearAll();
                                                                }

                                                            };
                                                        };
                                                        bookingReq.open('GET','booking.php?date='+date+'&start='+start+'&end='+end+'&payment='+payment+'&jsSeatObject='+jsSeatObject+'&jsStationObject='+jsStationObject+'&am_pm='+am_pm,true);
                                                        bookingReq.send();
                                                    }
                                                };
                                                getStationsReq.open('GET','getBookedStations.php?start='+endSid+'&end='+startSid+'&trtpid='+$("#trtpid").val(),true);
                                                getStationsReq.send();

                                            }else if(startSid<endSid && startSid<16 && endSid<16){

                                                var getStationsReq=new XMLHttpRequest();
                                                getStationsReq.onreadystatechange=function () {
                                                    if(getStationsReq.status===200 && getStationsReq.readyState===4){

                                                        var stOb=JSON.parse(getStationsReq.responseText);

                                                        var stationObject=new Array();
                                                        for(var i=0;i<stOb.length;i++){
                                                            stationObject.push({
                                                                statID:stOb[i].sid
                                                            });
                                                        }
                                                        var jsStationObject=JSON.stringify(stationObject);

                                                        var bookingReq=new XMLHttpRequest();
                                                        bookingReq.onreadystatechange=function () {
                                                            if(bookingReq.status===200 && bookingReq.readyState===4){

                                                                if(bookingReq.responseText==='Success'){
                                                                    swal("Nice Work!", "Reserved Successfully!", "success");
                                                                    demoFromHTML();
                                                                    clearAll();
                                                                }else{
                                                                    swal("Ooops!", "Something went wrong!", "error");
                                                                    clearAll();
                                                                }

                                                            };
                                                        };
                                                        bookingReq.open('GET','booking.php?date='+date+'&start='+start+'&end='+end+'&payment='+payment+'&jsSeatObject='+jsSeatObject+'&jsStationObject='+jsStationObject+'&am_pm='+am_pm,true);
                                                        bookingReq.send();
                                                    }
                                                };
                                                getStationsReq.open('GET','getBookedStations.php?start='+startSid+'&end='+endSid+'&trtpid='+$("#trtpid").val(),true);
                                                getStationsReq.send();

                                            }else if(startSid>=16){
                                                var getStationsReq=new XMLHttpRequest();
                                                getStationsReq.onreadystatechange=function () {
                                                    if(getStationsReq.status===200 && getStationsReq.readyState===4){

                                                        var stOb=JSON.parse(getStationsReq.responseText);

                                                        var stationObject=new Array();

                                                        for(var i=0;i<stOb.length;i++){
                                                            stationObject.push({
                                                                statID:stOb[i].sid
                                                            });
                                                        }

                                                        var getStationsReq1=new XMLHttpRequest();
                                                        getStationsReq1.onreadystatechange=function () {
                                                            if(getStationsReq1.status===200 && getStationsReq1.readyState===4){

                                                                var stOb=JSON.parse(getStationsReq1.responseText);

                                                                for(var i=0;i<stOb.length;i++){
                                                                    stationObject.push({
                                                                        statID:stOb[i].sid
                                                                    });
                                                                }


                                                                var jsStationObject=JSON.stringify(stationObject);

                                                                var bookingReq=new XMLHttpRequest();
                                                                bookingReq.onreadystatechange=function () {
                                                                    if(bookingReq.status===200 && bookingReq.readyState===4){

                                                                        if(bookingReq.responseText==='Success'){
                                                                            swal("Nice Work!", "Reserved Successfully!", "success");
                                                                            demoFromHTML();
                                                                            clearAll();
                                                                        }else{
                                                                            swal("Ooops!", "Something went wrong!", "error");
                                                                            clearAll();
                                                                        }

                                                                    };
                                                                };
                                                                bookingReq.open('GET','booking.php?date='+date+'&start='+start+'&end='+end+'&payment='+payment+'&jsSeatObject='+jsSeatObject+'&jsStationObject='+jsStationObject+'&am_pm='+am_pm,true);
                                                                bookingReq.send();


                                                            }
                                                        };
                                                        getStationsReq1.open('GET','getBookedStations.php?start=1&end='+endSid+'&trtpid='+$("#trtpid").val(),true);
                                                        getStationsReq1.send();

                                                    }
                                                };
                                                getStationsReq.open('GET','getBookedStations.php?start=16&end='+startSid+'&trtpid='+$("#trtpid").val(),true);
                                                getStationsReq.send();

                                            }else if(endSid>=16){

                                                var getStationsReq=new XMLHttpRequest();
                                                getStationsReq.onreadystatechange=function () {
                                                    if(getStationsReq.status===200 && getStationsReq.readyState===4){

                                                        var stOb=JSON.parse(getStationsReq.responseText);

                                                        var stationObject=new Array();
                                                        for(var i=0;i<stOb.length;i++){
                                                            stationObject.push({
                                                                statID:stOb[i].sid
                                                            });
                                                        }

                                                        var getStationsReq1=new XMLHttpRequest();
                                                        getStationsReq1.onreadystatechange=function () {
                                                            if(getStationsReq1.status===200 && getStationsReq1.readyState===4){

                                                                var stOb=JSON.parse(getStationsReq1.responseText);

                                                                for(var i=0;i<stOb.length;i++){
                                                                    stationObject.push({
                                                                        statID:stOb[i].sid
                                                                    });
                                                                }

                                                                var jsStationObject=JSON.stringify(stationObject);

                                                                var bookingReq=new XMLHttpRequest();
                                                                bookingReq.onreadystatechange=function () {
                                                                    if(bookingReq.status===200 && bookingReq.readyState===4){

                                                                        if(bookingReq.responseText==='Success'){
                                                                            swal("Nice Work!", "Reserved Successfully!", "success");
                                                                            demoFromHTML();
                                                                            clearAll();
                                                                        }else{
                                                                            swal("Ooops!", "Something went wrong!", "error");
                                                                            clearAll();
                                                                        }

                                                                    };
                                                                };
                                                                bookingReq.open('GET','booking.php?date='+date+'&start='+start+'&end='+end+'&payment='+payment+'&jsSeatObject='+jsSeatObject+'&jsStationObject='+jsStationObject+'&am_pm='+am_pm,true);
                                                                bookingReq.send();

                                                            }
                                                        };
                                                        getStationsReq1.open('GET','getBookedStations.php?start=1&end='+startSid+'&trtpid='+$("#trtpid").val(),true);
                                                        getStationsReq1.send();

                                                    }
                                                };
                                                getStationsReq.open('GET','getBookedStations.php?start=16&end='+endSid+'&trtpid='+$("#trtpid").val(),true);
                                                getStationsReq.send();

                                            }else if(startSid<16){
                                                var getStationsReq=new XMLHttpRequest();
                                                getStationsReq.onreadystatechange=function () {
                                                    if(getStationsReq.status===200 && getStationsReq.readyState===4){

                                                        var stOb=JSON.parse(getStationsReq.responseText);

                                                        var stationObject=new Array();
                                                        for(var i=0;i<stOb.length;i++){
                                                            stationObject.push({
                                                                statID:stOb[i].sid
                                                            });
                                                        }

                                                        var getStationsReq1=new XMLHttpRequest();
                                                        getStationsReq1.onreadystatechange=function () {
                                                            if(getStationsReq1.status===200 && getStationsReq1.readyState===4){

                                                                var stOb=JSON.parse(getStationsReq1.responseText);

                                                                for(var i=0;i<stOb.length;i++){
                                                                    stationObject.push({
                                                                        statID:stOb[i].sid
                                                                    });
                                                                }

                                                                var jsStationObject=JSON.stringify(stationObject);

                                                                var bookingReq=new XMLHttpRequest();
                                                                bookingReq.onreadystatechange=function () {
                                                                    if(bookingReq.status===200 && bookingReq.readyState===4){

                                                                        if(bookingReq.responseText==='Success'){
                                                                            swal("Nice Work!", "Reserved Successfully!", "success");
                                                                            demoFromHTML();
                                                                            clearAll();
                                                                        }else{
                                                                            swal("Ooops!", "Something went wrong!", "error");
                                                                            clearAll();
                                                                        }

                                                                    };
                                                                };
                                                                bookingReq.open('GET','booking.php?date='+date+'&start='+start+'&end='+end+'&payment='+payment+'&jsSeatObject='+jsSeatObject+'&jsStationObject='+jsStationObject+'&am_pm='+am_pm,true);
                                                                bookingReq.send();

                                                            }
                                                        };
                                                        getStationsReq1.open('GET','getBookedStations.php?start=16&end='+endSid+'&trtpid='+$("#trtpid").val(),true);
                                                        getStationsReq1.send();

                                                    }
                                                };
                                                getStationsReq.open('GET','getBookedStations.php?start=1&end='+startSid+'&trtpid='+$("#trtpid").val(),true);
                                                getStationsReq.send();

                                            }else if(endSid<16){

                                                var getStationsReq=new XMLHttpRequest();
                                                getStationsReq.onreadystatechange=function () {
                                                    if(getStationsReq.status===200 && getStationsReq.readyState===4){

                                                        var stOb=JSON.parse(getStationsReq.responseText);

                                                        var stationObject=new Array();
                                                        for(var i=0;i<stOb.length;i++){
                                                            stationObject.push({
                                                                statID:stOb[i].sid
                                                            });
                                                        }

                                                        var getStationsReq1=new XMLHttpRequest();
                                                        getStationsReq1.onreadystatechange=function () {
                                                            if(getStationsReq1.status===200 && getStationsReq1.readyState===4){

                                                                var stOb=JSON.parse(getStationsReq1.responseText);

                                                                for(var i=0;i<stOb.length;i++){
                                                                    stationObject.push({
                                                                        statID:stOb[i].sid
                                                                    });
                                                                }

                                                                var jsStationObject=JSON.stringify(stationObject);

                                                                var bookingReq=new XMLHttpRequest();
                                                                bookingReq.onreadystatechange=function () {
                                                                    if(bookingReq.status===200 && bookingReq.readyState===4){

                                                                        if(bookingReq.responseText==='Success'){
                                                                            swal("Nice Work!", "Reserved Successfully!", "success");
                                                                            demoFromHTML();
                                                                            clearAll();
                                                                        }else{
                                                                            swal("Ooops!", "Something went wrong!", "error");
                                                                            clearAll();
                                                                        }

                                                                    };
                                                                };
                                                                bookingReq.open('GET','booking.php?date='+date+'&start='+start+'&end='+end+'&payment='+payment+'&jsSeatObject='+jsSeatObject+'&jsStationObject='+jsStationObject+'&am_pm='+am_pm,true);
                                                                bookingReq.send();
                                                            }
                                                        };
                                                        getStationsReq1.open('GET','getBookedStations.php?start=16&end='+startSid+'&trtpid='+$("#trtpid").val(),true);
                                                        getStationsReq1.send();

                                                    }
                                                };
                                                getStationsReq.open('GET','getBookedStations.php?start=1&end='+endSid+'&trtpid='+$("#trtpid").val(),true);
                                                getStationsReq.send();

                                            }
                                        };
                                    };
                                    endStationId.open('GET','getStation.php?sid='+$("#to").val(),true);
                                    endStationId.send();

                                };
                            };
                            startStationId.open('GET','getStation.php?sid='+$("#from").val(),true);
                            startStationId.send();


                        }
                    };
                    getToTimeReq.open('GET','getTime.php?trtpid='+$("#trtpid").val()+'&name='+$("#from").val(),true);
                    getToTimeReq.send();
                }
            };
            getStartTimeReq.open('GET','getTime.php?trtpid='+$("#trtpid").val()+'&name='+$("#from").val(),true);
            getStartTimeReq.send();
        });


        function demoFromHTML() {
            var pdf = new jsPDF('p', 'pt', 'letter');
            // source can be HTML-formatted string, or a reference
            // to an actual DOM element from which the text will be scraped.
            source = $('#tb-div').get(0);

            // we support special element handlers. Register them with jQuery-style
            // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
            // There is no support for any other type of selectors
            // (class, of compound) at this time.
            specialElementHandlers = {
                // element with id of "bypass" - jQuery style selector
                '#ignoreCol': function (element, renderer) {
                    // true = "handled elsewhere, bypass text extraction"
                    return true
                }
            };
            margins = {
                top: 80,
                bottom: 60,
                left: 10,
                width: 700
            };
            // all coords and widths are in jsPDF instance's declared units
            // 'inches' in this case
            pdf.fromHTML(
                source, // HTML string or DOM elem ref.
                margins.left, // x coord
                margins.top, { // y coord
                    'width': margins.width, // max width of content on PDF
                    'elementHandlers': specialElementHandlers
                },

                function (dispose) {
                    // dispose: object with X, Y of the last line add to the PDF
                    //          this allow the insertion of new lines after html
                    pdf.save('Test.pdf');
                }, margins);
        }

        function clearAll() {
            $("#select-train").find('option').remove();

            $("#select-position").find('option').remove();

            $("#select-room").find('option').remove();

            $('#select-class').find('option').remove();

            $('#checkout').val('0.00');

            $('#res-tb tbody').empty();
            $('#res-tb tbody').append('<tr>'

                +'<td class="text1" align="center" colspan="5">'+'There are no Reservation!'+'</td>'+

                '</tr>');


            $('#tb2 tbody').empty();
            $('#tb2 tbody').append('<tr>'

                +'<td class="text" align="center" colspan="5">'+'There are no Trains!'+'</td>'+

                '</tr>');

            $('#tb1 tbody').empty();
            $('#tb1 tbody').append('<tr>'

                +'<td class="text" align="center" colspan="5">'+'There are no Trains!'+'</td>'+

                '</tr>');

            $("#place").val("");
            $("#trtpid").val("");
        }



    </script>


    </body>
</html>



</body>
</html>

