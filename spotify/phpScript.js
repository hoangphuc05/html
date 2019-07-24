
var clientID = "2269303b42ef413ba8b81796f763762e";
var client = "9b1a13a57aa0440b8452904ee80ea029";

function getKey(){
    var params = $.param({
        client_id: clientID,
            response_type: "token",
            redirect_uri: "http://hphucs.ddns.net/spotify/spotifyChange.php",
            scope: "user-modify-playback-state user-read-playback-state"
    });
    window.location = "https://accounts.spotify.com/authorize?"+params;
    
    //var params = getSearchParameters();
    //console.log(params['access_token']);
    //return params['access_token'];
}

function userInfo(accessToken){
    $.ajax({
        url: 'https://api.spotify.com/v1/me',
        headers: {
            'Authorization': 'Bearer ' + accessToken
        },
        success: function(response) {
            return response;
        }
})
}



$(document).ready(function(){
    if(window.location.hash.substr(1) != ""){
        key = getSearchParameters()['access_token'];
        console.log(key);
    }
    $('.btnphp').click(function(){
        var thisButton = $(this).val();
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

    $('.btnjs').click(function(){
        var thisButton = $(this).val();
        if (thisButton == 'refreshjs'){
            getKey();
        }
    })
});

