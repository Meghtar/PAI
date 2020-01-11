$(function(){
    $(document).scroll(function(){
        $('.posts').stop().animate({
            scrollTop : $(this).scrollTop()
        });            
    });
});