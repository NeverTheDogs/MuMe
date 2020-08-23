$(document).ready(function(){
 	
 	// mostra il form di aggiornamento quendo viene premuto il bottone 'Modifica'
    $(document).on('click', '.update-product-button', function(){
		var id = $(this).attr('data-id');
		// lettura del reperto sul quale è stato premuto il bottone
		$.getJSON("http://127.0.0.1:8080/api/reperti/search.php?id=" + id, function(data){
		    //inserimento valori nel form da stamapare
		    var descrizione = data.descrizione;
		    var datazione = data.datazione;
		    var luogo_rit = data.luogo_rit;
		    var data_rit = data.data_rit;
		    var img = data.img;
			$.getJSON("http://127.0.0.1:8080/api/reperti/read.php", function(data){
			    // form di aggiornamento dati
				var html_update="";
				html_update+="<div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>";
				html_update+="<span class='glyphicon glyphicon-list'></span> Lista Reperti";
				html_update+="</div>";
				html_update+="<form id='update-product-form' action='#' method='post' border='0'>";
				html_update+="<table class='table table-hover table-responsive table-bordered'>";
			        html_update+="<tr>";
			            html_update+="<td>Descrizione</td>";
			            html_update+="<td><input value=\"" + descrizione + "\" type='text' name='descrizione' class='form-control'/></td>";
			        html_update+="</tr>";
			        html_update+="<tr>";
			            html_update+="<td>Datazione</td>";
			            html_update+="<td><input value=\"" + datazione + "\" type='text' name='datazione' class='form-control'/></td>";
			        html_update+="</tr>";
			        html_update+="<tr>";
			            html_update+="<td>Luogo Ritrovamento</td>";
			            html_update+="<td><input value=\"" + luogo_rit + "\" type='text' name='luogo_rit' class='form-control'/></td>";
			        html_update+="</tr>";
			        html_update+="<tr>";
			            html_update+="<td>Data Ritrovamento</td>";
			            html_update+="<td><input value=\"" + data_rit + "\" type='text' name='data_rit' class='form-control'/></td>";
			        html_update+="</tr>";
			        /*html_update+="<tr>";
			            html_update+="<td>Immagine</td>";
			            html_update+="<td><input value=\"" + img + "\" type='text' name='img' class='form-control'/></td>";
			        html_update+="</tr>";*/
			        html_update+="<td><input value=\"" + id + "\" name='id' type='hidden' /></td>";
		            html_update+="<td>";
		                html_update+="<button type='submit' class='btn btn-info'>";
		                html_update+="<span class='glyphicon glyphicon-edit'></span> Aggiorna Reperto";
		                html_update+="</button>";
		            html_update+="</td>";			 
			        html_update+="</tr>";
				html_update+="</table></form>";
				// inserimento nella 'page-content' di app.js
				$("#page-content").html(html_update);
				// cambio nome della pagina
				var str = "Reperto Numero ";
				var res = str.concat(id);
				changePageTitle(res);
			});
		});
    });
    //chiamata all'api alla pressione del bottone di conferma
	$(document).on('submit', '#update-product-form', function(){
	    // serializzazione dati in json
		var form_data=JSON.stringify($(this).serializeObject());
		$.ajax({
	        url: "http://127.0.0.1:8080/api/reperti/update.php",
	        type : "POST",
	        dataType : 'json',
	        data : form_data,
	        success : function(result) {
	            // ritorna alla lista reperti con la chiamata alla funzione
	            showProducts();
	        },
	        error: function(xhr, resp, text) {
	            console.log(xhr, resp, text);
	        }
	    });
	});
	return false;
});







