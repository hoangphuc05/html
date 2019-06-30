

var URLToken = "https://accounts.spotify.com/api/token";
var URLapi = "https://api.spotify.com/v1/me";
var URLDebug = "https://hookb.in/qB3b6b2YOpUrBrJjaxyq"

var clientID = "17e0bdac640c48a39849fa7e28a7fd97";
var clientSecret = "2498d0468ec04db38e551b19c0e79229";

var authoCode = "AQAOSWPILPQhLrn-gFtFdQ_vbbbCcDoMoQ0a-wKwM5LR7aEjCCancKqFTp4m93Apq1LtDW-2jkxyobFjTK75S1MoWtjoGgSE1aMof56y3laPM4rl0r0fhBgISuqG5SI4fJ0gHwdTYmJNmXlbpmXxUs2v70qMS2hSSnb_SobnN24e_SsAbMiRZI0ryzBAwY_71i-kUaohFlHuG8fImSj64CoxaRiGa1Pg-yathYnsP4aKOuQRU2jia8h8MhbGFIXt5dVIoRijHKY1xg";
var state = 0;

var accessToken = "BQAb_dZNNRWBh0OvWn-UDRRJ3iwU10gkU2tAMWTTmu9_8Tx9xKvALpyJd4L8gE2tUNvBPDOTjix--6-KlRhAP5tYLQZfIW3p3FdC6WdhM58JH3rkimbRl_aPTSf5HZugxLr1nhGqraCTL8ivGb1dNp0v-a2BXgI";
var refreshToken = "AQBsfznI_ZtCdzKce2gFI8ujtyZfr-OXDxD0MN4k1llDhH0Y1Cz-tky4ru-vyj0D5uydUqmFr9xER5zpuXTEw2QsOu9q6kLmV2W7w25o3KU9smOtsr5Su-8rkAMBzGSXeSaWrw";



function firstRun(){

    console.log("called!");
    var header1 = {"Authorization": "Basic " + btoa(clientID + ":" + clientSecret)};
    var data1 = {
        "grant_type":"refresh_token",
        "refresh_token":refreshToken
    };

    $.ajax({
        url: URLDebug,
        type: 'post',
        data: data1,
        headers: header1,
        dataType: 'json',
        success: function (data){
            console.log("sended");
            console.info(data);
        }
    });

   
    
}

function draft(){
    $.post(URLToken, data, function(data, status){
        console.log(`${data} and status is ${status}`);
    });
}


