$(document).ready(function(){
 
    //l'applicativo seguente viente chiamato non appena viene cliccato il bottone create-product-button
    $(document).on('click', '.create-product-button', function(){
        




/*---------------------- PARTE DA UTILIZZATE PER IL CONTROLLO NUOVI INSERIMENTI


        // load list of categories
		$.getJSON("http://127.0.0.1:8080/api/reperti/read.php", function(data){

			// build categories option html
			// loop through returned list of data
			var categories_options_html="";
			categories_options_html+="<select name='category_id' class='form-control'>";
			$.each(data.records, function(key, val){
			    categories_options_html+="<option value='" + val.id + "'>" + val.name + "</option>";
			});
			categories_options_html+="</select>";
			});



---------------------- PARTE DA UTILIZZATE PER IL CONTROLLO NUOVI INSERIMENTI*/






	var html_aggiungi="";
	html_aggiungi+="<div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>";
	    html_aggiungi+="<span class='glyphicon glyphicon-list'></span> Lista Reperti";
	html_aggiungi+="</div>";
	
	// inizio form - nei bottoni contenenti l'attributo required si aprirà automaticamente un popup qualora vengano lasciati vuoti (proprietà di html5)
	html_aggiungi+="<form id='create-product-form' action='#' method='post' border='0'>";
	    html_aggiungi+="<table class='table table-hover table-responsive table-bordered'>";
	 
	        html_aggiungi+="<tr>";
	            html_aggiungi+="<td>Descrizione</td>";
	            html_aggiungi+="<td><input type='text' name='descrizione' class='form-control' required /></td>";
	        html_aggiungi+="</tr>";
	 
	        html_aggiungi+="<tr>";
	            html_aggiungi+="<td>Datazione</td>";
	            html_aggiungi+="<td><input type='text' name='datazione' class='form-control' required /></td>";
	        html_aggiungi+="</tr>";
	 
	        html_aggiungi+="<tr>";
	            html_aggiungi+="<td>Luogo Ritrovamento</td>";
	            html_aggiungi+="<td><input type='text' name='luogo_rit' class='form-control' required></textarea></td>";
	        html_aggiungi+="</tr>";

	        html_aggiungi+="<tr>";
	            html_aggiungi+="<td>Data Ritrovamento</td>";
	            html_aggiungi+="<td><input type='text' name='data_rit' class='form-control' required></textarea></td>";
	        html_aggiungi+="</tr>";
	 
	        html_aggiungi+="<tr>";
	            html_aggiungi+="<td></td>";
	            html_aggiungi+="<td>";
	                html_aggiungi+="<button type='submit' class='btn btn-primary'>";
	                    html_aggiungi+="<span class='glyphicon glyphicon-plus'></span> Aggiungi Reperto";
	                html_aggiungi+="</button>";
	            html_aggiungi+="</td>";
	        html_aggiungi+="</tr>";
	    html_aggiungi+="</table><br><br>";
	html_aggiungi+="</form>";
	//funzione che carica l'html contenuto nella variabile html_aggiungi dentro la nostra pagina web
	$("#page-content").html(html_aggiungi);
	changePageTitle("Aggiungi Reperto");
	});
});


	//questa funzione parte quanto viene cliccato il bottone submit nel form
$(document).on('submit', '#create-product-form', function(){
	//inserimento dati del form in un ogetto json 
    var form_data=JSON.stringify($(this).serializeObject());
    // chiamata all'api per inserire i dati del form nel database
	$.ajax({
	    url: "http://127.0.0.1:8080/api/reperti/create.php",
	    type : "POST",
	    dataType : "json",
	    data : form_data,
	    success : function(result) {
	    	//se l'operazione avviene con successo ritorna alla lista iniziale
	        showProducts();
	    },
	    error: function(xhr, resp, text) {
	        console.log(xhr, resp, text);
	    }
	});
	return false;
});



