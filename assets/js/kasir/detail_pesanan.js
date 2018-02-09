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
    
    if (lebar <= 480) {
        $(".kembali").replaceWith("<i class='material-icons'>keyboard_backspace</i>");
    }
    
    $(window).resize(function() {
        var lebar = $(window).width();
        
        if (lebar <= 480) {
            $(".kembali").replaceWith("<i class='material-icons'>keyboard_backspace</i>");
        } else {
            $(".cari i").replaceWith("<span class='kembali'>Kembali</i>");
        }
    });
    
});
