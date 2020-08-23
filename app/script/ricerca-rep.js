$(document).ready(function(){
	//stampa del form alla pressione del tasto 'Dettagli'
    $(document).on('click', '.read-one-product-button', function(){
		var id = $(this).attr('data-id');
		// chiamata all'api per la lettura dei dettagli con il passaggio dell'id
		$.getJSON("http://127.0.0.1:8080/api/reperti/search.php?id=" + id, function(data){
			var html_ricerca="";
			html_ricerca+="<div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>";
			html_ricerca+="<span class='glyphicon glyphicon-list'></span> Lista Reperti";
			html_ricerca+="</div>";
			//inizio tabella
			html_ricerca+="<table class='table table-bordered table-hover'>";
		    html_ricerca+="<tr>";
		        html_ricerca+="<td>Descrizione</td>";
		        html_ricerca+="<td><p class='overflow-visible'>" + data.descrizione + "</p></td>";
		    html_ricerca+="</tr>";
		    html_ricerca+="<tr>";
		        html_ricerca+="<td>Datazione</td>";
		        html_ricerca+="<td><p class='overflow-visible'>" + data.datazione + "</p></td>";
		    html_ricerca+="</tr>";
		    html_ricerca+="<tr>";
		        html_ricerca+="<td>Luogo Ritrovamento</td>";
		        html_ricerca+="<td><p class='overflow-visible'>" + data.luogo_rit + "</p></td>";
		    html_ricerca+="</tr>";
		    html_ricerca+="<tr>";
		        html_ricerca+="<td>Data Ritrovamento</td>";
		        html_ricerca+="<td><p class='overflow-visible'>" + data.data_rit + "</p></td>";
		    html_ricerca+="</tr>";
		    /*html_ricerca+="<tr>";
		        html_ricerca+="<td>Foto</td>";
		        html_ricerca+="<td>" + data.img + "</td>";
		    html_ricerca+="</tr>";*/
		 
			html_ricerca+="</table><br><br>";
			// inserimento nella 'page-content' di app.js
		$("#page-content").html(html_ricerca);
		// cambio nome della pagina
		var str = "Reperto Numero ";
		var res = str.concat(data.id);
		changePageTitle(res);
		});
    });
$(function () {
    $(window).bind("resize", function () {
        //console.log($(this).width())
        if ($(this).width() > 1000) {
            $('p').removeClass('overflow-ellipsis').css({"width": "500px"});
        }
        else {
            $('p').addClass('overflow-ellipsis').css({"width": "120px"});
        }
    }).trigger('resize');
})
});