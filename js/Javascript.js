$(function(){

    $("div").css("display", "none");
    $("div#div1").addClass("active");

    $("a").on("click", function( e ){         
      e.preventDefault();
        
    	$("div").removeClass("active");
        var id = $(this).attr("href"); 
        $("#"+id+"").addClass("active");
        
    });
});