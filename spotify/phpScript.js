
var key;

$(document).ready(function(){
    $('.btn').click(function(){
        var thisButton = $(this).val()
        console.log("Called");
        $.ajax({
            type: "POST",
            url: "apiServer.php",
            data: {"action": thisButton,
                    "key": key}
        }).done(function(msg){
            if (thisButton == "refresh"){
                key = msg;
            }
            console.log(msg);
        });
    });
});

