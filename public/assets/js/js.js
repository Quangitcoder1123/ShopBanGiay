var sTimerLength = 700;
var sTimer = sTimerLength;
var slideCount, slideWidth, sliderUlWidth;
jQuery(document).ready(function ($) {
    slideCount = $('#slider ul > a').length;
    slideWidth = $('#slider').width();
    sliderUlWidth = slideCount * slideWidth;
    $('#slider ul > a').css({
        width: slideWidth
    });
    $('#slider ul').css({
        width: sliderUlWidth,
        marginLeft: -slideWidth
    });
    $('#slider ul > a:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
                left: +slideWidth
            }, 400,
            function () { //bring the last li to the beginning of the ul
                $('#slider ul > a:last-child').prependTo('#slider ul');
                //reset the ul's 'left' property as empty string 
                $('#slider ul').css('left', '');
            });
        sTimer = sTimerLength;
    };

    function moveRight() {
        $('#slider ul').animate({
                left: -slideWidth
            }, 400,
            function () { //bring the first li to the end of the ul
                $('#slider ul > a:first-child').appendTo('#slider ul');
                //reset the ul's 'left' property as empty string
                $('#slider ul').css('left', '');
            });
        sTimer = sTimerLength;
    };

    /*============button controls========*/
    $('.prev').click(function () {
        moveLeft();
    });
    $('.next').click(function () {
        moveRight();
    });
    setInterval(function () {
        if (--sTimer == 0) {
            moveRight();
        }
    }, 1);

    
});
$(window).resize(function () {
    slideCount = $('#slider ul > a').length;
    slideWidth = $('#slider').width();
    sliderUlWidth = slideCount * slideWidth;
    $('#slider ul > a').css({
        width: slideWidth
    });
    $('#slider ul').css({
        width: sliderUlWidth,
        marginLeft: -slideWidth
    });
});
