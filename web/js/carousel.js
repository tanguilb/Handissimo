setInterval(function () {

    $('.carousel ul').animate({marginLeft:'-400px'}, 4000, function () {
        /*$(this).find("li:last").after($(this).find("li:first"));*/
        $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
        /*$(this).css({marginleft: 0});*/
    });
},8000);