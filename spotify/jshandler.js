//https://stackoverflow.com/questions/5448545/how-to-retrieve-get-parameters-from-javascript

function getSearchParameters() {
    var prmstr = window.location.hash.substr(1);
    return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
}

function transformToAssocArray( prmstr ) {
  var params = {};
  var prmarr = prmstr.split("&");
  for ( var i = 0; i < prmarr.length; i++) {
      var tmparr = prmarr[i].split("=");
      params[tmparr[0]] = tmparr[1];
  }
  return params;
}

//var params = getSearchParameters();
//console.log(params);
//return params['access_token'];

/*
$.ajax({
    url: 'https://api.spotify.com/v1/me',
    headers: {
        'Authorization': 'Bearer ' + params['access_token']
    },
    success: function(response) {
        console.log(response);
    }
});*/