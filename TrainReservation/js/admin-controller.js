
function previewFile() {
    var preview = document.querySelector('img');
    var file    = document.querySelector('input[type=file]').files[0];
    var reader  = new FileReader();

    reader.addEventListener("load", function () {
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}

$("#reg-train").click(function () {

    var getLastTrainID=new XMLHttpRequest();

    getLastTrainID.onreadystatechange=function () {
        if(getLastTrainID.status===200 && getLastTrainID.readyState===4){
            var tid=parseInt(getLastTrainID.responseText)+1;
            var lastTid=tid+$('input[type=file]').val().substring($("input[type=file]").val().indexOf('.'));

            var request=new XMLHttpRequest();
            request.onreadystatechange=function () {

                if(request.readyState===4 && request.status===200){

                    if(request.responseText==='success'){
                        swal("Nice Work!", "Train Registration Success!", "success");
                    }else{
                        swal("Nice Work!", "Train Registration Success!", "success");
                    }

                }

            };

            var form=$('#train-form').serializeArray();
            var json=JSON.stringify(form);
            request.open('POST','reg-train.php?tid='+lastTid,true);
          // request.setRequestHeader('Content-type','multipart/form-data');
            request.send(json);

        }

    };

    getLastTrainID.open('GET','getLastTrainID.php',true);
    getLastTrainID.send();



});