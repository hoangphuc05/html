var newsTemplate = null;
$('body').scrollspy({ target: '#navbar-all' })

$(document).ready(function(){
    newsTemplate = $('.NewsTemplate');
    newsTemplate.remove();
    console.log("ready");
    getNews();
})

function getNews(source="google-news"){
    $.ajaxSetup({async:false});  //execute synchronously
    var body = {task: "getNews", "sources": source};
    var result=null;
    $.post("./newsServer.php",body,function(data, status){
        //console.log(data);
        result = data;
    })
    $.ajaxSetup({async:true});  //re
    console.log(JSON.parse(result));
    var data = JSON.parse(result);
/*
 $("#news_storage").append(newsTemplate.clone());
    var newAdded = $("#news_storage>div:last")
    newAdded.find(".title").html(data.articles[0].title);
    newAdded.find(".description").html(data.articles[0].description);
    newAdded.find("img").attr("src",data.articles[0].urlToImage);
*/
    for (var i = 0; i < data.totalResults; i++){
        $("#news_storage").append(newsTemplate.clone());
        var newAdded = $("#news_storage>div:last")
        newAdded.find("a").attr("href",data.articles[i].url);
        newAdded.find(".title").html(data.articles[i].title);
        newAdded.find(".description").html(data.articles[i].description);
        if (!data.articles[i].author){
            newAdded.find(".source").html(data.articles[i].url.substring(data.articles[i].url.indexOf(".")+1,data.articles[i].url.indexOf(".",data.articles[i].url.indexOf(".")+1)));
        } else{
            newAdded.find(".source").html(data.articles[i].author);
        }
        newAdded.find("img").attr("src",data.articles[i].urlToImage);
    }
    return JSON.parse(result);
}