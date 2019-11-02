

function fadeOut(mid){
    
    console.log(mid);
    mid.classList.add("animated", "fadeOutUp");
    mid.addEventListener('animationend', function() { 
        while (mid.firstChild) {
            mid.removeChild(mid.firstChild);   
        }
        addMain(mid);
    })
}

function addMain(mid){
    var $mid = $(mid)
    $mid.removeClass("animated fadeOutUp");
    mid = $("#inner");
    contents = '<div class="row">';
    //contents += content;
    //contents += content
    contents += '</div>';
    mid.append($additionContent);
    $additionContent.on('animationend', function(){
        $additionContent.removeClass('animated fadeInUp');
    })

    console.log("Aa");
    
} 

$(document).ready(function(){
    
    var allCard = $(".card");

    
    for(var i = 0; i < allCard.length ; i++){
        console.log(allCard[i]);
        allCard.eq(i).attr("onmouseover","mouseOverAni(this);");
    }

    $additionContent = $("#addition");
    $additionContent.remove(); 


})

function mouseOverAni(obj){
    if ($(obj) == $(obj).parent()){
        return;
    }
    obj.classList.add("animated", "bounce");
    obj.addEventListener('animationend',function(){
        $(obj).removeClass('animated bounce');
    });
    
}

