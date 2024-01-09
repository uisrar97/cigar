$(document).ready(function() {
	if (typeof(Storage) !== "undefined") {
		if(localStorage.getItem("cookies_consent") === null || localStorage.getItem("cookies_consent") < 1) {
			setTimeout(function(){
				$("#cookieconsent_wrapper").slideDown("slow");
			}, 1000);				
		}
	}
	
	$(document).on("click", "#cookieconsent_accept", function() {			
		$("#cookieconsent_wrapper").slideUp("slow");
		localStorage.setItem("cookies_consent", 1);
	});
});