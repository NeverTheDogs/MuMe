$(document).ready(function(){
    // caricamento html al caricamento della pagina
    showProducts();
    $(document).on('click', '.read-products-button', function(){
    	//chiamata funzione sulla pressione del tasto 'Lista Reperti'
    	showProducts();
	});
});

//funzione di stampa tabella reperti
function showProducts(){
 	$.getJSON("http://127.0.0.1:8080/api/reperti/read.php", function(data){
		var html_lista="";
		html_lista+="<div id='create-product-button' class='btn btn-primary pull-right m-b-15px create-product-button'>";
		    html_lista+="<span class='glyphicon glyphicon-plus'></span> Aggiungi Reperto";
		html_lista+="</div>";
		// inizio tabella
		html_lista+="<table class='table table-bordered table-hover'>";
		    html_lista+="<tr>";
		    	html_lista+="<td align='center' style='width:10%'>Id</td>";
		        html_lista+="<td align='center' style='width:40%'>Descrizione</td>";
		        html_lista+="<td align='center' style='width:25%'>Opzioni</td>";
		    html_lista+="</tr>";
		    //loop per la stampa di tutti i record ricevuti dall'api
			$.each(data.records, function(key, val) {
			    html_lista+="<tr>";
			        html_lista+="<td align='center'>" + val.id + "</td>";
			        html_lista+="<td><p class='overflow-ellipsis'>" + val.descrizione + "</p></td>";
			        html_lista+="<td align='center'>";
		            // bottone per il metodo read_one con id del reperto
		            html_lista+="<button class='btn btn-primary m-r-10px read-one-product-button' data-id='" + val.id + "'>";
		            html_lista+="<span class='glyphicon glyphicon-eye-open'></span> Dettagli";
		            html_lista+="</button>";
		 			// bottone per il metodo update con id del reperto
		            html_lista+="<button class='btn btn-info m-r-10px update-product-button' data-id='" + val.id + "'>";
		            html_lista+="<span class='glyphicon glyphicon-edit'></span> Modifica";
		            html_lista+="</button>";
		 			// bottone per il metodo delete con id del reperto
		            html_lista+="<button class='btn btn-danger m-r-10px delete-product-button' data-id='" + val.id + "'>";
		            html_lista+="<span class='glyphicon glyphicon-remove'></span> Rimuovi";
		            html_lista+="</button>";
			        html_lista+="</td>";
			    html_lista+="</tr>";
			});
		html_lista+="</table><br><br>";
		// inserimento nella 'page-content' di app.js
		$("#page-content").html(html_lista);
		changePageTitle("Lista Reperti");

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
}