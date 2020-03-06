var redditLink = $('')

$(function(){
    $('#linkSubmit').click(function(){
        alert($('#linkInput').val());
        $.post('hphucs.me/reddit/api',$('#linkInput').val());
    });
});