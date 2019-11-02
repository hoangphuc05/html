var newsTemplate = null;
var listTemplate = null;
var sourceHeader = null;
var weatherTemplate = null;
$('body').scrollspy({ target: '#navbar-all' })

$(document).ready(function(){
    newsTemplate = $('.NewsTemplate');
    newsTemplate.remove();
    listTemplate = $('.dynamic-news-list');
    listTemplate.remove();
    sourceHeader = $('#source-1');
    sourceHeader.remove();
    weatherTemplate = $('#weather');
    weatherTemplate.remove();

    console.log("ready");
    getNews();
    getNewsList();
    getWeather();
})

function getNews(source="google-news"){
    $("#news_storage").empty();

    $.ajaxSetup({async:false});  //execute synchronously
    var body = {task: "getNews", "sources": source};
    var result=null;
    $.post("./newsServer.php",body,function(data, status){
        //console.log(data);
        result = data;
    })
    $.ajaxSetup({async:true});  //re
    //console.log(JSON.parse(result));
    var data = JSON.parse(result);
/*
 $("#news_storage").append(newsTemplate.clone());
    var newAdded = $("#news_storage>div:last")
    newAdded.find(".title").html(data.articles[0].title);
    newAdded.find(".description").html(data.articles[0].description);
    newAdded.find("img").attr("src",data.articles[0].urlToImage);
*/
    $("#news_storage").append(sourceHeader.clone());
    var newAdded = $("#news_storage>div:last>*>*");
    newAdded.html(data.articles[0].source.name);
    for (var i = 0; i < data.totalResults; i++){
        $("#news_storage").append(newsTemplate.clone());
        var newAdded = $("#news_storage>div:last");
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

function getNewsList(){
    $.ajaxSetup({async:false});  //execute synchronously
    var body = {task: "getNewsList"};
    var result=null;
    $.post("./newsServer.php",body,function(data, status){
        //console.log(data);
        result = data;
    })
    $.ajaxSetup({async:true});  //re
    //console.log(JSON.parse(result));
    var data = JSON.parse(result);
    //console.log(data);
    for (var i = 0; i < data.sources.length; i++){
        $('#News_List').append(listTemplate.clone());
        var newAdded = $("#News_List>a:last")
        newAdded.text(data.sources[i].name);
        newAdded.attr("onclick","getNews('"+data.sources[i].id+"');");
    }
    return data;
}

function getWeather(){
    $.ajaxSetup({async:false});  //execute synchronously
    var body = {task: "getWeather"};
    var result=null;
    $.post("./newsServer.php",body,function(data, status){
        //console.log(data);
        result = data;
    })
    $.ajaxSetup({async:true});  //re   

    var data = JSON.parse(result);
    console.log(data);
    $('.weatherStorage').append(weatherTemplate.clone());
    var newAdded = $('.weatherStorage>*');
    newAdded.find('#city').html(data.name);
    newAdded.find('#temp').html((data.main.temp/10).toFixed(1) + " <sup>o</sup>C");
    newAdded.find('img').attr("src","https://openweathermap.org/img/wn/" + data.weather[0].icon +"@2x.png");
    newAdded.find("#descr").html(data.weather[0].description);

}