var pos;
var key = "AIzaSyD9oo4JaC025PNeSmOzdZWhN5yKItktujA";
console.log("neww");
var lat, lng;
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
        pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        };
        console.log(lat);
        $('#locate').append(JSON.stringify(pos));
        $('#locate').append(lat);
        });
    }

