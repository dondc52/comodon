$(document).ready(function () {
    $("ul.recent-tab-list li:first-child a").addClass("active show");
    $("div.recent-content-list div:first-child").addClass("active show");

    if($(".alertflash").length){
        window.location.href = '#linkflashsendmail';
    }

    if($(".alertorder").length){
        window.location.href = '#linkflashorder';
    }

    $('.btn-reply').click(function(){
        var parent_id = $(this).next().val();
        $('#parentIdReply').val(parent_id);
        window.location.href = '#commentForm';
    });
    
});