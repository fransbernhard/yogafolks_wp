'use strict';
var $ =  jQuery;

// RESPONSIVE MENU
$(".js-toggle-menu").click(function() {
    $(".header").toggleClass("header--active");
});

$(".menu__list").find("li").find("a").click(function(){
    $(".header").removeClass("header--active");
})

$(".social__item").click(function(){
    $(".header").removeClass("header--active");
})
