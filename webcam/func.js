//--------------------
// GET USER MEDIA CODE
//--------------------
navigator.getUserMedia = ( navigator.getUserMedia ||
navigator.webkitGetUserMedia ||
navigator.mozGetUserMedia ||
navigator.msGetUserMedia);

var video;
var webcamStream;

function startWebcam() {
    if (navigator.getUserMedia) {
            navigator.getUserMedia (

            // constraints
            {
                video: true,
                audio: false
            },

        // successCallback
        function(localMediaStream) {
            video = document.querySelector('video');
            console.log(localMediaStream.width);
            video.srcObject = localMediaStream;
            webcamStream = localMediaStream.getTracks()[0];
        },

        // errorCallback
        function(err) {
            console.log("The following error occured: " + err);
        }
        );
    } else {
        console.log("getUserMedia not supported");
    }  
}

function stopWebcam() {
    webcamStream.stop();
}
//---------------------
// TAKE A SNAPSHOT CODE
//---------------------
var canvas, ctx;

function init() {
    console.log("init runned");
    // Get the canvas and obtain a context for
    // drawing in it
    canvas = document.getElementById("myCanvas");
    ctx = canvas.getContext('2d');
}

var tes;
//snapshot and send
function snapshot() {
    var imgBlob;
    // Draws current image from the video element into the canvas
    //document.getElementById("head").append(video.offsetWidth + "px");
    canvas.style.width = video.offsetWidth + "px";
    canvas.style.height = video.offsetHeight + "px";
    document.getElementById("head").append(canvas.offsetWidth + "px");
    ctx.drawImage(video, 0,0);
    
    var dataURL = canvas.toDataURL("image/png");
    //console.log(dataURL);
    
    $.ajax({
        type: "POST",
        url: "imgHand.php",
        data: {
            imgBase64: dataURL
        }
        

    }).done(function(box){
        console.log(box);
        var obj = JSON.parse(box);
        tas = obj;
        ctx.clearRect(0,0,canvas.style.width, canvas.style.height);
        for (var i = 0; i < obj['objects'].length; i++){
            ctx.strokeRect(obj['objects'][i]['rectangle']['x'], obj['objects'][i]['rectangle']['y'], obj['objects'][i]['rectangle']['w'], obj['objects'][i]['rectangle']['h']);
        }

        //ctx.strokeRect(obj['objects'][0]['rectangle']['x'], obj['objects'][0]['rectangle']['y'], obj['objects'][0]['rectangle']['w'], obj['objects'][0]['rectangle']['h']);
        //ctx.stroke();
    });
}

var features = [{
    'maxResult': 10,
    
}]

