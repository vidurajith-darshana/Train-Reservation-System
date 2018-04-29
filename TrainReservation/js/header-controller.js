$(document).ready(function(){
    var x=0;
    $(window).scroll(function(){

        if($(window).scrollTop()<600){

            $("#menu-bar").css("opacity","0");
            $("#menu-bar").css("");

        }else if($(window).scrollTop()>600){
            $("#menu-bar").css("opacity","1");

        }
    });
});


