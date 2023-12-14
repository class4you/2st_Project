$(function(){
    $('.subNav li').each(function(){
        $(this).click(function(){
            $('.subNav li').removeClass('active');
            $(this).addClass('active');
        });
    });

    $('.sort ul li').each(function(){
        $(this).click(function(){
            $('.sort ul li').removeClass('active');
            $(this).addClass('active');
        });
    });
});
