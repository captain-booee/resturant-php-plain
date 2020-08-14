$(document).ready(function(e) {
	$(".jumpup").hide();
    $(document).scroll(function() {
	  var scroller = $("html,body").scrollTop();
	  console.log(scroller);
	  if(scroller > 300){
		$(".day-food").animate({
			  "opacity" : 1
			  },500);  
	  }
		if (scroller > 400){
		  $(".navigation-menu-holder").animate({
			  opacity: 0.9
			  });
			  $(".navigation-menu-holder").addClass("navigation-menu-holder-fixed").removeClass("navigation-menu-holder");
		}else{
			$(".navigation-menu-holder-fixed").addClass("navigation-menu-holder").removeClass("navigation-menu-holder-fixed");
		}
		if (scroller > 500){
		  $(".how").css({
			  position : "relative",
			  });
		  $(".how").animate({
			  top : 0
			  },300);
		}
		if (scroller > 900){
			
			  $(".categuries").animate({
			  opacity : 1
			  },200,function(){
				  $(".cats:nth-child(1)").animate({top:-310},100);
				  $(".cats:nth-child(2)").animate({top:-310},200);
				  $(".cats:nth-child(3)").animate({top:-310},300);
				  $(".cats:nth-child(4)").animate({top:-310},400);
				  $(".cats:nth-child(5)").animate({top:-310},500);
				  });
			  
			  
			
		}
	});
	
	$("ul>ol").hide();
	$("ul>li:first").on("click",function(){
		$("ol").slideToggle();
		});
		
		
		
	
//SLIDE SHOW FOR MAIN PAGE...
	$(".children:first").addClass("current");
	setInterval(function(){
		
		var oCurPhoto = $('#hero div.current');
            var oNxtPhoto = oCurPhoto.next();
            if (oNxtPhoto.length == 0){
                oNxtPhoto = $('#hero div:first');
			}
            oCurPhoto.removeClass('current').addClass('previous');
            oNxtPhoto.css({ opacity: 0.0 }).addClass('current')
                    .animate({ opacity: 1.0 }, 1000,
                                function() {
                                    oCurPhoto.removeClass('previous');
                                });
		}, 3000);
		
});


