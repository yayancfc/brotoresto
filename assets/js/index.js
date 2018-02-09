$(document).ready(function() {
    
    // Background
    
    var jumlah = $('img.background').length;
    var i = 1;
    
    function prevSlide(num) {
        if (i == 1) {
            $('.bg').animate({
                marginLeft: '-=400%'
            });
            i = jumlah+1;
        } else {
            $('.bg').animate({
                marginLeft: num
            });
        }
    }
    
    function nextSlide(num) {
        if (i == (jumlah)) {
            $('.bg').animate({
                marginLeft: '0%'
            });
            i = 0;
        } else {
            $('.bg').animate({
                marginLeft: num
            });
        }
    }
    
    var kiribg = $('#home a.left');
    var kananbg = $('#home a.right');
    
    kiribg.click(function() {
        prevSlide('+=100%');
        i--;
    });
    
    kananbg.click(function() {
        nextSlide('-=100%');
        i++;
    });
    
    
    
    // Ukuran background
    
    var lebar = $(window).width();
    var tinggi = (lebar / 3) * 2;

    $("#home .main-bg").css('height', tinggi);
    $("#home .main-bg .bg").css('height', tinggi);
    
    $(window).resize(function() {
        
        lebar = $(window).width();
        tinggi = (lebar / 3) * 2;

        $("#home .main-bg").css('height', tinggi);
        $("#home .main-bg .bg").css('height', tinggi);
        
    });
    
    var lebar2 = $('#home .main-bg').height();
    
    $('#home a').css('height', lebar2);
    
    $(window).resize(function() {
        var lebar2 = $('#home .main-bg').height();
        
        $('#home a').css({
            height : lebar2
        });
        
    });
    
});