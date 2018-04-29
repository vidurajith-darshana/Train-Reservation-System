<?php

session_start();

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <style>
        @import url(http://fonts.googleapis.com/css?family=roboto);

        /* reset */

        html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline
        }

        article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block }

        body { line-height: 1 }

        ol, ul { list-style: none }

        blockquote, q { quotes: none }

        blockquote:before, blockquote:after, q:before, q:after {
            content: '';
            content: none
        }

        table {
            border-collapse: collapse;
            border-spacing: 0
        }

        /* core css */

        html, body { overflow: hidden; }

        .background {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            overflow: hidden;
            will-change: transform;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            height: 130vh;
            position: fixed;
            width: 100%;
            -webkit-transform: translateY(20vh);
            -ms-transform: translateY(20vh);
            transform: translateY(20vh);
            -webkit-transition: all 1.4s cubic-bezier(0.22, 0.44, 0, 1);
            transition: all 1.4s cubic-bezier(0.22, 0.44, 0, 1);
        }

        .background:before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.3);
        }

        .background:first-child {
            background-image: url(http://visualexpress.de/wp/wp-content/uploads/ICE-3-01-final1.jpg);
            -webkit-transform: translateY(-10vh);
            -ms-transform: translateY(-10vh);
            transform: translateY(-10vh);
        }

        .background:first-child .content-wrapper {
            -webkit-transform: translateY(10vh);
            -ms-transform: translateY(10vh);
            transform: translateY(10vh);
        }

        .background:nth-child(2) { background-image: url(https://unsplash.it/2928/2264?image=425); }

        .background:nth-child(3) { background-image: url(https://unsplash.it/2928/2264?image=525); }

        /* Set stacking context of slides */

        .background:nth-child(1) { z-index: 2; }

        .background:nth-child(2) { z-index: 1; }

        .content-wrapper {
            height: 100vh;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            -webkit-flex-flow: column nowrap;
            -ms-flex-flow: column nowrap;
            flex-flow: column nowrap;
            color: #fff;
            font-family: Montserrat;
            text-transform: uppercase;
            -webkit-transform: translateY(40vh);
            -ms-transform: translateY(40vh);
            transform: translateY(40vh);
            will-change: transform;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transition: all 1.9s cubic-bezier(0.22, 0.44, 0, 1);
            transition: all 1.9s cubic-bezier(0.22, 0.44, 0, 1);
        }

        .content-title {
            font-size: 12vh;
            line-height: 1.4;
        }
    </style>
</head>

<body>

<div class="container">

    <section class="background">
        <div class="content-wrapper">
            <p class="content-title">Train Management</p>
            <div class="col-sm-10" style="background-color: black;opacity: 0.85;height: 40%;border: 1px solid white">

                <div>

                    <form  action="upload.php" method="post" enctype="multipart/form-data">
                        Select image to upload:
                        <input type="file" name="image" onchange="previewFile()"><br>
                        <img height="200px" src=<?php

                            if(isset($_SESSION['fileName'])){
                                echo 'image/pic/'.$_SESSION['fileName'];
                            }else{
                                echo "";
                            }

                        ?> >
                        <input type="submit" value="Upload Image" name="submit">
                    </form>

                    <form id="train-form" style="margin-top: 3%">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Train Name</label>
                            <input name="train" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                            <small id="emailHelp" class="form-text text-muted">You can change the name of train in update section.</small>
                        </div>

                        <button id="reg-train" type="Button" class="btn btn-primary">Register Train</button>
                    </form>

                </div>

            </div>

        </div>
    </section>
    <section class="background">
        <div class="content-wrapper">
            <p class="content-title">Train Schedules</p>
        </div>
    </section>
    <section class="background">
        <div class="content-wrapper">
            <p class="content-title">Train room Management</p>

        </div>
    </section>

</div>
<div style="position: absolute;margin-left: 3%;margin-top: 3%">
    <a class="btn btn-dark" href="index.php" role="button">Log Out</a>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.10.1/lodash.min.js'></script>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
    var ticking = false;
    var isFirefox = /Firefox/i.test(navigator.userAgent);
    var isIe = /MSIE/i.test(navigator.userAgent) || /Trident.*rv\:11\./i.test(navigator.userAgent);
    var scrollSensitivitySetting = 30;
    var slideDurationSetting = 800;
    var currentSlideNumber = 0;
    var totalSlideNumber = $('.background').length;
    function parallaxScroll(evt) {
        if (isFirefox) {
            delta = evt.detail * -120;
        } else if (isIe) {
            delta = -evt.deltaY;
        } else {
            delta = evt.wheelDelta;
        }
        if (ticking != true) {
            if (delta <= -scrollSensitivitySetting) {
                ticking = true;
                if (currentSlideNumber !== totalSlideNumber - 1) {
                    currentSlideNumber++;
                    nextItem();
                }
                slideDurationTimeout(slideDurationSetting);
            }
            if (delta >= scrollSensitivitySetting) {
                ticking = true;
                if (currentSlideNumber !== 0) {
                    currentSlideNumber--;
                }
                previousItem();
                slideDurationTimeout(slideDurationSetting);
            }
        }
    }
    function slideDurationTimeout(slideDuration) {
        setTimeout(function () {
            ticking = false;
        }, slideDuration);
    }
    var mousewheelEvent = isFirefox ? 'DOMMouseScroll' : 'wheel';
    window.addEventListener(mousewheelEvent, _.throttle(parallaxScroll, 60), false);
    function nextItem() {
        var $previousSlide = $('.background').eq(currentSlideNumber - 1);
        $previousSlide.css('transform', 'translate3d(0,-130vh,0)').find('.content-wrapper').css('transform', 'translateY(40vh)');
        currentSlideTransition();
    }
    function previousItem() {
        var $previousSlide = $('.background').eq(currentSlideNumber + 1);
        $previousSlide.css('transform', 'translate3d(0,30vh,0)').find('.content-wrapper').css('transform', 'translateY(30vh)');
        currentSlideTransition();
    }
    function currentSlideTransition() {
        var $currentSlide = $('.background').eq(currentSlideNumber);
        $currentSlide.css('transform', 'translate3d(0,-15vh,0)').find('.content-wrapper').css('transform', 'translateY(15vh)');
        ;
    }

</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="js/admin-controller.js"></script>
</body>
</html>
