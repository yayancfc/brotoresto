$(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').fadeOut();
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').fadeIn();
    });
    
    var lebar = $(window).width();
    
    if (lebar <= 768) {
        $(".lihat").replaceWith("<i class='lihat fa fa-eye'></i>");
    }
    
    $(window).resize(function() {
        var lebar = $(window).width();
        
        if (lebar <= 768) {
            $(".lihat").replaceWith("<i class='lihat fa fa-eye'></i>");
        } else {
            $(".lihat").replaceWith("<button type='button' class='lihat''>Lihat</button>");
        }
    });
    
});
