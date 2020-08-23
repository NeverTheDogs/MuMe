$(document).ready(function(){
    //cancellazione del reperto alla pressione del tasto 'Rimuovi'
    $(document).on('click', '.delete-product-button', function(){
		var product_id = $(this).attr('data-id');
		//popup di conferma dell'eliminazione
		bootbox.confirm({
		    message: "<h4>Vuoi veramente eliminare il reperto?</h4>",
		    buttons: {
		        confirm: {
		            label: '<span class="glyphicon glyphicon-ok"></span> Si',
		            className: 'btn-danger'
		        },
		        cancel: {
		            label: '<span class="glyphicon glyphicon-remove"></span> No',
		            className: 'btn-primary'
		        }
		    },
		    callback: function (result) {
		        // chiamata all'api per l'eliminazione se la conferma è positiva
		        if(result==true){
		        	// serializzazione dati in json
		        	var data=JSON.stringify({ id: product_id });
		        	$.ajax({
				        url: "http://127.0.0.1:8080/api/reperti/delete.php",
				        type : "POST",
				        dataType : 'json',
				        data : data,
				        success : function(result) {
				            // ritorna alla lista reperti con la chiamata alla funzione
				            showProducts();
				        },
				        error: function(xhr, resp, text) {
				            console.log(xhr, resp, text);
				        }
				    });
				}
		    }
		});
    });
});