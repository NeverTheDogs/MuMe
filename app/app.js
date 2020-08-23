$(document).ready(function(){
 
    
    app_html="";
    app_html+="<div class='container'>";
 
        app_html+="<div class='page-header'>";
            app_html+="<h1 id='page-title'>Lista Reperti</h1>";
        app_html+="</div>";
 
        // page-content dove verranno inseriti gli script js
        app_html+="<div id='page-content'></div>";
 
    app_html+="</div>";
 
    // inserimento degli script nella pagina html
    $("#app").html(app_html);
 
});
 
//funzione di cambio titolo della pagina
function changePageTitle(page_title){
 
    $('#page-title').text(page_title);
    document.title=page_title;
}
 
// funzione di serializzazione dati del form in formato json
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

// funzione di cambio stile di navbar con lo scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
    } else {
        navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
    }
}
