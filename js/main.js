$(function(){
   $('a[href^="#"]:not(a.carousel-control-prev, a.carousel-control-next, a.nav-link, a[data-toggle="collapse"], a[data-toggle="tab"])').click(function(){
     var speed = 500;
     var href= $(this).attr("href");
     var target = $(href == "#" || href == "" ? 'html' : href);
     var position = target.offset().top;
     $("html, body").animate({scrollTop:position}, speed, "swing");
     return false;
   });
 });