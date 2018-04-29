<?php

$connection=mysqli_connect('localhost','root','vidura','train_reservation');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Train Schedule</title>
    <link rel="stylesheet" href="css/schedule-style.css">
<!--    <link rel="stylesheet" href="css/selectbox-style.css">-->
    <link rel="stylesheet" href="css/reserve-drop-style.css">
<!--    <link rel="stylesheet" href="css/selectbox-style.css">-->
    <link rel="stylesheet" href="http://codepen.io/username/pen/aBcDef">
    <link href="css/timedropper.css" rel="stylesheet">
<?php

include 'header.php';

?>

    <div style="background-color: gray;height: auto">

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
            <h4 style="margin-top: 5%;" id="start-h"></h4>
            <table id="tb1" style="font-size: 15px;" class="table table-hover table-dark">
                <thead>
                <tr>
                    <th scope="col">Train NO</th>
                    <th scope="col">Train Name</th>
                    <th scope="col">Arrival Time</th>
                    <th scope="col">Departure Time</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text" align="center" colspan="4">There are no trains you selected!</td>
                </tr>
                </tbody>
            </table>

            <h4 style="margin-top: 5%" id="end-h"></h4>
            <table id="tb2" style="font-size: 15px;" class="table table-hover table-dark">
                <thead>
                <tr>
                    <th scope="col">Train NO</th>
                    <th scope="col">Train Name</th>
                    <th scope="col">Arival Time</th>
                    <th scope="col">Departure Time</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text" align="center" colspan="4">There are no trains you selected!</td>
                </tr>
                </tbody>
            </table>

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

            var fromStation = $('#from').find(":selected").text();
            var toStation = $('#to').find(":selected").text();

            var fromTime = $("#example1").val();
            var toTime = $("#example2").val();

            var hourFromTime = parseInt(fromTime.substring(0, fromTime.indexOf(":")));
            var hourToTime = parseInt(toTime.substring(0, toTime.indexOf(":")));


            console.log(hourFromTime)
            console.log(hourToTime)

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

                                                    $('#tb1 tbody').empty();

                                                    for (var i = 0; i < fromObject.length; i++) {
                                                        $("#tb1 tbody").append('<tr>' +

                                                            '<td>' + fromObject[i].tid + '</td>' +
                                                            '<td>' + fromObject[i].train_name + '</td>' +
                                                            '<td style="color: green;">' + fromObject[i].arival + '</td>' +
                                                            '<td style="color: red;">' + fromObject[i].depature + '</td>' +

                                                            '</tr>')
                                                    }
                                                }

                                                if (toObject.length > 0) {
                                                    $(".text").remove();
                                                    $("#end-h").text(toStation);
                                                    $('#tb2 tbody').empty();

                                                    for (var i = 0; i < toObject.length; i++) {
                                                        $("#tb2 tbody").append('<tr>' +

                                                            '<td>' + toObject[i].tid + '</td>' +
                                                            '<td>' + toObject[i].train_name + '</td>' +
                                                            '<td style="color: green;">' + toObject[i].arival + '</td>' +
                                                            '<td style="color: red;">' + toObject[i].depature + '</td>' +

                                                            '</tr>')
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
        });

    </script>
    </body>
</html>

