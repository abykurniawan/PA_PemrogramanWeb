var html = $("html")

$(function darkmode() {
    $(".toggle").click(function() {
        if (html.hasClass("dark-mode")) {
            html.removeClass("dark-mode");
            html.addClass("main-regis");
            localStorage.setItem("dark-mode", false);
        }

        else {
            html.removeClass("main-regis")
            html.addClass("dark-mode");
            localStorage.setItem("dark-mode", true);
        }
    })
})
        
if (localStorage.getItem("dark-mode") == "true") {
	$(" html").addClass("dark-mode");
}

var coba = document.getElementById("section-title");
coba.style.paddingLeft = "20px";
coba.style.fontFamily = 'Courier New', Courier, monospace;
