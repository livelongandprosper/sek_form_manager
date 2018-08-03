
$(document).ready(function(){
	$(".zeilehinzu tr:last").show();
	
	var $tr=$('.zeilehinzu tr:last').clone().hide();

	
    $(".hinzubutton").click(function(){
		event.preventDefault();
		
		var anzahl= $('.zeilehinzu tr').length-2;
		
		var $tr=$('.zeilehinzu tr:last').clone().show();
		$('.zeilehinzu tr:last').find("input").each(function(){
			var new_name = $(this).attr("name").replace("["+(anzahl)+"]", "["+(anzahl+1)+"]");
			$(this).attr("name",new_name);
		});
		$('.zeilehinzu tr:last').before($tr);
	});
		
		
		
		
        
		
	$(".knopf").click(function(){
			event.preventDefault();
			var anzahl=$('.materialzeilehinzu tr').length-2;
			var $mr=$('.materialzeilehinzu tr:last').clone();
			$('.materialzeilehinzu tr:last').find("input").each(function(){
			var new_name = $(this).attr("name").replace("["+(anzahl)+"]", "["+(anzahl+1)+"]");
			$(this).attr("name",new_name);
		});
			$('.materialzeilehinzu tr:last').before($mr);
			
	});
							  
});