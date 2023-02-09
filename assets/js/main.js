$(document).ready(function(){
    const observer = lozad();
    observer.observe();
    $("#menuToggle").click(function(){
        $("#myHeader").toggleClass("toggled");
        $("#header-menu").slideToggle("slow");
    });
    $(window).resize(function() {
        var width = $( window ).width();
        if(width > 991) {
            $("#header-menu").css("display", "flex");
        }
        else {
            if($("#myHeader").hasClass("toggled")) {
                $("#header-menu").css("display", "block");
            }
            else {
                $("#header-menu").css("display", "none");
            }
        }
      });
  });